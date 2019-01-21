<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\Languages;
use App\Entity\User;
class MainController extends AbstractController {

    /**
    * @Route("/after-register", name="after-register")
    */
    public function displayAfterRegisterPage() {
        return $this->render('main/after-register.html.twig', [
            'controller_name' => 'MainController',
            ]);
    }

    /**
    * @Route("/main", name="main")
    */
    public function displayMainPage(Request $request) {
        $this->denyAccessUnlessGranted('ROLE_TEACHER');


        // render method is from the twig engine
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            ]);
    }

    /**
    * @Route("/nauczyciel-dashboard", name="nauczyciel-dashboard")
    */
    public function displayTestingPage() {
        $this->denyAccessUnlessGranted('ROLE_TEACHER');

        return $this->render('main/testing.html.twig', [
            'controller_name' => 'MainController',
            ]);
    }

    /**
    * @Route("/langs", name="langs")
    */
    public function displayLangsPage() {

        $entitymanager = $this->getDoctrine()->getManager();
        $entities = $entitymanager->getRepository(Languages::class)->findAll();
        return $this->render('main/langs.html.twig', [
            'controller_name' => 'MainController',
            'dane' => $entities
            ]);
    }

    
}
?>