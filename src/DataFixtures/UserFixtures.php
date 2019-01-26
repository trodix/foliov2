<?php

namespace App\DataFixtures;
 
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
 
class UserFixtures extends Fixture
{
    private $passwordEncoder;
 
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
 
    public function load(ObjectManager $manager)
    {
        // On configure dans quelles langues nous voulons nos données
        // $faker = Faker\Factory::create('fr_FR');
 
        // on créé 10 users
        // for ($i = 0; $i < 10; $i++) {
        //     $user = new User();
        //     $user->setNomComplet($faker->name);
        //     $user->setEmail(sprintf('userdemo%d@example.com', $i));
        //     $user->setPassword($this->passwordEncoder->encodePassword(
        //         $user,
        //         'userdemo'
        //     ));
        //     $manager->persist($user);
        // }

        $user = new User();
        $user->setUsername('Sébastien');
        $user->setEmail('sebastien.vallet89@gmail.com');
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            '@dm!n89*'
        ));
        $user->setRoles([
            'ROLE_ADMIN'
        ]);

        $manager->persist($user);
 
        $manager->flush();
 
    }
}