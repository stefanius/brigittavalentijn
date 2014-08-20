<?php

namespace Stef\BVBundle\Controller;

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

                return $this->redirect($this->generateUrl('stef_bvbundle_admin_add_page'));
            }
        }

        return $this->render('StefBVBundle:Admin:page.add.html.twig', [
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

                return $this->redirect($this->generateUrl('stef_bvbundle_admin_index_page'));
            }
        }

        return $this->render('StefBVBundle:Admin:page.edit.html.twig', [
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

        return $this->render('StefBVBundle:Admin:page.index.html.twig', [
            'pages' => $pages
        ]);
    }


}