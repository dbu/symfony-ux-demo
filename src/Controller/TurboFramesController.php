<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

final class TurboFramesController extends AbstractController
{
    #[Route('/frames', name: 'app_frames')]
    public function index(): Response
    {
        // when navigating back from target to here, we could check for the Turbo-Frame header to avoid rendering the rest of the HTML.
        // not doing it here to demo that the rest of the HTML apart from the <turbo-frame> is indeed discarded.
        return $this->render('turbo_frames/index.html.twig');
    }

    #[Route('/frames/target', name: 'app_frames_target')]
    public function target(Request $request, SessionInterface $session): Response
    {
        $count = $session->get('frames-call-count', 0) + 1;
        $session->set('frames-call-count', $count);

        $turboFrameId = $request->headers->get('Turbo-Frame');

        if ('variable-content' === $turboFrameId) {
            // optimization: render only the frame but not the rest of the page as it would be discarded anyways.
            return $this->render('turbo_frames/fragment.html.twig', [
                'callCount' => $count,
            ]);
        }

        return $this->render('turbo_frames/index.html.twig', [
            'callCount' => $count,
        ]);
    }
}
