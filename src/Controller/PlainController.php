<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

final class PlainController extends AbstractController
{
    #[Route('/plain', name: 'app_plain')]
    public function index(): Response
    {
        return $this->render('plain/index.html.twig');
    }

    #[Route('/plain/slow', name: 'app_plain_slow')]
    public function slow(SessionInterface $session): Response
    {
        $count = $session->get('plain-call-count', 0) + 1;
        $session->set('plain-call-count', $count);

        sleep(3);

        return $this->render('plain/slow.html.twig', [
            'callCount' => $count,
        ]);
    }
}
