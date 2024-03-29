<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nickname', 'Pseudonyme'),
            TextField::new('firstname', 'Prénom'),
            TextField::new('lastname', 'Nom de famille'),
            TextField::new('email', 'Adresse mail'),
            TextField::new('password', 'Mot de passe')->setFormType(PasswordType::class),
            ArrayField::new('roles', 'Rôle')
        ];
    }
}
