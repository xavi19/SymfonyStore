<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Product;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{

    /**
     * @Route("admin/product/", name="product_list")
     */
    public function show()
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);

        $products = $repository->findAll();

        return $this->render('admin/index.html.twig',
            ['product' => $products]
        );
    }

    /**
     * @Route("/product/edit/{id}")
     */
    public function update($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $product->setName('New product name!');
        //You can call $entityManager->persist($product), but it isn't necessary: Doctrine is already "watching" your object for changes.
        $entityManager->flush();

        //Delete element
        $entityManager->remove($product);
        $entityManager->flush();

        return $this->redirectToRoute('product_show', [
            'id' => $product->getId()
        ]);
    }
    /**
     * @Route("/product/delete/{id}")
     */
    public function delete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        //Delete element
        $entityManager->remove($product);
        $entityManager->flush();

        return $this->redirectToRoute('product_show', [
            'id' => $product->getId()
        ]);
    }
}
