<?php
namespace Oshop\Models;

abstract class CategoryManager {

    /**
     * Méthode retournant une catégorie particulière
     *
     * @param int $id
     * @return Category
     */
    abstract public function find($id);

    /**
     * Méthode retournant toutes les catégories ou avec une limite et un décalage
     * @param void | int
     * @return array Category
     */
    abstract public function findAll($limit = -1, $debut = -1);

    /**
     * Méthode retournant toutes les catégories ou selon un theme
     *
     * @param array $params
     * @return array Category
     */
    abstract public function getCategoriesList(array $params = []);

    /**
     * Méthode retournant le sous-titre correspondant au type par rapport a la category
     *
     * @param array $params
     * @return string
     */
    abstract public function findSubtitleForType($typeId);
}