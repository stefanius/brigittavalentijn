<?php

namespace Stef\BVBundle\Controller;

use Stef\BVBundle\Entity\Enquiry;
use Stef\BVBundle\Form\EnquiryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('StefBVBundle:Page:index.html.twig');
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
                // Perform some action, such as sending an email

                // Redirect - This is important to prevent users re-posting
                // the form if they refresh the page
                return $this->redirect($this->generateUrl('BloggerBlogBundle_contact'));
            }
        }

        return $this->render('StefBVBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
}