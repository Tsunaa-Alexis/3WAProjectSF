<?php

namespace App\Controller;

use App\Entity\Authors;
use App\Entity\Books;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Finder\Finder;

#[Route('/authors', name: 'authors_')]

class AuthorController extends AbstractController
{
    #[Route('/', name: 'listing')]
    public function listing(): Response
    {
        $authors = $this->getDoctrine()->getRepository(Authors::class)->findAll();  

        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
            'authors' => $authors,
        ]);
    }

    #[Route('/details/{id}', name: 'details')]
    public function details(int $id): Response
    {

        $authors = $this->getDoctrine()->getRepository(Authors::class)->find($id);

        return $this->render('author/details.html.twig', [
            'controller_name' => 'AuthorController',
            'authors' => $authors,
        ]);
    }
}
