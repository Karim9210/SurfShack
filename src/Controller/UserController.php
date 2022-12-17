<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN')]

    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    // #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    // public function new(Request $request, UserRepository $userRepository): Response
    // {
    //     $user = new User();
    //     $form = $this->createForm(UserType::class, $user);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $userRepository->save($user, true);

    //         return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('user/new.html.twig', [
    //         'user' => $user,
    //         'form' => $form,
    //     ]);
    // }

    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    public function show(User $user): Response
    {
        $user = $this->getUser();
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_USER')]
    public function edit(Request $request, User $user, UserRepository $userRepository): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        // $id = $this->getUser();
        // if ($form->isSubmitted() && $form->isValid()) {
        //     $userRepository->save($user, true);

        //     return $this->redirectToRoute('app_user_show', ['id' => $id], Response::HTTP_SEE_OTHER);
        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user, true);
            $id = $user->getId();
            $user = $this->getUser();

            $this->addFlash('success', 'Vous avez bien modifié votre profil !');
            return $this->redirectToRoute('app_user_show', ['id' => $id], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_delete', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function delete(Request $request, User $user, UserRepository $userRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user, true);
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
