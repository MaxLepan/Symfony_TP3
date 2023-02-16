<?php

namespace App\Controller;

use App\Entity\Link;
use App\Form\LinkType;
use App\Repository\LinkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'app_home', methods: ["GET"])]
class HomeController extends AbstractController
{

    #[Route('', name: 'app_index', methods: ["GET", "POST"])]
    public function index(Request $request, LinkRepository $linkRepository): Response
    {
        $link = new Link();

        $form = $this->createForm(LinkType::class, $link);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $link = $form->getData();
            $linkRepository->save($link, true);
            return $this->redirect("/");
        }

        $links = $linkRepository->findAll();

        return $this->render('home/index.html.twig', [
            'links' => $links,
            'form' => $form->createView()
        ]);
    }

}
