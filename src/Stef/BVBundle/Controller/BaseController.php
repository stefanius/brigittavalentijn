<?php

namespace Stef\BVBundle\Controller;

use Stef\BVAdminBundle\Manager\NewsManager;
use Stef\BVAdminBundle\Manager\PageManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
    protected function getEntityManager()
    {
        return $this->getDoctrine()->getManager();
    }

    protected function getRepository($repository)
    {
        $em = $this->getEntityManager();

        return $em->getRepository($repository);
    }
}