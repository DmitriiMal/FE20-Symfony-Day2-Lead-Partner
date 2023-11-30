<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsnewsController extends AbstractController
{
    #[Route('/newsnews', name: 'app_newsnews')]
    public function index(): Response
    {
        return $this->render('newsnews/index.html.twig', [
            'controller_name' => 'NewsnewsController',
        ]);
    }
}
