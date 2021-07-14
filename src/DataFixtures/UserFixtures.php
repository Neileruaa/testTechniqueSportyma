<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $userPasswordHasher;

    /**
     * UserFixtures constructor.
     * @param UserPasswordHasherInterface $userPasswordHasher
     */
    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }


    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user
            ->setEmail("joueur@gmail.com")
            ->setPassword($this->userPasswordHasher->hashPassword(
                $user,
                "pass_1234"
            ))
        ;
        $manager->persist($user);
        $manager->flush();
    }
}
