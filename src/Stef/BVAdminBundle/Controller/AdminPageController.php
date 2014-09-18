<?php

namespace Stef\BVAdminBundle\Controller;

use Stef\BVBundle\Entity\Page;
use Stef\CrudContract\Controller\CrudInterface;
use Symfony\Component\HttpFoundation\Request;

class AdminPageController extends BaseController implements CrudInterface
{
    /**
     * @inheritdoc
     */
    public function createAction(Request $request)
    {
        $page = new Page();
        $form = $this->getPageManager()->createPageForm($this, $page);

        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);

            if ($form->isValid()) {

                $this->getPageManager()->savePageObject($page);

                return $this->redirect($this->generateUrl('stef_bvadminbundle_add_page'));
            }
        }

        return $this->render('StefBVAdminBundle:Page:page.add.html.twig', [
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
        $page = $this->getRepository('StefBVBundle:Page')->findOneById($id);

        $form = $this->getPageManager()->createPageForm($this, $page);

        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);

            if ($form->isValid()) {
                $page->setId($id);
                $this->getPageManager()->savePageObject($page);

                return $this->redirect($this->generateUrl('stef_bvadminbundle_index_page'));
            }
        }

        return $this->render('StefBVAdminBundle:Page:page.edit.html.twig', [
            'form' => $form->createView(),
            'page' => $page
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
        $pages = $this->getRepository('StefBVBundle:Page')->findAll();

        return $this->render('StefBVAdminBundle:Page:page.index.html.twig', [
            'pages' => $pages
        ]);
    }
}