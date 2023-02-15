<?php

namespace App\Controller;

use App\Repository\LinkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'app_home', methods: ["GET"])]
class HomeController extends AbstractController
{

    #[Route('', name: 'app_index', methods: ["GET"])]
    public function index(LinkRepository $linkRepository): Response
    {
        $links = $linkRepository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'links' => $links
        ]);
    }
}
