<?php

namespace App\Controller;

use App\Entity\Fichenote;
use App\Form\FichenoteType;
use App\Repository\FichenoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fichenote")
 */
class FichenoteController extends AbstractController
{
    /**
     * @Route("/", name="fichenote_index", methods={"GET"})
     */
    public function index(FichenoteRepository $fichenoteRepository): Response
    {
        return $this->render('fichenote/index.html.twig', [
            'fichenotes' => $fichenoteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="fichenote_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $fichenote = new Fichenote();
        $form = $this->createForm(FichenoteType::class, $fichenote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fichenote);
            $entityManager->flush();

            return $this->redirectToRoute('fichenote_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fichenote/new.html.twig', [
            'fichenote' => $fichenote,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="fichenote_show", methods={"GET"})
     */
    public function show(Fichenote $fichenote, FichenoteRepository $fichenoteRepository, int $id): Response
    {
        return $this->render('fichenote/show.html.twig', [
            'fichenote' => $fichenote,
            'notes' => $fichenoteRepository->findnotesFicheNote($id)
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fichenote_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Fichenote $fichenote): Response
    {
        $form = $this->createForm(FichenoteType::class, $fichenote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fichenote_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fichenote/edit.html.twig', [
            'fichenote' => $fichenote,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="fichenote_delete", methods={"POST"})
     */
    public function delete(Request $request, Fichenote $fichenote): Response
    {
        if ($this->isCsrfTokenValid('delete' . $fichenote->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fichenote);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fichenote_index', [], Response::HTTP_SEE_OTHER);
    }
}
