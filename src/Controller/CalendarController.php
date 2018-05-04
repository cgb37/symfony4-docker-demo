<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Service\CalendarGenerator;

class CalendarController extends Controller
{
	private $_cal_gen;

	public function __construct(CalendarGenerator $calendar_generator) {
		$this->_cal_gen = $calendar_generator;
	}


	/**
     * @Route("/calendar", name="calendar")
     */
    public function index()
    {
	    $calendars = $this->_cal_gen->getCalendars();



        return $this->render('calendar/index.html.twig', [
            'controller_name' => 'CalendarController',
	        'calendars' => $calendars

        ]);
    }


}
