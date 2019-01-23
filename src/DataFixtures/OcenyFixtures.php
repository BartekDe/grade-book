<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\Ocena;
use App\Entity\Uczen;

class OcenyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $uczen = new Uczen();
        $uczen2 = new Uczen();
        $uczen3 = new Uczen();
        $uczen4 = new Uczen();

        $d = new \DateTime('2018-01-18');

        $ocena = new Ocena();
        $ocena->setPrzedmiot("matematyka");
        $ocena->setData($d);
        $ocena->setOcena(5);

        $ocena2 = new Ocena();
        $ocena2->setPrzedmiot("geografia");
        $ocena2->setData($d);
        $ocena2->setOcena(4);
        
        $uczen->setImie("Bartek");
        $uczen->setNazwisko("Duda");
        $uczen->setKlasa("IId");
        $uczen->setEmail("email@gmail.com");
        $uczen->setPassword("pass");
        $uczen->addOceny($ocena);
        $uczen->addOceny($ocena2);

        $uczen2->setImie("Kacper");
        $uczen2->setNazwisko("Kowalski");
        $uczen2->setKlasa("IId");
        $uczen2->setEmail("email2@gmail.com");
        $uczen2->setPassword("pass");
        $uczen2->addOceny($ocena);
        $uczen2->addOceny($ocena2);

        $uczen3->setImie("Wojtek");
        $uczen3->setNazwisko("Nowak");
        $uczen3->setKlasa("IId");
        $uczen3->setEmail("email3@gmail.com");
        $uczen3->setPassword("pass");
        $uczen3->addOceny($ocena);
        $uczen3->addOceny($ocena2);

        $uczen4->setImie("Jan");
        $uczen4->setNazwisko("Kochanowski");
        $uczen4->setKlasa("IId");
        $uczen4->setEmail("email4@gmail.com");
        $uczen4->setPassword("pass");
        $uczen4->addOceny($ocena);
        $uczen4->addOceny($ocena2);

        $manager->persist($uczen);
        $manager->persist($uczen2);
        $manager->persist($uczen3);
        $manager->persist($uczen4);
        $manager->persist($ocena);
        $manager->persist($ocena2);

        $manager->flush();
    }
}
