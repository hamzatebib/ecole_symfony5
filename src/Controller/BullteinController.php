<?php

namespace App\Controller;

use App\Entity\Bulltein;
use App\Form\BullteinType;
use App\Repository\BullteinRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bulltein")
 */
class BullteinController extends AbstractController
{
    /**
     * @Route("/", name="bulltein_index", methods={"GET"})
     */
    public function index(BullteinRepository $bullteinRepository): Response
    {
        return $this->render('bulltein/index.html.twig', [
            'bullteins' => $bullteinRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="bulltein_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bulltein = new Bulltein();
        $form = $this->createForm(BullteinType::class, $bulltein);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bulltein);
            $entityManager->flush();

            return $this->redirectToRoute('bulltein_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bulltein/new.html.twig', [
            'bulltein' => $bulltein,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="bulltein_show", methods={"GET"})
     */
    public function show(Bulltein $bulltein, BullteinRepository $bullteinRepository, int $id): Response
    {


        return $this->render('bulltein/show.html.twig', [
            'bulltein' => $bulltein,
            'notes' => $bullteinRepository->findnotesBulltein($id),

        ]);
    }

    /**
     * @Route("/{id}/edit", name="bulltein_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Bulltein $bulltein): Response
    {
        $form = $this->createForm(BullteinType::class, $bulltein);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bulltein_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bulltein/edit.html.twig', [
            'bulltein' => $bulltein,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="bulltein_delete", methods={"POST"})
     */
    public function delete(Request $request, Bulltein $bulltein): Response
    {
        if ($this->isCsrfTokenValid('delete' . $bulltein->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bulltein);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bulltein_index', [], Response::HTTP_SEE_OTHER);
    }
}
