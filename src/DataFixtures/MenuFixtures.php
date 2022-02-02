<?php

namespace App\DataFixtures;

use App\Entity\Menu;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class MenuFixtures extends Fixture
{
    public const MENU = [
        ["badaaaasss 18€" , "/uploads/onfire.jpg" , "La onefire" , "Le Barocco est fait pour cette pizza"],
        ["pas mal, pas mal, 11€" , "/uploads/classique.jpg", "Les classiques" , "On vous conseille le Leverano"],
        ["yumiii" ,"/uploads/végé (1).jpg", "Les végés" , "On vous conseille le Negroamaro"],
        ["yumiii" ,"/uploads/viande (1).jpg", "Les viandes" , "On vous conseille le Primitivo Syrah"]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::MENU as $menuInfos) {
            $menu = new Menu();
            $menu->setTexte($menuInfos[0]);
            $menu->setImage($menuInfos[1]);
            $menu->setTitre($menuInfos[2]);
            $menu->setTexte2($menuInfos[3]);
            $manager->persist($menu);
        }
        $manager->flush();
    }
}
