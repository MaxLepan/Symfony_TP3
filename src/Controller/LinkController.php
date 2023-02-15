<?php

namespace App\Controller;

use App\Entity\Link;
use App\Repository\LinkRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/link", name: "app_link")]
class LinkController extends AbstractController
{
    #[Route('', name: 'app_link_index')]
    public function index(LinkRepository $repository): Response
    {
        $links = $repository->findAll();
        return $this->render('link/index.html.twig', [
            'controller_name' => 'LinkController',
            'links' => $links
        ]);
    }

    #[Route('/add', name: "app_link_add")]
    public function add(Request $request, LinkRepository $repository): Response
    {
        $link = new Link();

        if ($request->getMethod() == Request::METHOD_POST) {
            $link->setTitle("First link")
                 ->setUrl("https://decima.notion.site/123e16e80fe2457084cb70cfc8acf24e?v=58ec54e92df145a89a957ed12d51c9d7&p=ab484e1c222d4f35a0d4ad6587dc7f3a&pm=s");
            $repository->save($link, true);
        }
        return $this->redirect("/");
    }


    #[Route("/{link}")]
    #[ParamConverter("link", class: "App\Entity\Link")]
    public function delete(Link $link, LinkRepository $repository): Response
    {
        $repository->remove($link, true);
        return $this->redirect("/");
    }
}
