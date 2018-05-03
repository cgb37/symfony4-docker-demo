<?php
/**
 * Created by IntelliJ IDEA.
 * User: cbrownroberts
 * Date: 5/1/18
 * Time: 12:17 PM
 */
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Psr\Log\LoggerInterface;
use App\Service\DirectoryGenerator;

class LuckyController extends Controller
{

	private $_logger;

	public function __construct(LoggerInterface $logger) {
		$this->_logger = $logger;
	}

	/**
	 * @Route("/lucky/number")
	 * @return Response
	 */
	public function number() {

		$number = mt_rand(0, 100);
		$url = $this->generateUrl('app_lucky_number', array('max' => 10));

		$this->addFlash(
			'notice',
			'Your changes were saved!'
		);

		$this->_logger->info('Your lucky number is: '. $number);
		return $this->render('lucky/number.html.twig', array(
			'number' => $number,
			'url' => $url
		));
	}


}
