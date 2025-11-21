<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class UserService
{
    private $em;
    private $repo;
    private $logger;

    public function __construct(EntityManagerInterface $em, UserRepository $repo, LoggerInterface $logger)
    {
        $this->em = $em;
        $this->repo = $repo;
        $this->logger = $logger;
    }

    public function create(string $name): User
    {
        $this->logger->info("Creating user", ['name' => $name]);

        $user = new User();
        $user->setName($name);

        $this->em->persist($user);
        $this->em->flush();

        $this->logger->info("User created", ['id' => $user->getId()]);

        return $user;
    }

    public function getAll(): array
    {
        $this->logger->info("Fetching all users");
        return $this->repo->findAll();
    }

    public function get(int $id): ?User
    {
        $this->logger->info("Fetching user", ['id' => $id]);
        return $this->repo->find($id);
    }

    public function update(User $user, array $data): User
    {
        $this->logger->info("Updating user", ['id' => $user->getId(), 'data' => $data]);

        if (isset($data['name'])) {
            $user->setName($data['name']);
        }

        $this->em->flush();

        return $user;
    }

    public function delete(User $user)
    {
        $this->logger->info("Deleting user", ['id' => $user->getId()]);

        $this->em->remove($user);
        $this->em->flush();
    }
}
