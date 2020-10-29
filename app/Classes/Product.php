<?php
namespace Oshop\Classes;

class Product extends Entity {

    protected $description;
    protected $picture;
    protected $price;
    protected $rate;
    protected $status;
    protected $brandId;
    protected $categoryId;
    protected $typeId;



    /* public function find($id)
    {
        $pdoDbconnexion = Database::getPDO();
        $req = $pdoDbconnexion->prepare('SELECT * FROM product WHERE id = :id');
        $req->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $req->execute();

        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Product');

        if($product = $req->fetch())
        {
            $product->setUpdatedAt(new Datetime($product->updatedAt()));
            $product->setCreatedAt(new Datetime($product->createdAt()));
        }

        return $product;
    }

    public function findAll($limit = -1, $debut = -1)
    {
        $pdoDbconnexion = Database::getPDO();
        $sql = 'SELECT * FROM product';

        if ($limit !== -1 || $debut !== -1){
            $sql .= ' LIMIT '. $limit . ' OFFSET ' .$debut;
        }

        $req = $pdoDbconnexion->query($sql);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Product');
        $list = $req->fetchAll();

        foreach ($list as $product)
        {
            $product->setUpdatedAt(new Datetime($product->updatedAt()));
            $product->setCreatedAt(new Datetime($product->createdAt()));
        }

        return $list;

    } */

    public function setDescription($description)
    {
        if (is_string($description))
        {
            $this->description = $description;
        }
    }

    public function setPicture($picture)
    {
        $this->picture= $picture;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setRate($rate)
    {
        $rate = (int) $rate;

        $this->rate = $rate;
    }

    public function setStatus($status)
    {
        $status = (int) $status;

        $this->statuts = $status;
    }



    public function setBrandId($brandId)
    {
        
        $brandId = (int) $brandId;
        $this->brandId = $brandId;
    }

    public function setCategoryId($categoryId)
    {
        $categoryId = (int) $categoryId;

        $this->categoryId = $categoryId;
    }

    public function setTypeId($typeIdd)
    {
        $typeId = (int) $typeId;

        $this->typeId = $typeId;
    }


    public function description()
    {
        return $this->description;
    }

    public function picture()
    {
        return $this->picture;
    }

    public function price()
    {
        return $this->price;
    }

    public function rate()
    {
        return $this->rate;
    }

    public function status()
    {
        return $this->status;
    }


    public function brandId()
    {
        return $this->brandId;
    }

    public function categoryId()
    {
        return $this->categoryId;
    }

    public function typeId()
    {
        return $this->typeId;
    }
}