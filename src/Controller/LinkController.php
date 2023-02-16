<?php

namespace App\Controller;

use App\Entity\Link;
use App\Repository\LinkRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LinkController extends AbstractController
{
    #[Route('/link', name: 'app_link_index')]
    public function index(LinkRepository $repository): Response
    {
        $links = $repository->findAll();
        return $this->render('link/index.html.twig', [
            'controller_name' => 'LinkController',
            'links' => $links
        ]);
    }

    #[Route("/link/{link}")]
    #[ParamConverter("link", class: "App\Entity\Link")]
    public function delete(Link $link, LinkRepository $repository): Response
    {
        $repository->remove($link, true);
        return $this->redirect("/");
    }
}
