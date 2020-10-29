<?php
namespace Oshop\Models;
use Oshop\Utils\Database;
use Oshop\Models\ProductManager;

class ProductManagerPdo extends ProductManager {

    public function find($id)
    {
        $pdoDbconnexion = Database::getPDO();
        $req = $pdoDbconnexion->prepare('SELECT * FROM product WHERE id = :id');
        $req->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $req->execute();

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Oshop\Classes\Product');

        if($product = $req->fetch())
        {
            $product->setUpdatedAt(new \Datetime($product->updatedAt()));
            $product->setCreatedAt(new \Datetime($product->createdAt()));
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
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Oshop\Classes\Product');
        $list = $req->fetchAll();

        foreach ($list as $product)
        {
            $product->setUpdatedAt(new \Datetime($product->updatedAt()));
            $product->setCreatedAt(new \Datetime($product->createdAt()));
        }

        return $list;

    }

    public function getProductsList(array $params = [])
    {
        $pdoDbconnexion = Database::getPDO();

        $sql = 'SELECT * FROM product';

        if (!empty($params)) {

            $field = $params['slug'].'Id';
            $sql .= ' WHERE ' . $field. ' = ' . (int) $params['id'];
        }
        
        $req = $pdoDbconnexion->query($sql);
        /* $req->bindValue(':id', (int) $params['id'], \PDO::PARAM_INT);
        $req->execute(); */

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Oshop\Classes\Product');

        $list = $req->fetchAll();

        foreach ($list as $product)
        {
            $product->setUpdatedAt(new \Datetime($product->updatedAt()));
            $product->setCreatedAt(new \Datetime($product->createdAt()));
        }
        
        return $list;
    }

    public function count($params = null){

        $pdoDbconnexion = Database::getPDO();

        $sql = 'SELECT COUNT(*) FROM product';

        if (null !== $params){

            $theme = $params['slug'] .= 'Id';
            $sql .= ' WHERE '.$theme. ' = '. (int) $params['id'];
        }

        return $pdoDbconnexion->query($sql)->fetchColumn();
        
    }

    /* public function getProductsFromCategory($categoryId)
    {
        $pdoDbconnexion = Database::getPDO();

        $sql = 'SELECT * FROM product WHERE categoryId = '. (int) $categoryId;

        $req = $pdoDbconnexion->query($sql);
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Oshop\Classes\Product');

        $list = $req->fetchAll();

        foreach ($list as $product)
        {
            $product->setUpdatedAt(new \Datetime($product->updatedAt()));
            $product->setCreatedAt(new \Datetime($product->createdAt()));
        }

        return $list;
    } */

    /* public function getProductsFromBrand($brandId)
    {
        $pdoDbconnexion = Database::getPDO();

        $sql = 'SELECT product.* FROM product, brand WHERE product.brand_id = '. (int) $brandId;

        $req = $pdoDbconnexion->query($sql);
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Oshop\Classes\Brand');

        $list = $req->fetchAll();

        foreach ($list as $product)
        {
            $product->setUpdatedAt(new \Datetime($product->updatedAt()));
            $product->setCreatedAt(new \Datetime($product->createdAt()));
        }

        return $list;
    } */





}