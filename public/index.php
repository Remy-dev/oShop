<?php


require __DIR__.'/../vendor/autoload.php';

use Oshop\Controllers\BackController;
use Oshop\Controllers\CatalogController;
// Fichier qui sert de FrontController
/* function noClassFoundCallBack($className){

    
}
spl_autoload_register('noClassFoundCallback');  */
// Inclusions des classes

$BackController = new BackController();
$router = new AltoRouter();
// http://localhost/s05/e02/S05-projet-oShop-Remy-dev/public/
$router->setBasePath($_SERVER['BASE_URI']);

// avec BackController

$router->addRoutes([
    [
        'GET',
        '/',
        [
            'controller' => 'BackController',
            'method' => 'home'
        ],
        'home'
    ],
    [
        'GET',
        '/legal-mentions',
        [
           'controller' => 'BackController',
           'method' => 'mentions'
        ],
        'legal-mentions'
    ],
    [
        'GET', // méthode autorisée pour cette route
        '/catalog/category/[i:id]',
        [
            'controller' => 'CatalogController',
            'method' => 'category'
        ],
        'catalog-category'
    ],
    [
        'GET',
        '/catalog/type/[i:id]',
        [
            'controller' => 'CatalogController',
            'method' => 'type'
        ],
        'catalog-type'
    ],
    [
        'GET',
        '/catalog/brand/[i:id]/[a:slug]',
        [
            'controller' => 'CatalogController',
            'method' => 'brand'
        ],
        'catalog-brand'
    ],
    [
        'GET',
        '/catalog/product/[i:id]',
        [
            'controller' => 'CatalogController',
            'method' => 'product'
        ],
        'catalog-product'  
    ],
    [
        'GET',
        '/catalog/productsList/[i:id]/[a:slug]',
        [
           'controller' => 'CatalogController',
           'method' => 'productsList'
        ],
        'catalog-productsList'
    ],
    [
        'GET',
        '/test',
        [
            'controller' => 'BackController',
            'method' => 'test'
        ],
        'test'
    ],
    [
        'GET',
        '/catalog/categoriesList',
        [
            'controller' => 'CatalogController',
            'method' => 'categoriesList'
        ],
        'catalog-categoriesList'
    ], 
    [
        'GET',
        '/catalog/typesList',
        [
            'controller' => 'CatalogController',
            'method' => 'typesList'
        ],
        'catalog-typesList'
    ],
    [
        'GET',
        '/catalog/brandsList',
        [
            'controller' => 'CatalogController',
            'method' => 'brandsList'
        ],
        'catalog-brandsList'
    ]
]);

$match = $router->match();


if($match){
    
    $methodToCall = $match['target']['method'];
    

    $controllerToUse = 'Oshop\\Controllers\\' . $match['target']['controller'];

    $params = $match['params'];
     
    $controller = new $controllerToUse($router);

    $controller->$methodToCall($params);



} else {

    $controller = new BackController($router);
    $controller->pageNotFound();
}

/* $router->map(
    'GET',
    '/',
    [
        'controller' => 'BackController',
        'method' => 'home'
    ],
    'home'
);

$router->map(
    'GET',
    '/legal-mentions',
    [
        'controller' => 'BackController',
        'method' => 'mentions'
    ],
    'legal-mentions'
);


$router->map(
    'GET', // méthode autorisée pour cette route
    '/catalog/category/[i:id]',
    [
        'controller' => 'CatalogController',
        'method' => 'category'
    ],
    'catalog-category'
);

$router->map(
    'GET',
    '/catalog/type/[i:id]',
    [
        'controller' => 'CatalogController',
        'method' => 'type'
    ],
    'catalog-type'
);



$router->map(
    'GET',
    '/catalog/brand/[i:id]',
    [
        'controller' => 'CatalogController',
        'method' => 'brand'
    ],
    'catalog-brand'
);

$router->map(
    'GET',
    '/catalog/product/[i:id]',
    [
        'controller' => 'CatalogController',
        'method' => 'product'
    ],
    'catalog-product'
);

$router->map(
    'GET',
    '/catalog/products_list',
    [
        'controller' => 'CatalogController',
        'method' => 'products_list'
    ],
    'catalog-products_list'
);

$router->map(
    'GET',
    '/test',
    [
        'controller' => 'BackController',
        'method' => 'test'
    ],
    'test'
); */



// Récupération de la page à afficher
/* $pageToDisplay = '/'; */ // Par défaut, on est sur la page d'accueil
// sauf si le paramètre _url est fourni
/* if (isset($_GET['_url'])) {
    $pageToDisplay = $_GET['_url'];
} */

// Tableaux de routes
/* $routes = [
    '/' => 'home',
    '/catalog/category/[i:id]',
    [
        'method' => 'category',
    ]
]; */


// Ce qu'on a fait hier ?
// Ce qu'on va faire aujourd'hui ?
// Y'a-t-il des blocages ?

// Dispatcher
// Est-ce qu'il y a une route pour la page demandée ?
/* if (isset($routes[$pageToDisplay])) {
    // J'ai trouvé une route correspondante, on peut suivre la route et
    // faire l'affichage de la page

    // On récupère le nom de la méthode à appeler
    $methodToCall = $routes[$pageToDisplay];

    // Appel dynamique à la méthode du contrôleur en fonction de la valeur
    // de la variable $methodToCall
    // Si on affiche la home => $pageToDisplay vaut '/' et $methodToCall vaut 'home'
    // du coup Php appelera : $mainController->home();
    $mainController->$methodToCall();
} else {
    // Si la route n'est pas trouvée => page 404
    $mainController->pageNotFound();
} */