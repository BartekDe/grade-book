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
    * @Route("/", name="main")
    */
    public function displayMainPage(Request $request) {
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

        return $this->render('main/nauczyciel-dashboard.html.twig', [
            'controller_name' => 'MainController',
            ]);
    }
    
}
?>