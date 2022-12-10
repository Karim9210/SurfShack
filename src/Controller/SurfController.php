<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SurfController extends AbstractController
{
    #[Route('/surf/', name: 'surf_index')]
    public function index(): Response
    {
        return new Response(
            '<html><body>Surf Index</body></html>'
        );
    }
}
