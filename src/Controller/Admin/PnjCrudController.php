<?php


namespace App\Controller\Admin;

use App\Entity\PNJ;
use App\Form\Field\LocationField;
use App\Form\LocationType;
use App\Form\StatsLineType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PnjCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return PNJ::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('Pnj')
            ->setEntityLabelInPlural('Pnjs')
            ->setSearchFields(['name'])
            ->setDefaultSort(['name' => 'ASC'])
            ->setPaginatorPageSize(15)
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        if($pageName == 'index'){
            return [
                TextField::new('name')
            ];
        }
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            CollectionField::new('locations')
                ->allowAdd(true)
                ->allowDelete(true)
                ->setEntryType(LocationType::class)
            ,
            AssociationField::new('items')
        ];
    }
}