<?php
/**
 * Created by IntelliJ IDEA.
 * User: cbrownroberts
 * Date: 5/4/18
 * Time: 9:09 AM
 */
// src/Service/LogGenerator.php
namespace App\Service;

use Psr\Log\LoggerInterface;


class LogGenerator
{


	private $_logger;


	public function __construct(LoggerInterface $logger) {
		$this->setLogger($logger);
	}

	/**
	 * @return mixed
	 */
	public function getLogger() {
		return $this->_logger;
	}

	/**
	 * @param mixed $logger
	 */
	public function setLogger( $logger ): void {
		$this->_logger = $logger;
	}





}