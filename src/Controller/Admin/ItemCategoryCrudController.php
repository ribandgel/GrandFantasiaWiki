<?php


namespace App\Controller\Admin;

use App\Entity\ItemCategory;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ItemCategoryCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return ItemCategory::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('Item Category')
            ->setEntityLabelInPlural('Item Categories')
            ->setSearchFields(['name'])
            ->setDefaultSort(['name' => 'ASC'])
            ->setPaginatorPageSize(15)
            ;
    }
}