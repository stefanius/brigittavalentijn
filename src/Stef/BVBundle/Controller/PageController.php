<?php

namespace Stef\BVBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('StefBVBundle:Page:index.html.twig');
    }
}