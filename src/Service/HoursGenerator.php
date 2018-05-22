<?php
/**
 * Created by IntelliJ IDEA.
 * User: cbrownroberts
 * Date: 5/4/18
 * Time: 9:33 AM
 */
namespace App\Service;

use Symfony\Component\Yaml\Yaml;

class HoursGenerator {

	public function __construct() {


	}

	public function getCalendars() {
		$calendars = Yaml::parseFile(__DIR__.'/../../config/calendars.yaml');
		return $calendars;
	}

}