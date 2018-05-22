<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LogsController extends Controller
{
    /**
     * @Route("/logs", name="logs")
     */
    public function index()
    {
        return $this->render('logs/index.html.twig', [
            'controller_name' => 'LogsController',
        ]);
    }
}
