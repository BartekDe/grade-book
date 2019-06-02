<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Ocena;
use App\Entity\Uczen;

class GradesController extends AbstractController
{

    /**
     * @Route("/show-grades", name="show-grades")
     */
    public function showGrades() {
        $entityManager = $this->getDoctrine()->getManager();
        $oceny = $entityManager->getRepository(Ocena::class)->findAll();

        return $this->render('grades/show-grades.html.twig', [
            'controller_name' => 'GradesController',
            'oceny' => $oceny,
        ]);
    }

    /**
     * @Route("/add-grade", name="add-grade")
     */
    public function showGradeForm() {
        $this->denyAccessUnlessGranted('ROLE_TEACHER');

        // add a variable containing all students to choose from while adding a grade
        $entityManager = $this->getDoctrine()->getManager();
        $uczniowie = $entityManager->getRepository(Uczen::class)->findAll();

        return $this->render('grades/add-grade.html.twig', [
            'controller_name' => 'GradesController',
            'uczniowie' => $uczniowie,
        ]);
    }

    /**
    * @Route("/edit-grade/{id}", name="edit-grade", requirements={"id"="\d+"})
    */
    public function editGrade($id) {
        $ocena = $this->getDoctrine()
        ->getRepository(Ocena::class)
        ->find($id);

        if (!$ocena) {
            throw $this->createNotFoundException(
                'No ocena found for id '.$id
            );
        }

        return new Response('Check out this great ocena: ' . $ocena->getOcena());

         return $this->render('grades/edit-grade.html.twig', [
             'controller_name' => 'GradesController',
             'ocena' => $ocena,
             ]);
    }

    /**
     * @Route("/delete-grade/{id}", name="delete-grade", requirements={"id"="\d+"})
     */
    public function deleteGrade($id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $ocena = $this->getDoctrine()
        ->getRepository(Ocena::class)
        ->find($id);

        $entityManager->remove($ocena);

        $entityManager->flush();

        return $this->redirectToRoute('show-grades');
    }
}
