<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Routing\Attribute\Route;

final class SseController extends AbstractController
{
    private const TOPIC = 'https://ux.davidbu.ch/sse-demo';

    #[Route('/sse', name: 'app_sse', methods: ['GET', 'POST'])]
    public function index(Request $request, HubInterface $hub): Response
    {
        if ($request->isMethod('POST')) {
            $message = trim((string) $request->request->get('message', ''));

            if ('' !== $message) {
                $hub->publish(new Update(self::TOPIC, json_encode([
                    'timestamp' => date('H:i:s'),
                    'message' => $message,
                ], \JSON_THROW_ON_ERROR)));
            }

            return new Response(status: Response::HTTP_NO_CONTENT);
        }

        return $this->render('sse/index.html.twig', [
            'topic' => self::TOPIC,
        ]);
    }
}
