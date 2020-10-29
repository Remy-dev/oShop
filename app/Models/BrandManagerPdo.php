<?php
namespace Oshop\Models;
use Oshop\Utils\Database;

// use Oshop\Models\BrandsManager;

class BrandManagerPdo extends BrandManager {
    
    public function findAll() {

        $sql = 'SELECT * FROM brand';

        $pdoDBConnexion = Database::getPDO();

        $pdoStatement = $pdoDBConnexion->query($sql); 
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Oshop\Classes\Brand');
        
        $list = $pdoStatement->fetchAll();

        foreach($list as $brand)
        {
            $brand->setCreatedAt(new \Datetime($brand->createdAt()));
            $brand->setUpdatedAt(new \Datetime($brand->updatedAt()));
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
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Oshop\Classes\Brand');
        $result = $pdoStatement->fetchAll();

        foreach($result as $brand)
        {
            $brand->setCreatedAt(new \Datetime($brand->createdAt()));
            $brand->setUpdatedAt(new \Datetime($brand->updatedAt()));
        }

        return $result;
    }

    public function find($id) {

        $pdoDBConnexion = Database::getPDO();
        $req = $pdoDBConnexion->prepare('SELECT * FROM brand WHERE id = :id');
        $req->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $req->execute();

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Oshop\Classes\Brand');

        if($brand = $req->fetch()){

            $brand->setUpdatedAt(new \Datetime($brand->updatedAt()));
            $brand->setCreatedAt(new \Datetime($brand->createdAt())); 
        }

        return $brand;
    }

    public function findDatasForBrand()
    {
       $sql = 'SELECT brand.name, type.name as typeName, product.picture, product.brandId, category.subtitle 
               FROM brand
               INNER JOIN product
               ON product.brandId = brand.id 
               INNER JOIN category
               ON category.id = product.categoryId
               INNER JOIN type
               ON product.typeId = type.id';

               

       $pdoDBConnexion = Database::getPDO();

       $req = $pdoDBConnexion->query($sql);
       $req->setFetchMode(\PDO::FETCH_ASSOC);
       $list = $req->fetchAll();
       
       return $list;

   }
}