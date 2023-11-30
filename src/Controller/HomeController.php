<?php

namespace App\Controller;

use App\Entity\Travels;
use App\Repository\TravelsRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(TravelsRepository $travelsRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'travels' => $travelsRepository->findAll()
        ]);
    }

    #[Route('/add', name: 'app_add_home')]
    public function create(ManagerRegistry $doctrine): Response
    {
        $trevel = new Travels();

        $trevel->setCountry('Greece');
        $trevel->setTown('Santorini');
        $trevel->setHotel('Blue Horizon Resort');
        $trevel->setDays(6);
        $trevel->setPrice(160);
        $trevel->setAllIncluded(1);
        $trevel->setPicture('https://images.unsplash.com/photo-1570077188670-e3a8d69ac5ff?q=80&w=1738&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        $trevel->setDescription('Escape to the idyllic shores of Santorini with a six-day stay at Blue Horizon Resort. Immerse yourself in stunning sunsets and crystal-clear waters.');
        $em = $doctrine->getManager();

        $em->persist($trevel);
        $em->flush();

        return new Response("New travel has been added!");
    }
}
