<?php

namespace App\Controller;


use App\Shortener\UrlEncode;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;





class UrlController extends AbstractController
{
    #[Route('/main', name: 'main')]
    public function rend(UrlEncode $encode): Response
    {

        return $this->render('base.html.twig',
            ['content' => 'Главная страница']);

    }


    #[Route('/new', name: 'add_new_url', methods: ['get'])]
    public function addCodePageAction(): Response
    {

        return $this->render('main/url_create.html.twig', [
            'form_action' => $this->generateUrl('URL encode')
        ]);
    }

    #[Route('/encode', name: 'URL encode', requirements: ['url' => '.+'], methods: ['POST'])]
    public function encode(Request $request, UrlEncode $encode): Response
    {
        {
            $url = $request->get('url');
            echo $code = $encode->encode($url);
            return $this->render('base.html.twig');
        }
    }


    #[Route('/code', name: 'add_new_code')]
    public function addUrlPageAction(): Response
    {
        return $this->render('main/code_create.html.twig', [
//            'form_action_2' => 'URL decode'
        ]);
    }
//

    /**
     * @param string $code
     * @param UrlEncode $encode
     * @return Response
     */


    #[Route('/decode', name: 'URL decode',)]
    public function decodeCode(Request $request, UrlEncode $encode): Response
    {
        {
            $code = $request->query->get('code');
            echo $url = $encode->decode($code);
            return $this->render('base.html.twig',
            ['content' => 'Главная страница']);
        }
}


}