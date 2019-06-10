<?php

namespace App\Controller;

use App\Entity\Ssmenu;
use App\Form\SsmenuType;
use App\Repository\SsmenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ssmenu")
 */
class SsmenuController extends AbstractController
{
    /**
     * @Route("/", name="ssmenu_index", methods={"GET"})
     */
    public function index(SsmenuRepository $ssmenuRepository): Response
    {
        return $this->render('ssmenu/index.html.twig', [
            'ssmenus' => $ssmenuRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ssmenu_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ssmenu = new Ssmenu();
        $form = $this->createForm(SsmenuType::class, $ssmenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ssmenu);
            $entityManager->flush();

            return $this->redirectToRoute('ssmenu_index');
        }

        return $this->render('ssmenu/new.html.twig', [
            'ssmenu' => $ssmenu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ssmenu_show", methods={"GET"})
     */
    public function show(Ssmenu $ssmenu): Response
    {
        return $this->render('ssmenu/show.html.twig', [
            'ssmenu' => $ssmenu,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ssmenu_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ssmenu $ssmenu): Response
    {
        $form = $this->createForm(SsmenuType::class, $ssmenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ssmenu_index', [
                'id' => $ssmenu->getId(),
            ]);
        }

        return $this->render('ssmenu/edit.html.twig', [
            'ssmenu' => $ssmenu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ssmenu_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Ssmenu $ssmenu): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ssmenu->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ssmenu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ssmenu_index');
    }
}
