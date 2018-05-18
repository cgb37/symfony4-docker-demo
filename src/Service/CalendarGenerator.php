<?php
/**
 * Created by IntelliJ IDEA.
 * User: cbrownroberts
 * Date: 5/4/18
 * Time: 9:33 AM
 */
// src/Service/CalendarGenerator.php
namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;




class CalendarGenerator {


	private $_calendars = array(

		[
			'id'            => 'richter',
			'name'          => 'Richter Library',
			'attributeName' => 'richter',
			'directoryName' => 'richter',
			'googleCalendarId'    => 'umlhours@gmail.com'
		],

		[
			'id'            => 'musiclib',
			'name'          => 'Music Library',
			'attributeName' => 'musiclib',
			'directoryName' => 'musiclib',
			'googleCalendarId'    => 'hq13o4vhet5bkjscfgsigjh2cc@group.calendar.google.com'
		],

		[
			'id'            => 'rsmaslib',
			'name'          => 'RSMAS Library',
			'attributeName' => 'rsmaslib',
			'directoryName' => 'rsmaslib',
			'googleCalendarId'    => '1oe3ukr8p3j3icp7ucljq15ot8@group.calendar.google.com'
		]

	);

	private $_logger;
	private $_filesystem;

	public function __construct(LoggerInterface $logger) {
		$this->_logger = $logger;
		$this->_filesystem = new Filesystem();
	}

	/**
	 * @return array
	 */
	public function getCalendars() {

		$calendars = $this->_calendars;
		$items = array();
		foreach($calendars as $cal) {

			$calendarId = $cal['id'];
			//@TODO = needs config var
			$path = '/var/www/html/public/calendars/' . $calendarId;

			if( file_exists($path) ) {


				if( is_dir($path) ) {

					$cals = array();
					foreach ( new \DirectoryIterator( $path ) as $fileInfo ) {

						if ( $fileInfo->isDot() ) {
							continue;
						}

						$filename = $fileInfo->getFilename();

						if(is_file( $path.'/'.$filename )) {
							 $cals[$fileInfo->getBasename('.json')] =  $fileInfo->getFilename();
						}

					}
					$result = array_merge($cal, $cals);
					array_push($items, $result);
				}
			}
		}
		return $items;
	}

	public function makeCalendarDirectoriesAndFiles($directory) {

		try {
			$this->_filesystem->mkdir('/var/www/html/public/calendars/'.$directory);
		} catch (IOExceptionInterface $exception) {
			$this->_logger->error("An error occurred while creating your directory at ".$exception->getPath());
		}


	}


}