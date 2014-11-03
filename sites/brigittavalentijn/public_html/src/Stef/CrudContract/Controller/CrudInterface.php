<?php

namespace Stef\CrudContract\Controller;

use Symfony\Component\HttpFoundation\Request;

interface CrudInterface {
    /**
     * Create a new record
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request);

    /**
     * Read (view) a record
     *
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function readAction(Request $request, $id);

    /**
     * Update (edit) a record
     *
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function updateAction(Request $request, $id);

    /**
     * Delete a record
     *
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, $id);

    /**
     * Load all records on a indexpage
     *
     * @param Request $request
     * @return mixed
     */
    public function indexAction(Request $request);
} 