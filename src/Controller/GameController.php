<?php

namespace App\Controller;

use App\Entity\Game;
use App\Form\GameType;
use App\Repository\GameRepository;
use App\Repository\SessionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/games')]
class GameController extends AbstractController
{
    #[Route('/', name: 'games', methods: ['GET'])]
    public function index(GameRepository $gameRepository): Response
    {
        return $this->render('game/index.html.twig', [
            'games' => $gameRepository->findAll(),
        ]);
    }

    #[Route('/3174/api/games', name: 'games_api', methods: ['GET', 'POST'])]
    public function allGamesJson(GameRepository $gameRepository): JsonResponse
    {
        return $this->json($gameRepository->findAll());
    }

    // Reprendre ici
    #[Route('/3174/api/session?limit=5', name: 'five_last_session', methods: ['GET', 'POST'])]
    public function fiveLastSessions(SessionRepository $sessionRepository): JsonResponse
    {

        return $this->json(true);
    }

    #[Route('/new', name: 'game_new', methods: ['GET', 'POST'])]
    public function new(Request $request, GameRepository $gameRepository): Response
    {
        $game = new Game();
        $form = $this->createForm(GameType::class, $game);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $gameRepository->save($game, true);

            return $this->redirectToRoute('games', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('game/new.html.twig', [
            'game' => $game,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'game_show', methods: ['GET'])]
    public function show(Game $game): Response
    {
        return $this->render('game/show.html.twig', [
            'game' => $game,
        ]);
    }

    #[Route('/3174/api/games/{id}', name: 'show_game_api', methods: ['GET', 'POST'])]
    public function showGameJson(GameRepository $gameRepository): JsonResponse
    {
        return $this->json($gameRepository->findAll());
    }

    #[Route('/{id}/edit', name: 'game_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Game $game, GameRepository $gameRepository): Response
    {
        $form = $this->createForm(GameType::class, $game);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $gameRepository->save($game, true);

            return $this->redirectToRoute('games', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('game/edit.html.twig', [
            'game' => $game,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'game_delete', methods: ['POST'])]
    public function delete(Request $request, Game $game, GameRepository $gameRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $game->getId(), $request->request->get('_token'))) {
            $gameRepository->remove($game, true);
        }

        return $this->redirectToRoute('games', [], Response::HTTP_SEE_OTHER);
    }
}
