<?php 
namespace Oshop\Models;
use Oshop\Utils\Database;
use Oshop\Models\TypeManager;

class TypeManagerPdo extends TypeManager
{
    public function find($id)
    {
        $pdoDbconnexion = Database::getPDO();
        $req = $pdoDbconnexion->prepare('SELECT * FROM type WHERE id = :id');
        $req->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Oshop\Classes\Type');

        if ($type = $req->fetch()) {
            $type->setUpdatedAt(new \Datetime($type->updatedAt()));
            $type->setCreatedAt(new \Datetime($type->createdAt()));
        }
        //dump($type);
        return $type;
    }

    public function findFooterTypes()
    {
        $sql= '
            SELECT *
            FROM type
            WHERE footerOrder > 0
            ORDER BY footerOrder ASC
            LIMIT 5';

        $pdoDBConnexion = Database::getPDO();
        $pdoStatement = $pdoDBConnexion->query($sql);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Oshop\Classes\Type');
        $result = $pdoStatement->fetchAll();

        foreach ($result as $type) {
            $type->setCreatedAt(new \Datetime($type->createdAt()));
            $type->setUpdatedAt(new \Datetime($type->updatedAt()));
        }

        return $result;
    }

    public function findAll()
    {
        $pdoDbconnexion = Database::getPDO();
        $sql = 'SELECT * FROM type';
        $req = $pdoDbconnexion->query($sql);
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Oshop\Classes\Type');

        $list = $req->fetchAll();

        foreach ($list as $type) {
            $type->setUpdatedAt(new \Datetime($type->updatedAt()));
            $type->setCreatedAt(new \Datetime($type->createdAt()));
        }
        
        return $list;
    }

   public function findDatasForType()
   {
       $sql = 'SELECT type.name, product.picture, product.typeId, category.subtitle 
               FROM type 
               INNER JOIN product
               ON product.typeId = type.id 
               INNER JOIN category
               ON category.id = product.categoryId';

       $pdoDBConnexion = Database::getPDO();

       $req = $pdoDBConnexion->query($sql);
       $req->setFetchMode(\PDO::FETCH_ASSOC);
       $list = $req->fetchAll();
       
       return $list;

   }
}