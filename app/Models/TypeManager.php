<?php 
namespace Oshop\Models;


abstract class TypeManager {

    /**
     * Méthode retournan un type 
     *
     * @param int $id
     * @return Type
     */
    abstract public function find($id);

    /**
     * Méthode retournant une liste de types pour le footer limiter a 5 résultat
     *
     * @return array Type
     */
    abstract public function findFooterTypes();

    /**
     * Méthode retournant une liste de tous les types
     *
     * @return array Type
     */
    abstract public function findAll();

    /**
     * Méthode retournant une liste des données nécessaire à l'affichage de la liste des types
     *
     * @return array
     */
    abstract public function findDatasForType();
}