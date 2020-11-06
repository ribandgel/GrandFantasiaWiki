<?php


namespace App\Controller\Admin;

use App\Entity\GameClass;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GameClassCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return GameClass::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('Class')
            ->setEntityLabelInPlural('Classes')
            ->setSearchFields(['name'])
            ->setDefaultSort(['name' => 'ASC'])
            ->setPaginatorPageSize(15)
            ;
    }
}