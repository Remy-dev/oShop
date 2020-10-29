<?php
namespace Oshop\Classes;


class Brand extends Entity {

    protected $footerOrder;
    /**
     * Get the listof all brands
     *
     * @return void
     */

    /* public function findAll() {

        $sql = 'SELECT * FROM brand';

        $pdoDBConnexion = Database::getPDO();

        $pdoStatement = $pdoDBConnexion->query($sql); 
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Brand');
        
        $list = $pdoStatement->fetchAll();

        foreach($list as $brand)
        {
            $brand->setCreatedAt(new Datetime($brand->createdAt()));
            $brand->setUpdatedAt(new Datetime($brand->updatedAt()));
        }

        return $list;
    }

    public function findFooterBrands() {
        $sql= '
            SELECT *
            FROM brand
            WHERE footerOrder > 0
            ORDER BY footerOrder ASC
            LIMIT 5';

        $pdoDBConnexion = Database::getPDO();
        $pdoStatement = $pdoDBConnexion->query($sql);
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Brand');
        $result = $pdoStatement->fetchAll();

        foreach($result as $brand)
        {
            $brand->setCreatedAt(new Datetime($brand->createdAt()));
            $brand->setUpdatedAt(new Datetime($brand->updatedAt()));
        }

        return $result;
    }

    public function find($id) {

        $pdoDBConnexion = Database::getPDO();
        $req = $pdoDBConnexion->prepare('SELECT * FROM brand WHERE id = :id');
        $req->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $req->execute();

        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Brand');

        if($brand = $req->fetch()){

            $brand->setUpdatedAt(new Datetime($brand->updatedAt()));
            $brand->setCreatedAt(new Datetime($brand->createdAt())); 
        }

        return $brand;
    } */

    public function setFooterOrder($footerOrder)
    {
        $footerOrder = (int) $footerOrder;

        $this->footerOrder = $footerOrder;
    }

    public function footerOrder()
    {
        return $this->footerOrder;
    }

}