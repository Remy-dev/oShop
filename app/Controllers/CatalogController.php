<?php

namespace Oshop\Controllers;

use Oshop\Models\CategoryManagerPdo;
use Oshop\Models\TypeManagerPdo;
use Oshop\Models\BrandManagerPdo;
use Oshop\Models\ProductManagerPdo;
use Oshop\Controllers\BackController;


class CatalogController extends BackController{

    public function category($params) {
        $brandArray = [];

       // $categoryModel = new Category();
        $categoryModel = new CategoryManagerPdo();
           
        $category =  $categoryModel->find($params['id']);
    
        $productModel = new ProductManagerPdo();
        $productForCategory = $productModel->getProductsList($params);

        foreach ($productForCategory as $product)
        {
            $brand = new BrandManagerPdo();
            $brandArray[] = $brand->find($product->brandId());
        }
       

        $dataForCategory = [
            'categoryId' => $params['id'],
            'category' => $category,
            'products' => $productForCategory,
            'brands' => $brandArray
        ];

        $this->show('category', $dataForCategory);
    }

    public function categoriesList()
    {
        $categoriesListModel = new CategoryManagerPdo();
        $categoriesList = $categoriesListModel->findAll();

        $datasCategoriesList = [
            'categoriesList' => $categoriesList
        ];

        $this->show('categoriesList', $datasCategoriesList);
        
    }

    public function product($params) {

        $productModel = new ProductManagerPdo();
        $product = $productModel->find($params['id']);
        

        $categoryModel = new CategoryManagerPdo();
        $category =  $categoryModel->find($product->categoryId());

        $brandModel = new BrandManagerPdo();
        $brand = $brandModel->find($product->brandId());

        $dataForProduct = [
            'productId' => $params['id'],
            'product' => $product,
            'category' => $category,
            'brand' => $brand
        ];

        $this->show('product', $dataForProduct);
    }


    public function typesList()
    {   
        $typeModel = new TypeManagerPdo();
        $typesList = $typeModel->findDatasForType();
        $typeName = null;
        $list = [];
        foreach($typesList as $type) {
            
            if ($type['name'] == $typeName) {
                continue;
            } else {
                $list[] = $type;
                $typeName = $type['name'];
            }
        }
        
        $dataForTypes = [
            'typesList' => $list
        ];

        $this->show('typesList', $dataForTypes);
    }



    public function brandsList(){

        $brandModel = new BrandManagerPdo();
        $brandList = $brandModel->findDatasForBrand();

        $brandName = [];
        $typeName = [];
        $list = [];

        foreach($brandList as $brand) {
            
            if (in_array($brand['name'], $brandName) && !in_array($brand['typeName'], $typeName)) {

                continue;

            } elseif (!in_array($brand['name'], $brandName) && in_array($brand['typeName'], $typeName)){

                continue;

            } elseif (in_array($brand['name'], $brandName) && in_array($brand['typeName'], $typeName)){

                continue;

            } else {
                $list[] = $brand;
                $brandName[] = $brand['name'];
                $typeName[] = $brand['typeName'];
            }
        }
        
        $dataForBrands = [
            'brandsList' => $list
        ];

        $this->show('brandsList', $dataForBrands);
    }



    public function productsList(array $params = [])
    {
        $correspondence = [];
        $list = [];
        $themeName = '';
        $slug = ucfirst($params['slug']);
        $model = 'Oshop\\Models\\'. $slug . 'ManagerPdo';

        $productsListModel = new ProductManagerPdo();
        $productsList = $productsListModel->getProductsList($params);
        $productsCount = $productsListModel->count($params);

        $themeListModel = new $model();
        $themeList = $themeListModel->find($params['id']);
        
        
        foreach ($productsList as $product)
        {
            $correspondence[] = $themeListModel->find($product->typeId());
        }
        
        foreach ($correspondence as $key => $theme)
        {
            if ($theme->name() == $themeName)
            {
                continue;

            } else {

                $themeName = $theme->name();
                $list[] = $theme;
            }
        }

        $datasForProductsList = [
            'productsList' => $productsList,
            'count' => $productsCount,
            'theme' => $list
        ];
        
        $this->show('productsList', $datasForProductsList);
    }
    /* public function type($params) {

        $typeModel = new TypeManagerPdo();
        $type = $typeModel->find($params['id']);

        $dataForTYpe =[
            'type_id' => $params['id'],
            'type' => $type
        ];

        $this->show('type', $dataForTYpe);
    } */
    /* public function productsList($params = null)
    {
       
        $productsListModel = new ProductsManagerPdo();
        $productsList = $productListModel->findAll();

        $productsCount = $productsListModel->count($params);

        $datasForProductsList = [
            'productsList' => $productsList,
            'count' => $productsCount
        ];
        
        $this->show('productsList', $datasForProductsList);
    } */
        /* public function brand($params) {

        $brandModel = new BrandManagerPdo();
        $brand = $brandModel->find($params['id']);

        $brandListModel = new BrandManagerPdo();
        $brandList = $brandListModel->findAll();


        $dataForBrand = [
            'brandId' => $params['id'],
            'brand' => $brand,
            'brandList' => $brandList
        ];

        $this->show('brand', $dataForBrand);
    } */
}