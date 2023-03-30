<?php

namespace App\Controller\Admin;

use App\Entity\EquipmentCategory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EquipmentCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EquipmentCategory::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
