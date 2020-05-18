<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Product;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function product()
    {
        return $this->render('product.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    /**
     * @Route("/category/{id}", name="productHasCateg")
     */
    public function productHasCateg(int $id){
        return new Response("<h1>HelloWOrld</h1>");
    }

    /**
     * @Route("/product/{id}", name="productDetail")
     */
    public function productDetail(int $id){
        return new Response("<h1>HelloWOrld</h1>");
    }

    /**
     * @Route("/api/products", name="listProducts")
     */
    public function listProducts(){
        $products = $this->getDoctrine()
        ->getRepository(Product::class)
        ->findBy([], null, 50);

        //mélanger les produits page d'accueuil
        shuffle($products);
        $products = array_splice($products, 0, 25);

        $dataFinal = [];
        foreach($products as $product){
            array_push($dataFinal, $product->getData());
        }

        $response = new Response();
        $response->setContent(json_encode($dataFinal));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
        
    }

}
