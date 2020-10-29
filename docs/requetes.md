## Requetes Tous les Produits d'une categorie

`SELECT product.*, category.* FROM product, category WHERE product.category_id = category.id AND category.id = :id`

## Requete Tous les Produits par type

`SELECT product.*, type.* FROM product, type WHERE product.type_id = type.id AND type.id = :id`

## Requete Tous les Produits par marque (brand)

`SELECT product.*, brand.* FROM product INNER JOIN brand ON product.brand_id = brand.id AND brand.id = :id`

