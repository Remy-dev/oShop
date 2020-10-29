<?php
namespace Oshop\Models;

abstract class BrandManager {

    /**
     * Méthode qui retourne la liste des marques
     * 
     * @return array Brand
     */
    abstract public function findAll();

    /**
     * Méthodes qui retourne la liste des marques avec une limite destinée au footer
     *
     * @return array Brand
     */
    abstract public function findFooterBrands();

    /**
     * Méthode qui retourne une marque précise
     *
     * @param int $id
     * @return void
     */
    abstract public function find($id);

    /**
     * Méthodes qui retourne les données nécessaire a la liste des marques
     *
     * 
     * @return array
     */
    abstract public function findDatasForBrand();

}