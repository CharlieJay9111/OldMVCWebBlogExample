<?php

namespace app\models;

class Posts extends \MVC\Model 
{
    protected $tableName = "posts";
    public $count;

    public function get($link)
    {
        return $this->table()->where("link = ?", [$link])->fetch();
    }

    public function getAll()
    {
        return $this->table("posts p, categories c ")
            ->select("p.*, c.name as category")
            ->where("p.category_id = c.id")
            ->order("p.id")
            ->fetchAll();
    }

    public function getPage($page, $limit = 10)
    {
        $offset = ($page - 1) * $limit; 
        return $this->table()->order("created_at DESC")->limit($limit, $offset)->fetchAll();
    }

    public function getSearch($page, $search, $limit = 10)
    {
        $offset = ($page - 1) * $limit; 
        return $this->table()
            ->where("title LIKE ? OR content LIKE ?", ["%$search%","%$search%"])
            ->order("created_at DESC")
            ->limit($limit, $offset)
            ->fetchAll();
    }

    public function getCategories()
    {
        return $this->table("categories")->fetchAll();
    }

    public function getPopular()
    {
        return $this->table()->order("views DESC")->limit(10)->fetchAll();
    }

    public function getFavorite()
    {
        return $this->table()->order("likes DESC")->limit(10)->fetchAll();
    }

    public function getCategory($link)
    {
        return $this->table("categories")->where("link = ?", [$link])->fetch();
    }

    public function getPageCategory($page, $id, $limit = 10)
    {
        $offset = ($page - 1) * $limit; 
        return $this->table()->where("category_id = ?", [$id])->order("created_at DESC")->limit($limit, $offset)->fetchAll();
    }

    public function updateLike($id)
    {
        $data = $this->table()->where("id = ?", [$id])->fetch();
        if(!$data) return false;

        $count = $data->likes + 1;
        $this->table()->update(["likes" => $count], "id = $data->id");
        return true;
    }

    public function updateView($link)
    {
        $data = $this->table()->where("link = ?", [$link])->fetch();
        if(!$data) return false;

        $count = $data->views + 1;
        $this->table()->update(["views" => $count], "id = $data->id");
        return true;
    }

    public function count()
    {
        return $this->table()->count();
    }

    public function countSearch($search)
    {
        return $this->table()
            ->where("title LIKE ? OR content LIKE ?", ["%$search%","%$search%"])
            ->count();
    }

    public function countCategory($id)
    {
        return $this->table()->where("category_id = ?", [$id])->count();
    }
}