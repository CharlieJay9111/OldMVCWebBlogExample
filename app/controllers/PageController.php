<?php

namespace app\controllers;


use MVC\Controller;
use MVC\Utils\Paginator;

use app\models\Posts;

class PageController extends Controller
{
    function index(Posts $model, $url, $request)
    {
        $this->any($model, 1, $url, $request);
    }

    function any(Posts $model, $action, $url, $request)
    {
        $search = $request->get("search");

        if(!$search)
        {
            $values = $model->getPage($action);
            $count = $model->count();
            $pUrl = $url . "page/<page>";

            if(!$values) return $this->notFound();
        }
        else
        {
            $values = $model->getSearch($action, $search);
            $count = $model->countSearch($search);
            $pUrl = $url . "page/<page>/?search=$search";
        }
        
        $paginator = new Paginator($action, $count, 10, $pUrl , 4);

        $data = [
            "posts" => $values,
            "categories" => $model->getCategories(),
            "popular" => $model->getPopular(),
            "favorite" => $model->getFavorite(),
            "pagination" => $paginator->get(),
            "search" => $search
        ];

        $this->view("index", $data);
    }
}