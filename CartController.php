<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     * @return Response
     */
    public function cart(): Response
    {
        return $this->render('cart.html.twig');
    }
}