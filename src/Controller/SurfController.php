<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use App\Entity\SurfBoard;
use App\Repository\SurfBoardRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/surf', name: 'surf_')]
class SurfController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(SurfBoardRepository $surfBoardRepository): Response
    {
        $surfs = $surfBoardRepository->findAll();
        return $this->render('surf/index.html.twig', [
            'surfs' => $surfs,
        ]);
    }


    #[Route('/show/{id<^[0-9]+$>}', name: 'app_surf_show', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(SurfBoard $surfs): Response
    {
        if (!$surfs) {
            throw $this->createNotFoundException(
                'No surf with this id found in surfboards\'s table.'
            );
        }
        return $this->render('surf/show.html.twig', [
            'surfs' => $surfs,
        ]);
    }
}
