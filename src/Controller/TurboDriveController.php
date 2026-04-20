<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

final class TurboDriveController extends AbstractController
{
    #[Route('/drive', name: 'app_drive')]
    public function index(): Response
    {
        return $this->render('turbo_drive/index.html.twig', [
            'controller_name' => 'TurboDriveController',
        ]);
    }

    #[Route('/drive/slow', name: 'app_drive_slow')]
    public function slow(SessionInterface $session): Response
    {
        $count = $session->get('drive-call-count', 0) + 1;
        $session->set('drive-call-count', $count);

        sleep(3);

        return $this->render('turbo_drive/slow.html.twig', [
            'callCount' => $count,
        ]);
    }
}
