<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{

    #[Route('/product/{id}', name: 'app_product')]
    public function productDetail(?Product $product): Response
    {
        return $this->render('product/details.html.twig', [
            'product' => $product
        ]);
    }

    #[Route('/products', name: 'app_products')]
    public function productList(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();
        return $this->render('product/list.html.twig', [
            'products' => $products,
        ]);
    }
}
