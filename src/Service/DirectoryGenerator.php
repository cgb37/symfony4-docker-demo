<?php
/**
 * Created by IntelliJ IDEA.
 * User: cbrownroberts
 * Date: 5/1/18
 * Time: 1:18 PM
 */
// src/Service/DirectoryGenerator.php
namespace App\Service;

#use App\Service\LogGenerator;

class DirectoryGenerator
{

	private $_logger;

	public function __construct(LogGenerator $logger) {
		$this->_logger = $logger->getLogger();
	}

	public function getHappyMessage()
	{
		$messages = [
			'You did it! You updated the system! Amazing!',
			'That was one of the coolest updates I\'ve seen all day!',
			'Great work! Keep going!',
		];



		$index = array_rand($messages);

		$this->_logger->info( $messages[$index]);

		return $messages[$index];
	}


	public function dirExists($directory) {

	}


	public function makeDir($directory) {

	}


	public function destroyDir($directory) {

	}

}