<?php

namespace Stef\BVAdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class AdminController extends BaseController
{
    public function indexAction(Request $request)
    {
        return $this->render('StefBVAdminBundle:Cms:cms.index.html.twig');
    }
}