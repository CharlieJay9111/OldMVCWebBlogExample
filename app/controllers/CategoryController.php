<?php

namespace app\controllers;

use MVC\Controller;
use MVC\Utils\Paginator;

use app\models\Posts;

class CategoryController extends Controller
{
    function any(Posts $model, $action, $parrams, $url)
    {
        $value = $model->getCategory($action);

        if(!$value) return $this->notFound();

        $page = $parrams[0] ?? 1;
        $values = $model->getPageCategory($page, $value->id);

        if(!$values) return $this->notFound();

        $paginator = new Paginator($page, $model->countCategory($value->id), 10,  $url . "category/$action/<page>", 4);

        $data = [
            "posts" => $values,
            "categories" => $model->getCategories(),
            "popular" => $model->getPopular(),
            "favorite" => $model->getFavorite(),
            "pagination" => $paginator->get(),
            "title" => $value->name,
        ];

        $this->view("category", $data);
    }
}