<?php

namespace app\controllers;

class Posts extends \core\Controller
{
    public function indexAction()
    {
        echo 'post-index';
    }

    public function addNewAction()
    {
        echo 'post-addNew';
    }

    public function editAction()
    {
        echo 'post-edit';
    }
}
