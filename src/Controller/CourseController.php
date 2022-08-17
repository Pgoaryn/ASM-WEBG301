<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/course')]
class CourseController extends AbstractController
{
    #[Route('/index', name: 'course_index')]
    public function CourseIndex(): Response
    {
        return $this->render('course/index.html.twig', [
            'controller_name' => 'CourseController',
        ]);
    }

    #[Route('/course', name: 'course_detail')]
    public function CourseDetail(): Response
    {
        return $this->render('course/detail.html.twig', [
            'controller_name' => 'CourseController',
        ]);
    }
}
