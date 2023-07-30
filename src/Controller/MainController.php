<?php

namespace App\Controller;
use App\Shortener\UrlEncode;
use PHPUnit\Framework\Test;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class MainController extends AbstractController

{


    #[Route('/test', name: 'app_main')]
    public function test():  Response
    {


      return $this->render('main/index.html.twig');

    }

    #[Route('/r', name: 'app_main')]
    public function rend(UrlEncode $encode):  Response
    {
$url='https://www.google.com.ua';
echo $code=$encode->encode($url);
      return $this->render('main/test.html.twig');

    }



}