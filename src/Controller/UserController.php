<?php

namespace App\Controller;

use App\Service\UserService;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/users")
 */
class UserController
{
    private $service;
    private $repo;

    public function __construct(UserService $service, UserRepository $repo)
    {
        $this->service = $service;
        $this->repo = $repo;
    }

    /**
     * @Route("", methods={"POST"})
     */
    public function createUser(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['name'])) {
            return new JsonResponse(['error' => 'name is required'], 400);
        }

        $user = $this->service->create($data['name']);

        return new JsonResponse([
            'message' => 'User created',
            'id' => $user->getId()
        ], 201);
    }

    /**
     * @Route("", methods={"GET"})
     */
    public function getUsers(): JsonResponse
    {
        $users = $this->service->getAll();

        $response = array_map(function ($user) {
            return ['id' => $user->getId(), 'name' => $user->getName()];
        }, $users);

        return new JsonResponse($response);
    }

    /**
     * @Route("/{id}", methods={"GET"})
     */
    public function getUser($id): JsonResponse
    {
        $user = $this->service->get($id);

        if (!$user) {
            return new JsonResponse(['error' => 'User not found'], 404);
        }

        return new JsonResponse([
            'id' => $user->getId(),
            'name' => $user->getName()
        ]);
    }

    /**
     * @Route("/{id}", methods={"PUT"})
     */
    public function updateUser($id, Request $request): JsonResponse
    {
        $user = $this->repo->find($id);
        if (!$user) {
            return new JsonResponse(['error' => 'User not found'], 404);
        }

        $data = json_decode($request->getContent(), true);

        $updated = $this->service->update($user, $data);

        return new JsonResponse([
            'message' => 'User updated',
            'id' => $updated->getId()
        ]);
    }

    /**
     * @Route("/{id}", methods={"DELETE"})
     */
    public function deleteUser($id): JsonResponse
    {
        $user = $this->repo->find($id);
        if (!$user) {
            return new JsonResponse(['error' => 'User not found'], 404);
        }

        $this->service->delete($user);

        return new JsonResponse(['message' => 'User deleted']);
    }
}
