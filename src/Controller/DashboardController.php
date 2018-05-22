<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Service;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index()
    {

	    $hours_gen = new Service\HoursGenerator();
	    $calendars = $hours_gen->getCalendars();



        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
	        'calendars' => $calendars
        ]);
    }
}
