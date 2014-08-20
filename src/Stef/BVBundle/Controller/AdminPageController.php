<?php

namespace Stef\BVBundle\Controller;

use Stef\BVBundle\Entity\Page;
use Symfony\Component\HttpFoundation\Request;

class AdminPageController extends BaseController implements AdminControllerInterface
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
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
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, $id)
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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $pages = $this->getRepository('StefBVBundle:Page')->findAll();

        return $this->render('StefBVBundle:Admin:page.index.html.twig', [
            'pages' => $pages
        ]);
    }


}