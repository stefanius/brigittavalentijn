<?php

namespace Stef\BVAdminBundle\Controller;

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

    protected function getPageManager()
    {
        return new PageManager($this->getEntityManager());
    }

    protected function getNewsManager()
    {
        return new NewsManager($this->getEntityManager());
    }

    protected function getSlugifier()
    {
        return $this->get("slugifier");
    }

    protected function getFullpathSlugifier()
    {
        return $this->get("fullpath_slugifier");
    }
}