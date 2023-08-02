<?php

namespace App\Controller;

use App\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(EntityManagerInterface $em): Response
    {
        $questionRepo = $em->getRepository(Question::class);
        $questions = $questionRepo->findAll();
        return $this->render('home/index.html.twig', [
            'questions' => $questions
        ]);
    }
}
