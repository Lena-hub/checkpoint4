<?php

namespace App\Controller\admin\contenu;

use App\Entity\Menu;
use App\Form\ValeursType;
use App\Repository\MenuRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("admin/menu")
 */
class MenuController extends AbstractController
{
    /**
     * @Route("/", name="menu_index", methods={"GET"})
     */
    public function index(MenuRepository $menuRepository): Response
    {
        return $this->render('admin/menu.html.twig', [
            'menu' => $menuRepository->findAll(),
        ]);
    }


    /**
     * @Route("/new", name="menu_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $menu = new Menu();
        $form = $this->createForm(MenuType::class, $menu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($menu);
            $entityManager->flush();

            return $this->redirectToRoute('manu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/new.html.twig', [
            'menu' => $menu,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="menu_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, menu $menu, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MenuType::class, $menu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('menu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/edit.html.twig', [
            'valeur' => $menu,
            'form' => $form,
        ]);
    }

     /**
     * @Route("/{id}", name="menu_delete", methods={"DELETE"})
     */
    public function delete(Request $request, menu $menu, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $menu->getId(), $request->request->get('_token'))) {
            $entityManager->remove($menu);

            $entityManager->flush();
        }

        return $this->redirectToRoute('admin/menu_index', [], Response::HTTP_SEE_OTHER);
    }
}
