<?php
namespace Oshop\Classes;
class Type extends Entity {

    protected $footerOrder;

    /* public function find($id)
    {
        $pdoDbconnexion = Database::getPDO();
        $req = $pdoDbconnexion->prepare('SELECT * FROM type WHERE id = :id');
        $req->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Type');

        if ($type = $req->fetch())
        {
            $type->setUpdatedAt(new Datetime($type->updatedAt()));
            $type->setCreatedAt(new Datetime($type->createdAt()));
        }
        
        return $type;
    }

    public function findFooterTypes() {
        $sql= '
            SELECT *
            FROM type
            WHERE footerOrder > 0
            ORDER BY footerOrder ASC
            LIMIT 5';

        $pdoDBConnexion = Database::getPDO();
        $pdoStatement = $pdoDBConnexion->query($sql);
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Type');
        $result = $pdoStatement->fetchAll();

        foreach($result as $type)
        {
            $type->setCreatedAt(new Datetime($type->createdAt()));
            $type->setUpdatedAt(new Datetime($type->updatedAt()));
        }

        return $result;
    }

    public function findAll()
    {
        $pdoDbconnexion = Database::getPDO();
        $sql = 'SELECT * FROM type';
        $req = $pdoDbconnexion->query($sql);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Category');

        $list = $req->fetchAll();

        foreach ($list as $type){

            $type->setUpdatedAt(new Datetime($type->updatedAt()));
            $type->setCreatedAt(new Datetime($type->createdAt()));
        }
        
        return $list;
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