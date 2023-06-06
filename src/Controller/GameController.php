<?php

namespace App\Controller;

use App\Entity\Game;
use App\Form\GameType;
use App\Repository\GameRepository;
use App\Repository\QuestRepository;
use App\Repository\SessionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/games')]
class GameController extends AbstractController
{
    #[Route('/', name: 'games', methods: ['GET'])]
    public function index(GameRepository $gameRepository,): Response
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
        // On fait appel à l'entité qu'on veut
        $game = new Game();
        // On créer le formulaire sur le template 
        $form = $this->createForm(GameType::class, $game);
        $form->handleRequest($request);
        // Si le formulaire est soumis et que les champs sont valides, les données sont sauvées et l'utilisateu est redirigé sur une autre page
        if ($form->isSubmitted() && $form->isValid()) {
            // La sauvegarde se fait au niveau du Repository
            $gameRepository->save($game, true);

            return $this->redirectToRoute('games', [], Response::HTTP_SEE_OTHER);
        }
        // La vue doit être retournée avec les éléments de l'entité et le formulaire
        return $this->render('game/new.html.twig', [
            'game' => $game,
            'form' => $form,
        ]);
    }

    #[Route('/{id<\d+>}', name: 'game_show', methods: ['GET'])]
    public function showOneGame(Game $game, GameRepository $gameRepository, QuestRepository $questRepository, SessionRepository $sessionRepository): Response
    {
        $gameResults = $gameRepository->findGameWithSupport($game->getId());
        $allQuests = $questRepository->findAllQuestsByGameId($game->getId());
        $allSessions = $sessionRepository->findSessionByGameIdIfIsFinished($game->getId());
        $supports = [];
        $quests = [];
        /**/
        foreach ($gameResults as $game) {
            $supports[] = array(
                "name" => $game["supportName"],
                "color" => $game["supportColor"]
            );
        }
        /* */
        foreach ($allQuests as $quest) {
            $quests[] = array(
                "name" => $quest["name"],
                "description" => $quest["description"],
                "mainQuest" => $quest["main"],
                "secondaryQuest" => $quest["secondary"],
            );
        }

        $gameDetails = [
            "id" => $gameResults[0]["id"],
            "name" => $gameResults[0]["name"],
            "year" => $gameResults[0]["year"],
            "img" => $gameResults[0]["img"],
            "story" => $gameResults[0]["story"],
            "isFinished" => $gameResults[0]["isFinished"],
            "editorName" => $gameResults[0]["editorName"],
            "categoryName" => $gameResults[0]["categoryName"],
            "categoryColor" => $gameResults[0]["categoryColor"],
            "supports" => $supports,
            "quests" => $quests,
            "currentSessions" => $allSessions,
        ];

        // dd($gameDetails);

        return $this->render('game/show.html.twig', [
            'gameDetails' => $gameDetails,
        ]);
    }

    #[Route('/3174/api/games/{id}/quests', name: 'show_game_api', methods: ['GET'])]
    public function showQuestsByGameIdJson(GameRepository $gameRepository, Game $game, QuestRepository $questRepository): JsonResponse
    {
        return $this->json([
            $gameRepository->findGameWithSupportName($game->getId()),
            $questRepository->findAllQuestsByGameId($game->getId())
        ]);
    }

    #[Route('/3174/api/games/{id}/quests', name: 'show_quests_by_game_api', methods: ['GET'])]
    public function showQuestsByGameJson(QuestRepository $questRepository, Game $game): JsonResponse
    {
        return $this->json($questRepository->findQuestByGameId($game->getId()));
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
