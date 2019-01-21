<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Entity\Nauczyciel;

class NauczycielFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder) {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $nauczyciel = new Nauczyciel();

        $nauczyciel->setEmail("teachermail@gmail.com");

        $nauczyciel->setRoles(["ROLE_TEACHER"]);

        $nauczyciel->setPassword($this->passwordEncoder->encodePassword(
            $nauczyciel,
            'the_new_password'
        ));

        $manager->persist($nauczyciel);

        $manager->flush();
    }
}
