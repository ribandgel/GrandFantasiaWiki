<?php


namespace App\Controller;

use App\Entity\Chest;
use App\Entity\GameClass;
use App\Entity\Item;
use App\Entity\ItemCategory;
use App\Entity\Monster;
use App\Entity\PNJ;
use App\Entity\Quest;
use App\Entity\Set;
use App\Entity\Stats;
use App\Entity\TalentCombination;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashbordController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin_interface")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // the name visible to end users
            ->setTitle('GrandFantasia DataBase')
            // the domain used by default is 'messages'
            ->setTranslationDomain('easyadmin')
            ;
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::linkToCrud('GameClass', 'fa fa-tags', GameClass::class),

            MenuItem::section('Item section'),
            MenuItem::linkToCrud('Item', 'fa fa-sitemap', Item::class),
            MenuItem::linkToCrud('Item Category', 'fa fa-object-group', ItemCategory::class),
            MenuItem::linkToCrud('Item stats', 'fa fa-battery-full', Stats::class),

            MenuItem::section('Quest section', 'fa fa-sticky-note'),
            MenuItem::linkToCrud('Quest', 'fa fa-book', Quest::class),

            MenuItem::section('Item Owner', 'fa fa-shopping-bag'),
            MenuItem::linkToCrud('PNJ', 'fa fa-user', PNJ::class),
            MenuItem::linkToCrud('Monster', 'fab fa-optin-monster', Monster::class),
            MenuItem::linkToCrud('Chest', 'fa fa-toolbox',Chest::class),

            MenuItem::section('Others'),
            MenuItem::linkToCrud('Set', 'fa fa-layer-group', Set::class),
            MenuItem::linkToCrud('Talent Combination', 'fa fa-link', TalentCombination::class),
        ];
    }

}