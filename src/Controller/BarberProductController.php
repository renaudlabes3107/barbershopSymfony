<?php

namespace App\Controller;

use App\Entity\BarberProduct;
use App\Form\BarberProductType;
use App\Repository\BarberProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


//LE CRUD VA ME CREER CETTE ROUTE  CI DESSOUS 
/**
 * @Route("/barber/product")
 */


 // lorsque je mettreai sur mon navigateur 
 // Si je tape http://localhost:8000/barber/product/
class BarberProductController extends AbstractController
{
    /**
     * @Route("/", name="barber_product_index", methods={"GET"})
     */
    public function index(BarberProductRepository $barberProductRepository): Response
    {
        return $this->render('barber_product/index.html.twig', [
            'barber_products' => $barberProductRepository->findAll(),
        ]);
    }
// Creer lors du CRUD
    /**
     * @Route("/new", name="barber_product_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $barberProduct = new BarberProduct();
        $form = $this->createForm(BarberProductType::class, $barberProduct);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($barberProduct);
            $entityManager->flush();

            return $this->redirectToRoute('barber_product_index');
        }

        return $this->render('barber_product/new.html.twig', [
            'barber_product' => $barberProduct,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="barber_product_show", methods={"GET"})
     */
    public function show(BarberProduct $barberProduct): Response
    {
        return $this->render('barber_product/show.html.twig', [
            'barber_product' => $barberProduct,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="barber_product_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BarberProduct $barberProduct): Response
    {
        $form = $this->createForm(BarberProductType::class, $barberProduct);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('barber_product_index');
        }

        return $this->render('barber_product/edit.html.twig', [
            'barber_product' => $barberProduct,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="barber_product_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BarberProduct $barberProduct): Response
    {
        if ($this->isCsrfTokenValid('delete'.$barberProduct->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($barberProduct);
            $entityManager->flush();
        }

        return $this->redirectToRoute('barber_product_index');
    }
}
