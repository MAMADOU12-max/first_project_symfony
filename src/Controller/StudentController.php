<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
 
/**
 * @Route("/student")
 */
class StudentController extends AbstractController
{
    /**
     * @Route("/", name="student_index", methods={"GET"})
     */
    public function seeall()
    {
      
    } 
 
    //----generate number register----- 
            public function genere_register_number(?string $chaine1,?string $chaine2){
            //recup year
            $year = date('Y') ;
             //number random 
             $random = rand() ;
                //take for values random
             $random = substr($random,0,4) ;
             $two_first_caracters = strtoupper(substr($chaine1,0,2)) ;
             $two_last_caracters =  strtoupper(substr($chaine2,-2)) ;
              
             return  $year.$two_first_caracters.$two_last_caracters.$random ;          

            }
           
    /**
     * @Route("/", name="student_index", methods={"GET"})
     */
    public function index(StudentRepository $studentRepository): Response
     {
    //     $student  = new Student();
    //     dump($student);
    //     die();
        
        return $this->render('student/index.html.twig', [
            'students' => $studentRepository->findAll(), 
        ]);
    }

    /**
     * @Route("/new", name="student_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $student = new Student();
 
        $form = $this->createForm(StudentType::class, $student);

        $form->handleRequest($request);

         if($student->getFellowPrice() == "40000" || $student->getFellowPrice() == "20000"){
               $student->setUserType("Fellow") ; 
         }else{
            $student->setUserType("No fellow"); 
         }
            //recup  matricule
        $student->setRegistrationNumber($this->genere_register_number($student->getFirstname(),$student->getLastname())) ;   
        
        if ($form->isSubmitted() && $form->isValid()) {
          
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($student);
            $entityManager->flush();

            return $this->redirectToRoute('student_index');
        }

        return $this->render('student/new.html.twig', [
            'student' => $student,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="student_show", methods={"GET"})
     */
    public function show(Student $student): Response
    {
        return $this->render('student/show.html.twig', [
            'student' => $student,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="student_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Student $student): Response
    {
        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('student_index');
        }

        return $this->render('student/edit.html.twig', [
            'student' => $student,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="student_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Student $student): Response
    {
        if ($this->isCsrfTokenValid('delete'.$student->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($student);
            $entityManager->flush();
        }

        return $this->redirectToRoute('student_index');
    }
}
