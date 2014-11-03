<?php

namespace Stef\BVBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewsController extends Controller
{
    /**
     * Show a news entry
     */
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $news = $em->getRepository('StefBVBundle:News')->findOneBySlug($slug);

        if (!$news) {
            throw $this->createNotFoundException('Unable to find News post.');
        }

        return $this->render('StefBVBundle:News:show.html.twig', array(
            'news'      => $news,
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

        $qb = $em->getRepository('StefBVBundle:News')->createQueryBuilder('n');

        $qb->select('n')
            ->where('n.created LIKE :year')
            ->setParameter('year', $year . '%');


        $newsitems = $qb->getQuery()->getResult();

        return $this->render('StefBVBundle:News:showarchive.html.twig', array(
            'newsitems' => $newsitems,
            'year'      => $year,
        ));
    }
}