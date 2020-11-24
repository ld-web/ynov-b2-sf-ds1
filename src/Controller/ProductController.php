<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
  /**
   * @Route("/products", name="products_list")
   */
  public function products(ProductRepository $productRepository): Response
  {
    return $this->render('product/products.html.twig', [
      'products' => $productRepository->findBy(['display' => true])
    ]);
  }

  /**
   * @Route("/products/promo", name="products_promo")
   */
  public function productsPromo(ProductRepository $productRepository): Response
  {
    return $this->render('product/promos.html.twig', [
      'products' => $productRepository->findBy(['promo' => true, 'display' => true])
    ]);
  }

  /**
   * @Route("/product/{id}", name="product_item")
   */
  public function product(Product $product): Response
  {
    return $this->render('product/product.html.twig', [
      'product' => $product
    ]);
  }
}
