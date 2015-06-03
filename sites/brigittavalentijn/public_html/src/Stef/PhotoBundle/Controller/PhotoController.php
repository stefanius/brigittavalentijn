<?php
namespace Stef\PhotoBundle\Controller;

use Stef\BVBundle\Controller\BaseController;
use Stef\SimpleCmsBundle\Entity\Page;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;

class PhotoController extends BaseController
{
    /**
     * Quick and dirty, where the hell is the configuration of the WEB dir?!
     *
     * TODO: Fix this
     */
    protected function getWebDir ()
    {
        $baseroot = $this->get('kernel')->getRootDir();

        $root = rtrim($baseroot, '/app');

        return $root . '/web';
    }

    /**
     * @param int $dept
     *
     * @return Finder
     */
    protected function finder($dept = 0)
    {
        $finder = new Finder();
        $finder->depth($dept);

        return $finder;
    }

    /**
     * @param $path
     * @param int $dept
     *
     * @return Finder
     */
    protected function findDirectories($path, $dept = 0)
    {
        $finder = $this->finder($dept);

        if (file_exists($path)) {
            $finder->directories()->in($path);
        }

        return $finder;
    }

    /**
     * @param $path
     * @param int $dept
     *
     * @return Finder
     */
    protected function findFiles($path, $dept = 0)
    {
        $finder = $this->finder($dept);

        if (file_exists($path)) {
            $finder->files()->in($path);
        }

        return $finder;
    }

    protected function checkSeasonConstraints($year_1 = null, $year_2 = null)
    {
        $max = 2017;
        $min = 1960;

        if (!is_numeric($year_1) || !is_numeric($year_2)) {
            return false;
        }

        if (strlen($year_1) != 4 && strlen($year_2) != 4) {
            return false;
        }

        if ($year_1 < $min || $year_2 < $min) {
            return false;
        }

        if ($year_1 > $max || $year_2 > $max) {
            return false;
        }

        if ($year_1 > $year_2) {
            return false;
        }

        if (($year_2 - 1) == $year_1 && ($year_1 + 1) == $year_2) {
            return true;
        }

        return false;
    }

    public function showAllAlbumsAction(Request $request, $year_1 = null, $year_2 = null)
    {
        $route = $request->get('_route');
        $season = null;

        if ($route === 'stef_photo_season') {
            if ($this->checkSeasonConstraints($year_1, $year_2)) {
                $season = $year_1 . '-' . $year_2;
            } else {
                return $this->redirect($this->generateUrl('stef_photo_homepage'));
            }
        }

        if ($season == null) {
            $finder = $this->findDirectories($this->getWebDir() . '/photoalbum', 0);
        } else {
            $finder = $this->findDirectories($this->getWebDir() . '/photoalbum/' . $season, 0);

            try {
                if ($finder->count() === 0) {
                    return $this->redirect($this->generateUrl('stef_photo_homepage'));
                }
            } catch (\LogicException $e) {
                return $this->redirect($this->generateUrl('stef_photo_homepage'));
            }
        }

        $page = new Page();

        if ($route === 'stef_photo_season') {
            $page->setTitle("Fotoalbum - seizoen " . $season);
            $page->setBody("<p>Kies een van de " . $finder->count(). " albums hieronder uit het legendarische Brigitta / Valentijn seizoen " . $season  . "!</p>");
        } else {
            $page->setTitle("Fotoalbum - selecteer een van de seizoenen");
            $page->setBody("<p>Selecteer hieronder een seizoen naar keuze. Alle albums zijn gesorteerd per seizoen, maar kijk gerust ook naar de albums van de <a href=\"/over-ons/speltakken\">speltakken</a> zelf.");
        }

        return $this->render('StefPhotoBundle:AllAlbums:show.html.twig',
            [
                'finder' => $finder,
                'page'   => $page,
                'season' => $season
            ]
        );
    }

    public function showAlbumAction(Request $request, $year_1, $year_2, $album)
    {
        $season = null;

        if ($this->checkSeasonConstraints($year_1, $year_2)) {
            $season = $year_1 . '-' . $year_2;
        } else {
            return $this->redirect($this->generateUrl('stef_photo_homepage'));
        }

        $path =  '/photoalbum/' . $season . '/' . $album;
        $finder = $this->findFiles($this->getWebDir() . $path, 0);

        try {
            if ($finder->count() === 0) {
                return $this->redirect($this->generateUrl('stef_photo_homepage'));
            }
        } catch (\LogicException $e) {
            return $this->redirect($this->generateUrl('stef_photo_homepage'));
        }

        $page = new Page();

        $page->setTitle($album . ' (' . $season . ')');
        $page->setBody("<p>Foto's</p>");

        return $this->render('StefPhotoBundle:Album:show.html.twig',
            [
                'finder' => $finder,
                'page' => $page,
                'season' => $season,
                'album' => $album,
                'path' => $path
            ]
        );
    }
}