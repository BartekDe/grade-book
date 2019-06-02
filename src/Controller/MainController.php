<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Ocena;
use App\Entity\Uczen;

class MainController extends AbstractController {

    /**
    * @Route("/", name="main")
    */
    public function showMainPage(Request $request) {
        // render method is from the twig engine
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
    * @Route("/ocena-confirmation", name="ocena-confirmation")
    */
    public function showConfirmationAfterAddNewGrade() {
        $this->denyAccessUnlessGranted('ROLE_TEACHER');

        $request = Request::createFromGlobals();

        $stopien = $_POST['ocena'];
        $przedmiot = $_POST['przedmiot'];
        $data = $_POST['data'];
        $uczen = $_POST['uczen'];

        // $uczenArr = explode(" ", $uczen);
        // $uczen = $uczenArr[0];

        $uczenObj = $this->getDoctrine()
        ->getRepository(Uczen::class)
        ->find($uczen);

        $ocena = new Ocena();
        $ocena->setOcena($stopien);
        $ocena->setPrzedmiot($przedmiot);
        $ocena->setData(new \DateTime($data));
        $ocena->setUczen($uczenObj);

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($ocena);
        $entityManager->flush();

        return $this->render('main/ocena-confirmation.html.twig', [
            'controller_name' => 'MainController',
            'uczen' => $uczenObj,
        ]);
    }

    /**
    * @Route("/add-student", name="add-student")
    */
    public function showStudentForm() {
        $this->denyAccessUnlessGranted('ROLE_TEACHER');

        return $this->render('main/add-student.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
    * @Route("/uczen-confirmation", name="uczen-confirmation")
    */
    public function showConfirmationAfterAddNewStudent() {
        $this->denyAccessUnlessGranted('ROLE_TEACHER');

        $request = Request::createFromGlobals();

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $class = $_POST['class'];

        $uczen = new Uczen();
        $uczen->setImie($firstname);
        $uczen->setNazwisko($lastname);
        $uczen->setKlasa($class);
        $uczen->setEmail($this->generateRandomString(10)."@".$this->generateRandomString(3).".".$this->generateRandomString(2));
        $uczen->setPassword("mockpassword");

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($uczen);
        $entityManager->flush();

        return $this->render('main/uczen-confirmation.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }



    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
}
?>