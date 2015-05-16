<?php

namespace Stef\BVBundle\Controller;

use Ivory\GoogleMap\Overlays\Animation;
use Ivory\GoogleMap\Overlays\Marker;
use Stef\BVBundle\GoogleMapsAdapter\Adapter;
use Stef\BVBundle\GoogleMapsAdapter\AdapterSettings;
use Symfony\Component\HttpFoundation\ParameterBag;

class PageController extends BaseController
{
    public function indexAction()
    {
        //TODO: Cleanup Quick and Dirty solution.
        $newsitems = $this->getNewsManager()->getLatestEntries(2);
        $archive = $this->getNewsManager()->getLatestEntries(10);

        unset($archive[0]);

        /** @var /Ivory/GoogleMapBundle/Model/Map */
        $map = $this->get('ivory_google_map.map');

        return $this->render('StefBVBundle:Default:index.html.twig', [
            'newsitems' => $newsitems,
            'archive' => $archive,
            'map' => $map
        ]);
    }

    public function viewPageAction($slug)
    {
        $extra = [];

        $page = $this->getPageManager()->read($slug);

        //Temp, until Manipulation accepts NULL values
        if ($page->getKvSettings() !== null && is_string($page->getKvSettings())) {
            $pageOptions = $this->getKeyValueParser()->parseKeyValuesToParameterBag($page->getKvSettings());
        } else {
            $pageOptions = new ParameterBag();
        }

        if ($pageOptions->has(AdapterSettings::GOOGLE_MAPS) && $pageOptions->get(AdapterSettings::GOOGLE_MAPS) === true) {

            $map = $this->getIvoryGoogleMap();

            $adapter = new Adapter($map);
            $map = $adapter->buildMap($pageOptions);


            $extra['map'] = $map;
        }

        $twig = $page->getTwig();

        if (empty($twig)){
            $twig = 'StefBVBundle:Page:default.html.twig';
        }

        return $this->render($twig, array_merge($extra, [
                'page'  => $page,
                'pageOptions' => $pageOptions->all()
            ])

        );
    }
}