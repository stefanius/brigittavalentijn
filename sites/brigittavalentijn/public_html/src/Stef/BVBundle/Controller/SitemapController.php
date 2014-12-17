<?php

namespace Stef\BVBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SitemapController extends BaseController
{
    public function generateAction(Request $request, $mappingKey)
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'application/xml');

        $records = null;

        if ($mappingKey === 'page') {
            $records = $this->getPageManager()->getAllRecords();
        }


        if ($records === null || !is_array($records) || count($records) == 0) {
            $this->redirect('/');
        }

        return $this->render('StefBVBundle:Sitemap:' . $mappingKey . '.xml.twig', [
                'records'      => $records,
            ],
            $response
        );
    }
} 