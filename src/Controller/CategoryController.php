<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categories')]
class CategoryController extends AbstractController
{
    #[Route('/', name: 'categories', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }

    #[Route('/3174/api/categories', name: 'categories_api', methods: ['GET', 'POST'])]
    public function allCategoriesJson(CategoryRepository $categoryRepository): JsonResponse
    {
        return $this->json($categoryRepository->findAll());
    }
}
