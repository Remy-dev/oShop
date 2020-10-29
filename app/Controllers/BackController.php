<?php
namespace Oshop\Controllers;

use Oshop\Models\CategoryManagerPdo;
use Oshop\Models\TypeManagerPdo;
use Oshop\Models\BrandManagerPdo;
use Oshop\Models\ProductManager;

class BackController {

    protected $router;

    public function __construct($router = null)
    {
        $this->setRouter($router);
    }

    public function setRouter($router)
    {
        $this->router = $router;
    }

    public function router()
    {
        return $this->router;
    }
    
    public function home() {
        
        $limit = 5; // maximum d'affichage de categories sur la page d'accueil
        $categoryModel = new CategoryManagerPdo();
        $categoriesList = $categoryModel->findAll($limit);

        $datasCategoryList = [
            'categoriesList' => $categoriesList,
        ];

        $this->show('home', $datasCategoryList);
    }

    public function mentions() {
        
        $this->show('legal-mentions');
    }

    public function pageNotFound() {
        // Si on ne précise pas des header particuliers, on va renvoyer
        // un code HTTP 200 qui signifie ressource trouvée et retournée
        // Hors ici, on veut une vrai page 404
        header("HTTP/1.0 404 Not Found");
        // attention, on ne peut pas préciser les headers si du contenu a déjê été
        // envoyé => par ex, si on fait un dump avant d'utiliser la fonction 

        // warning: Cannot

        $this->show('404');
    }



    /**
     * show() 
     * permet d'afficher les bons templates en fonction de la page demandée
     *
     * @param [string] $viewName  sera le nom du tpl principal à afficher entre le header et le footer
     * @param array $viewVars  des données à communiquer au tpl
     * @return void (ne retourne rien)
     */
    public function show($viewName, $viewVars=[]) {

        // c'est pas très beau, mais ici, avec global on donne accès à la variable $router
        // (qui avait été déclarée dans index.php) à l'intérieur de notre fonction show
        //

        // Je crée une variable qui sera dispo dans toutes les vues
        $viewVars['baseURL'] = $_SERVER['BASE_URI'];
         
        extract($viewVars); // penser a modifier dans les vues

        $typeListModel = new TypeManagerPdo();
        $typeList = $typeListModel->findFooterTypes();

        $brandListModel = new BrandManagerPdo();
        $brandList = $brandListModel->findFooterBrands();

        
        // $viewVars est disponible dans chaque fichier de vue
        require_once __DIR__.'/../views/header.tpl.php';
        require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
        require_once __DIR__.'/../views/footer.tpl.php';
    }
}