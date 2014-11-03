<?php

namespace Stef\BVBundle\Controller;

use Faker\Provider\cs_CZ\DateTime;
use Stef\BVBundle\Entity\Enquiry;
use Stef\BVBundle\Entity\Notfound;
use Stef\BVBundle\Form\EnquiryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends BaseController
{
    public function indexAction()
    {
        /**
         * var
         */
        $qb = $this->getRepository('StefBVBundle:News')->createQueryBuilder('n');

        $qb->select('n')
            ->orderBy('n.id', 'DESC')
            ->setMaxResults(4);


        $newsitems = $qb->getQuery()->getResult();

        return $this->render('StefBVBundle:Default:index.html.twig', [
            'newsitems' => $newsitems
        ]);
    }

    public function aboutAction()
    {
        return $this->render('StefBVBundle:Page:about.html.twig');
    }

    public function contactAction()
    {
        $enquiry = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $enquiry);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {

                return $this->redirect($this->generateUrl('stef_bvbundle_contact'));
            }
        }

        return $this->render('StefBVBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function viewPageAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $page = $em->getRepository('StefBVBundle:Page')->findOneBySlug($slug);

        if (!$page) {
            $notfound = new Notfound();
            $notfound->setFixed(false);
            $notfound->setCreated(new \DateTime('now'));
            $notfound->setModified(new \DateTime('now'));
            $notfound->setSlug($slug);

            $em->persist($notfound);
            $em->flush();

            throw $this->createNotFoundException('Unable to find Page.');
        }

        $twig = $page->getTwig();

        if (empty($twig)){
            $twig = 'StefBVBundle:Page:default.html.twig';
        }

        return $this->render($twig, array(
            'page'      => $page,
        ));
    }
}