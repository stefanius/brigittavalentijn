<?php

namespace Stef\BVBundle\Manager;

use Stef\BVBundle\Entity\News;
use Stef\BVBundle\Form\NewsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewsManager {

    protected $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function createNewsForm(Controller $controller, News $news)
    {
        return $controller->createForm(new NewsType(), $news);
    }

    public function saveNewsObject(News $news)
    {
        if (null === $news->getCreated()) {
            $news->setCreated(new \DateTime('now'));
        }

        if (null === $news->getModified()) {
            $news->setModified(new \DateTime('now'));
        }

        if (null === $news->getId()) {
            $this->em->persist($news);
        }

        $this->em->flush();
    }
}