<?php

namespace Stef\BVAdminBundle\Manager;

use Stef\BVBundle\Entity\Page;
use Stef\BVAdminBundle\Form\PageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageManager {

    protected $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function createPageForm(Controller $controller, Page $page)
    {
        return $controller->createForm(new PageType(), $page);
    }

    public function savePageObject(Page $page)
    {
        if (null === $page->getCreated()) {
            $page->setCreated(new \DateTime('now'));
        }

        if (null === $page->getModified()) {
            $page->setModified(new \DateTime('now'));
        }

        if (null === $page->getId()) {
            $this->em->persist($page);
        }

        $this->em->flush();
    }
}