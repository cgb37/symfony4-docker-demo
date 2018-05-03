<?php
/**
 * Created by IntelliJ IDEA.
 * User: cbrownroberts
 * Date: 5/1/18
 * Time: 1:18 PM
 */
// src/Service/DirectoryGenerator.php
namespace App\Service;

class DirectoryGenerator
{

	public function getHappyMessage()
	{
		$messages = [
			'You did it! You updated the system! Amazing!',
			'That was one of the coolest updates I\'ve seen all day!',
			'Great work! Keep going!',
		];

		$index = array_rand($messages);

		return $messages[$index];
	}

}