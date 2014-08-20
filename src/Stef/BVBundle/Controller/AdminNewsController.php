<?php

namespace Stef\BVBundle\Controller;

use Stef\BVBundle\Entity\News;
use Stef\CrudContract\Controller\CrudInterface;
use Symfony\Component\HttpFoundation\Request;

class AdminNewsController extends BaseController implements CrudInterface
{

    /**
     * @inheritdoc
     */
    public function createAction(Request $request)
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
     * @inheritdoc
     */
    public function readAction(Request $request, $id)
    {
        // TODO: Implement readAction() method.
    }

    /**
     * @inheritdoc
     */
    public function updateAction(Request $request, $id)
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
     * @inheritdoc
     */
    public function deleteAction(Request $request, $id)
    {
        // TODO: Implement deleteAction() method.
    }

    /**
     * @inheritdoc
     */
    public function indexAction(Request $request)
    {
        $newsitems = $this->getRepository('StefBVBundle:News')->findAll();

        return $this->render('StefBVBundle:Admin:news.index.html.twig', [
            'newsitems' => $newsitems
        ]);
    }


}