<?php

// src/Controller/ChatController.php
namespace App\Controller;

use App\Mercure\CookieGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ChatController extends AbstractController
{
    /**
     * @Route("/chat", name="chat")
     */
    public function __invoke(CookieGenerator $cookieGenerator): Response
    {
        $response = $this->render('chat/index.html.twig', []);
        $response->headers->setCookie($cookieGenerator->generate());

        return $response;
    }
}