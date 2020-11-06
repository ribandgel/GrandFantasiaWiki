<?php


namespace App\Controller\Admin;

use App\Entity\Quest;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class QuestCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Quest::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('Quest')
            ->setEntityLabelInPlural('Quests')
            ->setSearchFields(['name'])
            ->setDefaultSort(['name' => 'ASC'])
            ->setPaginatorPageSize(15)
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        if($pageName == 'index'){
            return [
                IdField::new('id')->hideOnForm(),
                TextField::new('name'),
                IntegerField::new('level'),
            ];
        }
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            IntegerField::new('level'),
            TextField::new('rewardsLabel'),
            IntegerField::new('expReward'),
            IntegerField::new('goldReward'),
            IntegerField::new('requierementLevel'),
            TextareaField::new('acceptDescription'),
            TextareaField::new('finishDescription'),
            AssociationField::new('acceptPnj')
                ->setRequired(true),
            AssociationField::new('finishPnj')
                ->setRequired(true),
            AssociationField::new('nextQuests'),
            AssociationField::new('previousQuests'),
            AssociationField::new('items')
        ];
    }
}