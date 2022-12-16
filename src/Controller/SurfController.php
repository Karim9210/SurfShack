<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/surf', name: 'surf_')]
class SurfController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('surf/index.html.twig', [
            'website' => 'Surf Shack',
        ]);
    }


    #[Route('/show/{id}', name: 'app_surf_show', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(): Response
    {
        return $this->render('surf/show.html.twig', [
            'website' => 'Your boards :',
        ]);
    }
}
