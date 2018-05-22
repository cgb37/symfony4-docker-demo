<?php
/**
 * Created by IntelliJ IDEA.
 * User: cbrownroberts
 * Date: 5/1/18
 * Time: 1:18 PM
 */
// src/Service/DirectoryGenerator.php
namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class DirectoryGenerator
{

	private $_logger;
	private $_filesystem;

	public function __construct(LoggerInterface $logger) {
		$this->_logger = $logger;
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
		$fileSystem = new Filesystem();


		try {
			$fileSystem->mkdir('/var/www/html/public/calendars/'.$directory);
		} catch (IOExceptionInterface $exception) {
			$this->_logger->error("An error occurred while creating your directory at ".$exception->getPath());
		}

	}


	public function destroyDir($directory) {

	}


}