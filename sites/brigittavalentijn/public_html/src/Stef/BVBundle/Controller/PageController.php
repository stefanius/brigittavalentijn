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

            /*
            $marker = new Marker();

            $marker->setPrefixJavascriptVariable('marker_');
            $marker->setPosition(52.356442, 4.996120, true);
            $marker->setAnimation(Animation::DROP);

            $marker->setOption('clickable', false);
            $marker->setOption('flat', true);
            $marker->setOptions(array(
                'clickable' => false,
                'flat'      => true,
            ));


            $map->setStylesheetOptions(array(
                'width'  => '100%',
                'height' => '700px',
            ));

            */

            //$map->addMarker($marker);
            //$map->setCenter(52.356442, 4.996120);

            $extra['map'] = $map;
        }

        $twig = $page->getTwig();

        if (empty($twig)){
            $twig = 'StefBVBundle:Page:default.html.twig';
        }

        return $this->render($twig, array_merge($extra, [
                'page'  => $page
            ])

        );
    }
}