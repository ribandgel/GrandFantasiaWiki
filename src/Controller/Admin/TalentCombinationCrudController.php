<?php


namespace App\Controller\Admin;

use App\Entity\Monster;
use App\Entity\TalentCombination;
use App\Form\LocationType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TalentCombinationCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return TalentCombination::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('Talent Combination')
            ->setEntityLabelInPlural('Talent Combinations')
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
            TextareaField::new('description'),
            AssociationField::new('talents')
        ];
    }
}