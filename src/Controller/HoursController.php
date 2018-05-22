<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Service;

class HoursController extends Controller
{
    /**
     * @Route("/hours", name="hours")
     */
    public function index()
    {

    	$hours_gen = new Service\HoursGenerator();
    	$calendars = $hours_gen->getCalendars();


        return $this->render('hours/index.html.twig', [
            'controller_name' => 'HoursController',
	        'calendars' => $calendars
        ]);
    }
}
