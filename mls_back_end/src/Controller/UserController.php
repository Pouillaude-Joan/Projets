<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

header('Access-Control-Allow-Origin: http://localhost:3000');
#[Route('/user')]
class UserController extends AbstractController
{

    #[Route('/all', name: 'user_index', methods: ['GET'])]
    /**
    * Require ROLE_ADMIN for only this controller method.
    *
    * @IsGranted("ROLE_ADMIN")
    */
    public function index(UserRepository $userRepository, SerializerInterface $serializerInterface): Response
    {
        $users = $userRepository->findAll();
        $data = $serializerInterface->serialize($users, 'json', ['groups' => 'allUser']);
        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    #[Route('/new', name: 'user_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'user_show', methods: ['GET'])]
    public function show(
        UserRepository $userRepository,
        int $id,
        SerializerInterface $serializerInterface
    ): Response {
        $user = $userRepository->find($id);
        $data = $serializerInterface->serialize($user, 'json', []);
        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    #[Route('/{id}/edit', name: 'user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'user_delete', methods: ['DELETE'])]
    public function delete(Request $request, EntityManagerInterface $em, UserRepository $userRepository): Response
    {
        
            $id = $request->attributes->get('id');
            $user = $userRepository->find($id);
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
            return new Response('Delete product '.$id);
        
    }
}
