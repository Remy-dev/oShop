<?php
namespace Oshop\Models;
use Oshop\Utils\Database;
use Oshop\Models\CategoryManager;

class CategoryManagerPdo extends CategoryManager
{
    public function find($id)
    {
        $pdoDbconnexion = Database::getPDO();
        $req = $pdoDbconnexion->prepare('SELECT * FROM category WHERE id = :id');
        $req->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Oshop\Classes\Category');

        if ($category = $req->fetch()) {
            $category->setUpdatedAt(new \Datetime($category->updatedAt()));
            $category->setCreatedAt(new \Datetime($category->createdAt()));
        }
        
        return $category;
    }

    public function findAll($limit = -1, $debut = -1)
    {
        $pdoDbconnexion = Database::getPDO();
        $sql = 'SELECT * FROM category WHERE homeOrder > 0 ORDER BY homeOrder ASC';

        if ($limit != -1 || $debut != -1) {
            $sql .= ' LIMIT '.$limit;
        }

        $req = $pdoDbconnexion->query($sql);
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Oshop\Classes\Category');

        $list = $req->fetchAll();

        foreach ($list as $category) {
            $category->setUpdatedAt(new \Datetime($category->updatedAt()));
            $category->setCreatedAt(new \Datetime($category->createdAt()));
        }
        
        return $list;
    }

    public function getCategoriesList(array $params = [])
    {
        $pdoDbconnexion = Database::getPDO();

        $sql = 'SELECT * FROM category';

        if (!empty($params)) {

            $field = $params['slug'].'Id';
            $sql .= ' WHERE ' . $field. ' = ' . (int) $params['id'];
        }
        
        $req = $pdoDbconnexion->query($sql);
        /* $req->bindValue(':id', (int) $params['id'], \PDO::PARAM_INT);
        $req->execute(); */

        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Oshop\Classes\Category');

        $list = $req->fetchAll();

        foreach ($list as $category)
        {
            $category->setUpdatedAt(new \Datetime($category->updatedAt()));
            $category->setCreatedAt(new \Datetime($category->createdAt()));
        }
        
        return $list;
    }

    public function findSubtitleForType($typeId)
    {
        $typeId = (int) $typeId;
        $pdoDbconnexion = Database::getPDO();

        $sql = 'SELECT category.subtitle FROM category, product, type WHERE type.id = :typeId AND product.typeId = type.id AND category.id = product.categoryId';

        $req = $pdoDbconnexion->prepare($sql);
        $req->bindValue(':typeId', (int) $typeId, \PDO::PARAM_INT);
        $req->execute();

        $subtitle = $req->fetchColumn();

        return $subtitle;
        
    }

    
}