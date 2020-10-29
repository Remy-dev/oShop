# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Dans les shoe | 5 categories | - |
| `legal-mentions` | `GET` | `MainController` | `mentions` | `Mentions légales` | `Legal mentions` | `Page Legal Mentions`|
| `/catalog/category/[id]` | `GET` | `CatalogController` | `category` | #Category Name# | `Products attached to the category` | `[id] represents the id of the category` |
| `/catalog/type/[id]` | `GET` | `CatalogController` | `type` | #Type Name$ | `Products attached to the type` | [id] represents the id of the type |
| `/catalog/brand/[id]` | `GET` | `CatalogController` | `brand` | #Brand Name# | `Products attached to the brand` | [id] represents the id of the brand |
| `/catalog/product/[id]` | `GET` | `CatalogController` | `product` | #Product details# | [id] represents the id of the product |
