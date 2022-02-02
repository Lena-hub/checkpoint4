<?php

namespace App\Controller;

use App\Repository\MenuRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MenuController extends AbstractController
{
    #[Route('/menu', name: 'menu')]
    public function index(MenuRepository $menuRepository): Response{
        $menus = $menuRepository->findAll();

    return $this->render('front/menu.html.twig', ["menus" => $menus]);
    }
}