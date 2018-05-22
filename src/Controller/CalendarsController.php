<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CalendarsController extends Controller
{
    /**
     * @Route("/calendars", name="calendars")
     */
    public function index()
    {
        return $this->render('calendars/index.html.twig', [
            'controller_name' => 'CalendarsController',
        ]);
    }
}
