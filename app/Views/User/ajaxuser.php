<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

require_once dirname(__FILE__).'/../../../lib/database/Connection.php';
require_once dirname(__FILE__).'/../../../lib/database/Record.php';
require_once dirname(__FILE__).'/../../../lib/database/Filter.php';
require_once dirname(__FILE__).'/../../../lib/database/Where.php';
require_once dirname(__FILE__).'/../../models/quiz/UserTEQuizCreated.php';
require_once dirname(__FILE__).'/../../controllers/quiz/UserTEQuizCreated.php';
require_once dirname(__FILE__).'/../../models/quiz/QuizQuestion.php';
require_once dirname(__FILE__).'/../../controllers/quiz/QuizQuestion.php';
require_once dirname(__FILE__).'/../../models/quiz/Alternative.php';
require_once dirname(__FILE__).'/../../controllers/quiz/Alternative.php';
require_once dirname(__FILE__).'/../../models/user/Discipline.php';
require_once dirname(__FILE__).'/../../controllers/user/Discipline.php';
require_once dirname(__FILE__).'/../../models/user/StudySubject.php';
require_once dirname(__FILE__).'/../../controllers/user/StudySubject.php';



if (is_ajax()) 
	{
	if (isset($_GET["filter"]) && !empty($_GET["filter"])) 
		{ //Checks if action value exists
			$filter = $_GET["filter"];
			switch($filter) 
			{ //Switch case for value of action
				case "discipline": allDiscipline(); break;
				case "studysubject": allStudySubject(); break;
			}
		}
	}
	
	//Function to check if the request is an AJAX request
	function is_ajax() {
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}
	
	function allDiscipline(){
	
	$disc = new \App\Controllers\Discipline();
	$d = $disc->listDiscipline();

	echo json_encode($d);
	}

	function allStudySubject(){
	
	$sub = new \App\Controllers\StudySubject();
	$s = $sub->listStudySubject();

	echo json_encode($s);
	}








