<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Entity\Product;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * @Route("/product", name="product")
     */
    public function index()
    {

        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: index(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setName('Mallot btt');
        $product->setPrice(20.56);
        $product->setShortDescription('Mallot per bicicleta de muntanya');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();


        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    /**
     * @Route("admin/product/", name="product_list")
     */
    public function show()
    {
        /*$product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($id);*/

/*        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }*/
        $repository = $this->getDoctrine()->getRepository(Product::class);

        // look for a single Product by its primary key (usually "id")
        //$product = $repository->find($id);

        // look for a single Product by name
        //$product = $repository->findOneBy(['name' => 'Keyboard']);
        // or find by name and price
        //$product = $repository->findOneBy([
        //    'name' => 'Keyboard',
        //    'price' => 1999,
        //]);

        // look for multiple Product objects matching the name, ordered by price
        //$products = $repository->findBy(
        //    ['name' => 'Keyboard'],
        //    ['price' => 'ASC']
        //);

        // look for *all* Product objects
        $products = $repository->findAll();

        //return new Response('Check out this great product: '.$product->getName());

        // render a template in the template, print things with {{ product.name }}
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
