<?php


namespace App\Controller\Admin;

use App\Entity\Stats;
use App\Form\StatsLineType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class StatsCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Stats::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('Stat')
            ->setEntityLabelInPlural('Stats')
            ->setPaginatorPageSize(15)
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        if($pageName == 'index'){
            return [
                AssociationField::new('item'),
                TextField::new('spriteName'),
                TextField::new('spriteDescription'),
            ];
        }
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('item'),
            TextareaField::new('effects'),
            TextField::new('spriteName'),
            TextField::new('spriteDescription'),
            CollectionField::new('statsLines')
                ->allowAdd(true)
                ->allowDelete(true)
                ->setEntryType(StatsLineType::class)
        ];
    }
}