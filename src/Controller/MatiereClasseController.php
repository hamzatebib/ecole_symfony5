<?php

namespace App\Controller;

use App\Entity\MatiereClasse;
use App\Form\MatiereClasse2Type;
use App\Repository\MatiereClasseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/matiere/classe")
 */
class MatiereClasseController extends AbstractController
{
    /**
     * @Route("/", name="matiere_classe_index", methods={"GET"})
     */
    public function index(MatiereClasseRepository $matiereClasseRepository): Response
    {
        return $this->render('matiere_classe/index.html.twig', [
            'matiere_classes' => $matiereClasseRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="matiere_classe_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $matiereClasse = new MatiereClasse();
        $form = $this->createForm(MatiereClasse2Type::class, $matiereClasse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($matiereClasse);
            $entityManager->flush();

            return $this->redirectToRoute('matiere_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('matiere_classe/new.html.twig', [
            'matiere_classe' => $matiereClasse,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="matiere_classe_show", methods={"GET"})
     */
    public function show(MatiereClasse $matiereClasse): Response
    {
        return $this->render('matiere_classe/show.html.twig', [
            'matiere_classe' => $matiereClasse,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="matiere_classe_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MatiereClasse $matiereClasse): Response
    {
        $form = $this->createForm(MatiereClasse2Type::class, $matiereClasse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('matiere_classe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('matiere_classe/edit.html.twig', [
            'matiere_classe' => $matiereClasse,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="matiere_classe_delete", methods={"POST"})
     */
    public function delete(Request $request, MatiereClasse $matiereClasse): Response
    {
        if ($this->isCsrfTokenValid('delete'.$matiereClasse->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($matiereClasse);
            $entityManager->flush();
        }

        return $this->redirectToRoute('matiere_classe_index', [], Response::HTTP_SEE_OTHER);
    }
}
