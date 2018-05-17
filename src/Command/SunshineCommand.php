<?php
/**
 * Created by IntelliJ IDEA.
 * User: cbrownroberts
 * Date: 5/17/18
 * Time: 5:01 PM
 */

namespace App\Command;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SunshineCommand extends Command
{
	private $logger;

	public function __construct(LoggerInterface $logger)
	{
		$this->logger = $logger;

		// you *must* call the parent constructor
		parent::__construct();
	}

	protected function configure()
	{
		$this
			->setName('app:sunshine')
			->setDescription('Good morning!');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$this->logger->info('Waking up the sun');
		// ...
	}
}