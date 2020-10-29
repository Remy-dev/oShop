<?php
namespace Oshop\Classes;
class Category extends Entity {

    protected $subtitle;
    protected $picture;
    protected $homeOrder;


    /* public function find($id)
    {
        $pdoDbconnexion = Database::getPDO();
        $req = $pdoDbconnexion->prepare('SELECT * FROM category WHERE id = :id');
        $req->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Category');

        if ($category = $req->fetch())
        {
            $category->setUpdatedAt(new Datetime($category->updatedAt()));
            $category->setCreatedAt(new Datetime($category->createdAt()));
        }
        
        return $category;
    }

    public function findAll($limit = -1, $debut = -1)
    {
        $pdoDbconnexion = Database::getPDO();
        $sql = 'SELECT * FROM category WHERE homeOrder > 0 ORDER BY homeOrder ASC';

        if ($limit != -1 || $debut != -1)
        {
            $sql .= ' LIMIT '.$limit;
        }

        $req = $pdoDbconnexion->query($sql);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Category');

        $list = $req->fetchAll();

        foreach ($list as $category){

            $category->setUpdatedAt(new Datetime($category->updatedAt()));
            $category->setCreatedAt(new Datetime($category->createdAt()));
        }
        
        return $list;
    } */
    

    

    public function setSubtitle($subtitle)
    {
        if (is_string($subtitle))
        {
            $this->subtitle = $subtitle;
        }
    }

    public function setPicture($picture)
    {
        if (is_string($picture)) 
        {
            $this->picture = $picture;
        }
    }

    public function setHomeOrder($homeOrder)
    {
        $homeOrder = (int) $homeOrder;

        $this->homeOrder = $homeOrder;
    }


   

    public function subtitle()
    {
        return $this->subtitle;
    }

    public function picture()
    {
        return $this->picture;
    }

    public function homeOrder()
    {
        return $this->homeOrder;
    }

    public function createdAt()
    {
        return $this->createdAt;
    }

    public function updatedAt()
    {
        return $this->updatedAt;
    }

}