<?php


namespace App\Controller\Admin;

use App\Entity\Monster;
use App\Form\Field\RespawnTimeField;
use App\Form\LocationType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MonsterCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Monster::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('Monster')
            ->setEntityLabelInPlural('Monsters')
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
                IntegerField::new('level')
            ];
        }
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            IntegerField::new('level'),
            CollectionField::new('locations')
                ->setEntryType(LocationType::class),
            AssociationField::new('items'),
            RespawnTimeField::new('respawnTime')
        ];
    }
}