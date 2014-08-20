<?php

namespace Stef\BVBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

interface AdminControllerInterface
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request);

    /**
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, $id);

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction();

}