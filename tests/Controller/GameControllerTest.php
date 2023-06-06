<?php

use App\Controller\GameController;
use App\Entity\Category;
use App\Entity\Editor;
use App\Entity\Game;
use App\Entity\Support;
use App\Repository\GameRepository;
use PHPUnit\Framework\TestCase;

class GameControllerTest extends TestCase
{
  /*
  public function testShowOneGameInJson()
  {
    $game = new Game();
  }
  

  public function testShowOneGame())
  {
    // How to test a EntityRepository : https://symfony.com/doc/current/testing/database.html


    $actual = $gameRepository->findGameWithSupportName(1);
    var_dump($actual);
    $expected = $this->gameJsonData();
    $this->assertEquals($expected, $actual);
  }

  */

  public function combineGameSupportQuestsData(): array
  {

    $game = new Game();
    $game->setName("Watching The Sky")
      ->setImg("wts.jpg")
      ->setImgAlt("couverture PS5 wts")
      ->setImgIllustration("PS5_wts.jpg")
      ->setStory("Un voyageur et sa fille espèrent atteindre les plus hauts sommets de la Terre")
      ->setYear(date_create("2014"));

    $editor = new Editor();
    $editor->setName("Qiuubi Edition")
      ->setCountry("France");

    $category = new Category();
    // Reprendre ici 
    $category->setName("RPG")
      ->setColor(("#000000"));

    $support = new Support();


    $gameRepository = $this->createMock(GameRepository::class);
    $gameRepository->findGameWithSupportName($game);

    return [];
  }

  public function gameData()
  {
    $data = [
      "name" => "Watching The Sky",
      "img" => "wts.jpg",
      "imgAlt" => "couverture PS5 wts",
      "imgIllustration" => "PS5_wts.jpg",
      "story" => "Un voyageur et sa fille espèrent atteindre les plus hauts sommets de la Terre",
      "year" => "2014",
      "editorName" => "Qiuubi Edition",
      "categoryName" => "Aventure",
      "categoryColor" => "#000000",
      "support" => [
        [
          "name" => "PS5",
          "color" => "#000000"
        ],
        [
          "name" => "PS4",
          "color" => "#0c2461"
        ]
      ],
      "supportColor" =>  "#111111",
      "quests" => [
        [
          "name" => "Retrouver votre fille",
          "description" => "lorem ipsum"
        ], [
          "name" => "Traversez les îles célestes",
          "description" => "lorem ipsum bis"
        ]
      ]
    ];
    /* Definitive version of the data 
    $data = [
      "name" => "Watching The Sky",
      "img" => "wts.jpg",
      "imgAlt" => "couverture PS5 wts",
      "imgIllustration" => "PS5_wts.jpg",
      "story" => "Un voyageur et sa fille espèrent atteindre les plus hauts sommets de la Terre",
      "year" => "2014",
      "editorName" => "Qiuubi Edition",
      "categoryName" => "Aventure",
      "categoryColor" => "#000000",
      "support" => [
        [
          "name" => "PS5",
          "color" => "#000000"
        ],
        [
          "name" => "PS4",
          "color" => "#0c2461"
        ]
      ],
      "supportColor" =>  "#111111",
      "playedBy" => [
        "userNickname" => "User 1"
      ], [
        "userNickname" => "User 2"
      ],
      "quests" => [
        [
          "name" => "Retrouver votre fille",
          "description" => "lorem ipsum"
        ],[
          "name" => "Traversez les îles célestes",
          "description" => "lorem ipsum bis"
        ]
        ],
      "currentSessions" => [
        [
          "userNickname" => "User 1", 
          "currentQuests" => [
            [
              "name" => "Retrouver votre fille",
              "description" => "lorem ipsum"
            ]
            ],[
            [
              "name" => "Traversez les îles célestes",
              "description" => "lorem ipsum bis"
            ]
          ]
        ],
        [
          "userNickname" => "User 2", 
          "currentQuests" => [
            [
              "name" => "Retrouver votre fille",
              "description" => "lorem ipsum"
            ]
          ],[
            [
              "name" => "Traversez les îles célestes",
              "description" => "lorem ipsum bis"
            ]
          ]
        ]
      ]
    ] ; */
    return $data;
  }
}
