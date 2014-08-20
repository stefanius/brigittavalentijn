<?php

namespace Stef\BVBundle\Controller;

use Stef\BVBundle\Entity\News;
use Symfony\Component\HttpFoundation\Request;

class AdminNewsController extends BaseController implements AdminControllerInterface
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $news = new News();
        $form = $this->getNewsManager()->createNewsForm($this, $news);

        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);

            if ($form->isValid()) {

                $this->getNewsManager()->saveNewsObject($news);

                return $this->redirect($this->generateUrl('stef_bvbundle_admin_index_news'));
            }
        }

        return $this->render('StefBVBundle:Admin:news.add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, $id)
    {
        $news = $this->getRepository('StefBVBundle:News')->findOneById($id);

        $form = $this->getNewsManager()->createNewsForm($this, $news);

        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);

            if ($form->isValid()) {
                $news->setId($id);
                $this->getNewsManager()->saveNewsObject($news);

                return $this->redirect($this->generateUrl('stef_bvbundle_admin_index_news'));
            }
        }

        return $this->render('StefBVBundle:Admin:news.edit.html.twig', [
            'form' => $form->createView(),
            'page' => $news
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $newsitems = $this->getRepository('StefBVBundle:News')->findAll();

        return $this->render('StefBVBundle:Admin:news.index.html.twig', [
            'newsitems' => $newsitems
        ]);
    }


}