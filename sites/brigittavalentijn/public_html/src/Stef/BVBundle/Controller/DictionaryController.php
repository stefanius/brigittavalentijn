<?php

namespace Stef\BVBundle\Controller;

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
        if ($letter === null) {
            $wordlist = [];
        } elseif (is_string($letter) && strlen($letter) === 1 && !is_numeric($letter)) {
            $wordlist = $this->getDictionaryManager()->simpleQueryBuilding([
                'where' => 'e.firstLetter like :letter',
                'param' => ['letter', $letter]
            ]);
        } else {
            return $this->redirect('/begrippenlijst');
        }

        return $this->render('StefBVBundle:Dictionary:index.html.twig', [
            'letter' => $letter,
            'wordlist' => $wordlist
        ]);
    }
}