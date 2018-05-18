<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Service\DirectoryGenerator;

class DirectoryController extends Controller
{

	public function __construct(DirectoryGenerator $directory_generator) {

		$this->_dir_gen = $directory_generator;
	}

	/**
     * @Route("/directory", name="directory")
     */
    public function index()
    {
    	$this->_dir_gen->getHappyMessage();


    	$directory = mt_rand();
    	$this->_dir_gen->makeDir($directory);

        return $this->render('directory/index.html.twig', [
            'controller_name' => 'DirectoryController',
	        'new_directory' => $directory
        ]);
    }
}
