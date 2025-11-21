<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HealthCheckController
{
        /**
     * @Route("/health", methods={"GET"})
     */
    public function healthCheck(): Response
    {
        return new Response('Application is running');
    }
}
