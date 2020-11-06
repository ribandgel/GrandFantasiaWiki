<?php


namespace App\Controller\Admin;

use App\Entity\Item;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ItemCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Item::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('Item')
            ->setEntityLabelInPlural('Items')
            ->setSearchFields(['name'])
            ->setDefaultSort(['name' => 'ASC'])
            ->setPaginatorPageSize(15)
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        if($pageName == 'index'){
            return [
                TextField::new('name'),
                TextField::new('icon'),
                AssociationField::new('itemCategory'),
                IntegerField::new('level'),
            ];
        }
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextareaField::new('description'),
            TextField::new('icon'),
            AssociationField::new('itemCategory'),
            BooleanField::new('tradable'),
            BooleanField::new('usable'),
            IntegerField::new('level'),
            AssociationField::new('suitableClasses'),
            AssociationField::new('weaponSet'),
            AssociationField::new('ingredients'),
            AssociationField::new('talentCombinations')
        ];
    }
}