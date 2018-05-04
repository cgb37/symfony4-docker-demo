<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Service\CalendarGenerator;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(CalendarGenerator $calendar_generator)
    {

    	$calendars = $calendar_generator->getCalendars();



        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
	        'calendars' => $calendars
        ]);
    }
}
