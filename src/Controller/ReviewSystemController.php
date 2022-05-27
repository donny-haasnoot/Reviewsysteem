<?php

namespace App\Controller;

use App\Entity\ReviewSystem;
use App\Form\ReviewSystemType;
use App\Repository\ReviewSystemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/review/system')]
class ReviewSystemController extends AbstractController
{
    // dit is de route van de pagina en returnt de pagina index //
    #[Route('/', name: 'app_review_system_index', methods: ['GET'])]
    public function index(ReviewSystemRepository $reviewSystemRepository): Response
    {
        return $this->render('review_system/index.html.twig', [
            'review_systems' => $reviewSystemRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_review_system_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ReviewSystemRepository $reviewSystemRepository): Response
    {
        $reviewSystem = new ReviewSystem();
        $form = $this->createForm(ReviewSystemType::class, $reviewSystem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reviewSystemRepository->add($reviewSystem);
            return $this->redirectToRoute('app_review_system_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('review_system/new.html.twig', [
            'review_system' => $reviewSystem,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_review_system_show', methods: ['GET'])]
    public function show(ReviewSystem $reviewSystem): Response
    {
        return $this->render('review_system/show.html.twig', [
            'review_system' => $reviewSystem,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_review_system_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ReviewSystem $reviewSystem, ReviewSystemRepository $reviewSystemRepository): Response
    {
        $form = $this->createForm(ReviewSystemType::class, $reviewSystem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reviewSystemRepository->add($reviewSystem);
            return $this->redirectToRoute('app_review_system_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('review_system/edit.html.twig', [
            'review_system' => $reviewSystem,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_review_system_delete', methods: ['POST'])]
    public function delete(Request $request, ReviewSystem $reviewSystem, ReviewSystemRepository $reviewSystemRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reviewSystem->getId(), $request->request->get('_token'))) {
            $reviewSystemRepository->remove($reviewSystem);
        }

        return $this->redirectToRoute('app_review_system_index', [], Response::HTTP_SEE_OTHER);
    }
}
