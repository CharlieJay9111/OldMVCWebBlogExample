<?php

namespace app\controllers;

use MVC\Controller;
use MVC\User;

class AdminController extends Controller
{
    private User $user;

    function __construct(User $user, $action)
    {
        $this->user = $user;
        
        if($action == "index") return;

        if(!$this->user->isLogged())
        {
            $this->notFound();
        }
    }

    function index($request)
    {
        if($this->user->isLogged())
        {
            $this->view("admin/index");
            return;
        }


        $form = new \MVC\Form\FormReader($request->post());
        $form->readFile("admin/forms/login");
        
        if($form->isValidate())
        {
            if($form->data["username"] == "admin" && $form->data["password"] == "admin")
            {
                $this->user->login($form->data);
                $this->redirect();
            }
            else
            {
                $form->addErrorTo("password", "Neplatná data");
            }

        }

        $data = ["form" => $form->get()];

        $this->view("admin/login", $data);
    }

    function posts(\app\models\Posts $posts)
    {
        $data["values"] = $posts->getAll();

        $this->view("admin/posts", $data);
    }

    function addPost(\app\models\Posts $posts)
    {
        $data["values"] = $posts->getCategories();

        $this->view("admin/add-post", $data);
    }

    function updatePost(\app\models\Posts $posts, $parrams)
    {
        $data["values"] = $posts->get($parrams[0]);

        if(!$data["values"]) return $this->notFound();
    }

    function categories(\app\models\Posts $posts)
    {
        $data["values"] = $posts->getCategories();
    }

    function logout()
    {
        $this->user->logout();
        $this->redirect("admin");
    }
}