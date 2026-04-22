<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Turbo\Helper\TurboStream;

final class TurboStreamsController extends AbstractController
{
    private const TOPIC = 'https://ux.davidbu.ch/stream-demo';

    #[Route('/streams', name: 'app_streams', methods: ['GET', 'POST'])]
    public function index(Request $request, HubInterface $hub): Response
    {
        if ($request->isMethod('POST')) {
            $message = substr(trim((string) $request->request->get('message', '')), 0, 255);

            if ('' !== $message) {
                $html = $this->renderView('turbo_streams/_message.html.twig', [
                    'message' => $message,
                ]);

                $hub->publish(new Update(self::TOPIC,
                    // add the message to the top
                    TurboStream::prepend('#messages', $html)
                        // and update this independent section of the page with new content each time we send a message
                        . TurboStream::update('#last-message', 'Last message received at '.date('H:i:s'))
                ));
            }

            return new Response(status: Response::HTTP_NO_CONTENT);
        }

        return $this->render('turbo_streams/index.html.twig', [
            'topic' => self::TOPIC,
        ]);
    }
}
