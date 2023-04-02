<?php

namespace App\Controller\Admin;

use App\Entity\Game;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GameCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Game::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Jeux')
            ->setSearchFields(['name', 'story', 'year', 'img', 'editor', 'category', 'status', 'isFinished']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom'),
            TextField::new('story', 'Synopsis'),
            DateField::new('year', 'Année de sortie'),
            ImageField::new('img', 'Jacquette')->setBasePath('uploads/images/')->setUploadDir('public/uploads/images/'),
            AssociationField::new('editor', 'Editeur/Développeur')->autocomplete(),
            AssociationField::new('category', 'Genre')->autocomplete(),
            AssociationField::new('status', 'Status'),
            BooleanField::new('isFinished', 'Terminé ?')
        ];
    }
}
