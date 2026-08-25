<?php

namespace app\controllers;

use MVC\Controller;
use MVC\Cookies;

use app\models\Posts;

class PostController extends Controller
{
    function any(Posts $model, $action, Cookies $cookies)
    {
        $value = $model->get($action);

        if(!$value) return $this->notFound();

        if($cookies->views)
        {
            $views = json_decode($cookies->views);
            if(!array_search($value->id, $views))
            {

                $views[] = $value->id;
                $cookies->views = json_encode($views);
                $model->updateView($value->link);
                $value->views = $value->views + 1;
            }
        }
        else
        {
            $views = [0, $value->id];
            $cookies->views = json_encode($views);
            $model->updateView($value->link);
            $value->views = $value->views + 1;
        }

        $data["value"] = $value;

        $this->view("post", $data);
    }

    function like(\app\models\Posts $model, $parrams, Cookies $cookies)
    {
        $value = $model->get($parrams[0]);
        $result = false;

        if($cookies->likes)
        {
            $likes = json_decode($cookies->likes);
            if(!array_search($value->id, $likes))
            {

                $likes[] = $value->id;
                $cookies->likes = json_encode($likes);
                $model->updateLike($value->id);
                $result = true;
            }
        }
        else
        {
            $likes = [0, $value->id];
            $cookies->likes = json_encode($likes);
            $model->updateLike($value->id);
            $result = true;
        }

        echo $result;
        exit;
    }
}