<?php

namespace App\DataFixtures;

use App\Entity\Menu;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class MenuFixtures extends Fixture
{
    public const MENU = [
        ["badaaaasss" , "/uploads/onfire.jpg" , "La onefire" , "Le Barocco est fait pour cette pizza: On distingue des notes florales. La bouche est plaisante, ronde et équilibrée. ... Les différentes notes aromatiques dominantes s'accordent idéalement : fumé, grillé, chocolat, café torréfié, cuir délicat." , "18€"],
        ["pas mal" , "/uploads/classique.jpg" , "Les classiques" , "On vous conseille le primitivo Syrah: Le Primitivo est un cépage moyennement vigoureux qui doit être conduit en taille courte" , "11€"],
        ["pas mal du tout" , "/uploads/classique (2).jpg" , " " , "On vous conseille le primitivo Syrah: Le Primitivo est un cépage moyennement vigoureux qui doit être conduit en taille courte" , "11€"],
        ["yumiii" ,"/uploads/végé (1).jpg", "Les végés" , "On vous conseille le Negroamaro: Extrémité du jeune rameau cotonneux, jaune blanchâtre avec un liseré rosé. Jeunes feuilles duveteuses. Feuilles adultes, à cinq lobes avec des sinus supérieurs moyennement profonds en lyre" , "14€"],
        ["MiamMiam" ,"/uploads/végé (2).jpg", " " , "On vous conseille le Negroamaro: Extrémité du jeune rameau cotonneux, jaune blanchâtre avec un liseré rosé. Jeunes feuilles duveteuses. Feuilles adultes, à cinq lobes avec des sinus supérieurs moyennement profonds en lyre" , "14€"],
        ["Huuuummmmm" ,"/uploads/viande (1).jpg", "Les viandes" , "On vous conseille le Leverano: A boire avec des viandes rouges, du gibier et des pâtes. Robe d'une couleur ruby intense. Corsée et persistent au nez avec des touches de prune et de cerise. Sec, avec des tanins velouté, juteux et équilibré." , "15€"],
        ["So delicious" ,"/uploads/viande (2).jpg", " " , "On vous conseille le Leverano: A boire avec des viandes rouges, du gibier et des pâtes. Robe d'une couleur ruby intense. Corsée et persistent au nez avec des touches de prune et de cerise. Sec, avec des tanins velouté, juteux et équilibré." , "15€"]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::MENU as $menuInfos) {
            $menu = new Menu();
            $menu->setTexte($menuInfos[0]);
            $menu->setImage($menuInfos[1]);
            $menu->setTitre($menuInfos[2]);
            $menu->setTexte2($menuInfos[3]);
            $menu->setPrix($menuInfos[4]);
            $manager->persist($menu);
        }
        $manager->flush();
    }
}
