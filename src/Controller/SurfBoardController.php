<?php

namespace App\Controller;

use App\Entity\SurfBoard;
use App\Entity\User;
use App\Form\SurfBoardType;
use App\Repository\SurfBoardRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/surf/board')]
// #[IsGranted]
class SurfBoardController extends AbstractController
{
    #[Route('/', name: 'app_surf_board_index', methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    public function index(SurfBoardRepository $surfBoardRepository): Response
    {
        /** @var User */
        $user = $this->getUser();

        return $this->render('surf_board/index.html.twig', [
            'surf_boards' => $surfBoardRepository->findByOwner($user),
            'user' => $user,

        ]);
    }

    #[Route('/new', name: 'app_surf_board_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_USER')]
    public function new(Request $request, SurfBoardRepository $surfBoardRepository, MailerInterface $mailer): Response
    {
        $surfBoard = new SurfBoard();
        $form = $this->createForm(SurfBoardType::class, $surfBoard);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $surfBoard->setOwner($this->getUser());

            $surfBoardRepository->save($surfBoard, true);


            $email = (new Email())
                ->from($this->getParameter('mailer_from'))
                ->to('your_email@example.com')
                ->subject('New Board !')
                ->html($this->renderView('surf_board/newSurfBoardEmail.html.twig', ['surfboard' => $surfBoard]));

            $mailer->send($email);
            $this->addFlash('success', 'You just add a new board !');
            return $this->redirectToRoute('app_surf_board_index', [], Response::HTTP_SEE_OTHER);
        }
        // dd($form, $surfBoard);

        return $this->render('surf_board/new.html.twig', [
            'surf_board' => $surfBoard,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_surf_board_show', methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    public function show(SurfBoard $surfBoard): Response
    {
        return $this->render('surf_board/show.html.twig', [
            'surf_board' => $surfBoard,

        ]);
    }

    #[Route('/{id}/edit', name: 'app_surf_board_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_USER')]
    public function edit(Request $request, SurfBoard $surfBoard, SurfBoardRepository $surfBoardRepository): Response
    {
        if ($this->getUser() !== $surfBoard->getOwner()) {
            // If not the owner, throws a 403 Access Denied exception
            throw $this->createAccessDeniedException('Only the owner can edit the surfboard!');
        }
        $form = $this->createForm(SurfBoardType::class, $surfBoard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $surfBoardRepository->save($surfBoard, true);
            $this->addFlash('success', 'Your board has been updated !');

            return $this->redirectToRoute('app_surf_board_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('surf_board/edit.html.twig', [
            'surf_board' => $surfBoard,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_surf_board_delete', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function delete(Request $request, SurfBoard $surfBoard, SurfBoardRepository $surfBoardRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $surfBoard->getId(), $request->request->get('_token'))) {
            $surfBoardRepository->remove($surfBoard, true);
        }
        $this->addFlash('success', 'Your board has been deleted !');

        return $this->redirectToRoute('app_surf_board_index', [], Response::HTTP_SEE_OTHER);
    }
}
