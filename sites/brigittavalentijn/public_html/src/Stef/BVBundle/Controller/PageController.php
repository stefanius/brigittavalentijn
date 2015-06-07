<?php

namespace Stef\BVBundle\Controller;

use Stef\BVBundle\GoogleMapsAdapter\Adapter;
use Stef\BVBundle\GoogleMapsAdapter\AdapterSettings;
use Stef\BVBundle\Entity\Contact;
use Stef\BVBundle\Form\ContactType;
use Stef\SimpleCmsBundle\Entity\Page;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;

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

    public function contactAction(Request $request)
    {
        $form = $this->createForm(new ContactType());

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $contact = new Contact();
                $contact->setEmail($form->get('email')->getData());
                $contact->setName($form->get('name')->getData());
                $contact->setReason($form->get('reason')->getData());
                $contact->setPhone($form->get('phone')->getData());
                $contact->setIp($request->getClientIp());
                $contact->setSummary($form->get('summary')->getData());
                $contact->setModified(new \DateTime());
                $contact->setCreated(new \DateTime());

                $manager = $this->getContactManager();
                $manager->persistAndFlush($contact);

                return $this->redirect($this->generateUrl('stef_bvbundle_contact'));
            }
        }

        $page = new Page();
        $page->setDescription('Neem altijd vrijblijven contact op met Scoutinggroep Brigitta / Valentijn!');
        $page->setTitle('Contact');
        $page->setBody("Als je meer wilt weten over een lidmaatschap neem dan eens vrijblijvend contact met ons op. Wij vertellen je graag wie we zijn en wat we doen. Als je al lid bent is het vaak beter om je vragen direct aan je eigen spelstaf te stellen.");

        return $this->render('StefBVBundle:Default:contact.html.twig', [
            'page' => $page,
            'form' => $form->createView(),
        ]);
    }
}