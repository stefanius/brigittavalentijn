<?php

namespace Stef\BVBundle\Controller;

use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityManager;

class NewsController extends BaseController
{
    /**
     * Show a news entry
     */
    public function showAction($slug)
    {
        $news = $this->getNewsManager()->read($slug);

        if (!$news) {
            throw $this->createNotFoundException('Unable to find News post.');
        }

        return $this->render('StefBVBundle:News:show.html.twig', array(
            'news'      => $news,
            'page'      => $news,
        ));
    }

    /**
     * Show the news archive
     */
    public function showArchiveAction($year = null)
    {
        if (null === $year) {
            $year = date("Y");
        }

        $em = $this->getDoctrine()->getManager();

        $qb = $em->getRepository('StefSimpleCmsBundle:News')->createQueryBuilder('n');

        $qb->select('n')
            ->where('n.created LIKE :year')
            ->setParameter('year', $year . '%')
            ->orderBy('n.id', 'DESC');


        $newsitems = $qb->getQuery()->getResult();

        return $this->render('StefBVBundle:News:showarchive.html.twig', array(
            'newsitems' => $newsitems,
            'year'      => $year,
        ));
    }

    /**
     * Show the news archive
     */
    public function showMainNewsPageAction()
    {
        /**
         * @var EntityManager
         */
        $em = $this->getDoctrine()->getManager();

        /**
         * @var QueryBuilder
         */
        $qb = $em->getRepository('StefSimpleCmsBundle:News')->createQueryBuilder('n');

        $qb->select('n')
            ->setMaxResults(20)
            ->orderBy('n.id', 'DESC');


        $newsitems = $qb->getQuery()->getResult();

        $page['title'] = "Nieuws overzicht";

        return $this->render('StefBVBundle:News:index.html.twig', array(
            'newsitems' => $newsitems,
            'page' => $page,
        ));
    }
}