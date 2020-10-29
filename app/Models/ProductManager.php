<?php
namespace Oshop\Models;
abstract class ProductManager {

    /**
     * Méthode retournant un produit particulier
     *
     * @param int $id
     * @return Product
     */
    abstract public function find($id);

    /**
     * Méthode retournant la liste des produits avec possibilité  de limit et d'offset
     *
     * @param int $limit
     * @param int $debut
     * @return array Product
     */
    abstract public function findAll($limit = -1, $debut = -1);

    /**
     * Méthode retournant une liste de Produits d'après une catégorie donnée
     *
     * @param int $categoryId
     * @return array Product
     */
   /*  abstract public function getProductsFromCategory($categoryId); */

    /**
     * Méthode retournant la liste des produits d'après une marque donnée
     *
     * @param int $brandId
     * @return array Product
     */
   /*  abstract public function getProductsFromBrand($brandId); */

    /**
     * Méthode retounant la liste des produits selon un theme choisi ou tout les produits
     *
     * @param string $specifiedTheme
     * @param int $specifiedThemeId
     * @return array Product
     */
    abstract  public function getProductsList(array $params);

    /**
     * Méthode retournant le total de produit dans la bdd ou selon un theme défini
     *
     * @param array $params
     * @return int
     */
    abstract public function count($params = null);
}