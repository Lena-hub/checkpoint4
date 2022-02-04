<?php

namespace App\Controller\admin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminHomeController extends AbstractController
{
    #[Route('/home', name: 'admin_home')]
    public function index(): Response
    {
        return $this->render('admin/home.html.twig');
    }
}
