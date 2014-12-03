<?php

namespace Stef\BVBundle\Controller;

class PageController extends BaseController
{
    public function indexAction()
    {
        $newsitems = $this->getNewsManager()->getLatestEntries(4);

        /** @var /Ivory/GoogleMapBundle/Model/Map */
        $map = $this->get('ivory_google_map.map');

        return $this->render('StefBVBundle:Default:index.html.twig', [
            'newsitems' => $newsitems,
            'map' => $map
        ]);
    }

    public function viewPageAction($slug)
    {
        $page = $this->getPageManager()->read($slug);

        $twig = $page->getTwig();

        if (empty($twig)){
            $twig = 'StefBVBundle:Page:default.html.twig';
        }

        return $this->render($twig, array(
            'page'      => $page,
        ));
    }
}