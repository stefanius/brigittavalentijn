<?php

namespace Stef\BVBundle\Controller;

use Stef\SimpleCmsBundle\Entity\Page;

class DictionaryController extends BaseController
{
    /**
     * Show a dictionary entry
     */
    public function showAction($slug)
    {
        $dictionary = $this->getDictionaryManager()->read($slug);

        if (!$dictionary) {
            throw $this->createNotFoundException('Unable to find News post.');
        }

        return $this->render('StefBVBundle:Dictionary:show.html.twig', [
            'page'       => $dictionary,
        ]);
    }

    /**
     * Show a dictionary entry
     */
    public function indexAction($letter = null)
    {
        $page = new Page();

        if ($letter === null) {
            $wordlist = [];
            $page->setTitle("Begrippenlijst");
            $page->setDescription("De Haagse Scoutinggroep Brigitta / Valentijn heeft activiteiten die soms om wat uitleg vragen. Kijk in onze begrippenlijst voor meer uitleg! De BV van A - Z compleet!");
        } elseif (is_string($letter) && strlen($letter) === 1 && !is_numeric($letter)) {
            $wordlist = $this->getDictionaryManager()->simpleQueryBuilding([
                'where' => 'e.firstLetter like :letter',
                'param' => ['letter', $letter]
            ]);

            $page->setTitle("Begrippenlijst - " . ucfirst($letter));
            $page->setDescription("De letter " . ucfirst($letter) . " heeft bij ons " . count($wordlist) . " verschillende betekenissen! De Brigitta / Valentijn verteld je alles wat je wilt weten over begrippen met de letter " . ucfirst($letter) . "!");
        } else {
            return $this->redirect('/begrippenlijst');
        }

        return $this->render('StefBVBundle:Dictionary:index.html.twig', [
            'letter' => $letter,
            'wordlist' => $wordlist,
            'page' => $page
        ]);
    }
}