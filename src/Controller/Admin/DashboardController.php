<?php

namespace App\Controller\Admin;

use App\Entity\Job;
use App\Entity\Game;
use App\Entity\User;
use App\Entity\Quest;
use App\Entity\Skill;
use App\Entity\Status;
use App\Entity\Weapon;
use App\Entity\Session;
use App\Entity\Category;
use App\Entity\Character;
use App\Entity\Equipment;
use App\Entity\Difficulty;
use App\Entity\QuestStatus;
use App\Entity\SkillCategory;
use App\Entity\EquipmentCategory;
use App\Controller\Admin\GameCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Locale;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

#[IsGranted('ROLE_ADMIN')]
class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();
        // $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        // $url = $routeBuilder->setController(GameCrudController::class)->generateUrl();
        // return $this->redirect($url);

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(Category::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //

        // Afficher toutes les dernières parties en cours 

        // 

        return $this->render('admin/index.html.twig');
    }

    public function configureCrud(): Crud
    {
        return Crud::new();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symfony')
            // you can include HTML contents too (e.g. to link to an image)
            ->setTitle('Dashboard')

            // by default EasyAdmin displays a black square as its default favicon;
            // use this method to display a custom favicon: the given path is passed
            // "as is" to the Twig asset() function:
            // <link rel="shortcut icon" href="{{ asset('...') }}">
            ->setFaviconPath('favicon.svg')

            // the domain used by default is 'messages'
            ->setTranslationDomain('my-custom-domain')

            // there's no need to define the "text direction" explicitly because
            // its default value is inferred dynamically from the user locale
            ->setTextDirection('ltr')

            // set this option if you prefer the page content to span the entire
            // browser width, instead of the default design which sets a max width
            ->renderContentMaximized()

            // set this option if you prefer the sidebar (which contains the main menu)
            // to be displayed as a narrow column instead of the default expanded design
            ->renderSidebarMinimized()

            // by default, users can select between a "light" and "dark" mode for the
            // backend interface. Call this method if you prefer to disable the "dark"
            // mode for any reason (e.g. if your interface customizations are not ready for it)
            ->disableDarkMode()

            // by default, all backend URLs are generated as absolute URLs. If you
            // need to generate relative URLs instead, call this method
            ->generateRelativeUrls()

            // set this option if you want to enable locale switching in dashboard.
            // IMPORTANT: this feature won't work unless you add the {_locale}
            // parameter in the admin dashboard URL (e.g. '/admin/{_locale}').
            // the name of each locale will be rendered in that locale
            // (in the following example you'll see: "English", "Polski")
            ->setLocales(['en', 'fr'])
            // to customize the labels of locales, pass a key => value array
            // (e.g. to display flags; although it's not a recommended practice,
            // because many languages/locales are not associated to a single country)
            ->setLocales([
                'en' => '🇬🇧 English',
                'fr' => '🇵🇱 Français'
            ])
            // to further customize the locale option, pass an instance of
            // EasyCorp\Bundle\EasyAdminBundle\Config\Locale
            ->setLocales([
                'fr', // locale without custom options
                Locale::new('en', 'English', 'far fa-language') // custom label and icon
            ]);
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            MenuItem::section('Jeux'),
            MenuItem::linkToCrud('Jeux', 'fa-solid fa-gamepad', Game::class),
            MenuItem::linkToCrud('Contenus supplémentaires', 'fa-solid fa-square-plus', Category::class),
            MenuItem::linkToCrud('Categories', 'fa fa-tags', Category::class),
            MenuItem::linkToCrud('Support', 'fa-solid fa-computer', Category::class),
            MenuItem::section('Dans le jeu'),
            MenuItem::linkToCrud('Parties', 'fa-solid fa-chess-board', Session::class),
            MenuItem::linkToCrud('Niveaux de difficultés', 'fa-solid fa-skull-crossbones', Difficulty::class),
            MenuItem::linkToCrud('Status', 'fa-solid fa-hourglass-half', Status::class),
            MenuItem::linkToCrud('Personnages', 'fa-solid fa-user-ninja', Character::class),
            MenuItem::linkToCrud('Compétences', 'fa-solid fa-screwdriver-wrench', Skill::class),
            MenuItem::linkToCrud('Catégorie de compétences', 'fa fa-tags', SkillCategory::class),
            MenuItem::linkToCrud('Classes', 'fa-solid fa-person-rifle', Job::class),
            MenuItem::linkToCrud('Armes', 'fa-solid fa-shield-halved', Weapon::class),
            MenuItem::linkToCrud('Equipements', 'fa-solid fa-shirt', Equipment::class),
            MenuItem::linkToCrud('Categories d\'équipement', 'fa fa-tags', EquipmentCategory::class),
            MenuItem::linkToCrud('Quêtes', 'fa-solid fa-person-circle-question', Quest::class),
            MenuItem::linkToCrud('Statut des quêtes', 'fa-solid fa-hourglass-half', QuestStatus::class),
            MenuItem::section('Utilisateurs'),
            MenuItem::linkToCrud('Utilisateurs', 'fa-solid fa-users', User::class),
        ];
    }
}
