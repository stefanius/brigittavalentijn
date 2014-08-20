<?php

namespace Stef\BVBundle\Controller;

use Stef\BVBundle\Manager\NewsManager;
use Stef\BVBundle\Manager\PageManager;
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

    protected function getPageManager()
    {
        return new PageManager($this->getEntityManager());
    }

    protected function getNewsManager()
    {
        return new NewsManager($this->getEntityManager());
    }
}