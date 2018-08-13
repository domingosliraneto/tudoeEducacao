<?php 
ini_set('display_errors', 'On');
error_reporting(E_ALL);

session_start();

// require_once dirname(__FILE__).'/../../../lib/database/Connection.php';
// require_once dirname(__FILE__).'/../../../lib/database/Record.php';
// require_once dirname(__FILE__).'/../../../lib/database/Filter.php';
// require_once dirname(__FILE__).'/../../../lib/database/Where.php';
// require_once dirname(__FILE__).'/../../models/quiz/UserTEQuizCreated.php';
// require_once dirname(__FILE__).'/../../controllers/quiz/UserTEQuizCreated.php';
// require_once dirname(__FILE__).'/../../controllers/quiz/QuizConfig.php';
require_once __DIR__.'/../../../lib/core/Loader.php';

$QuizName = $_POST['quizname'];
$NofQuestions = $_POST['nofquestions'];
$points = $_POST['points'];
$CreationDateTime = date("Y-m-d H:i:s");
$LimitTime = $_POST['limittime'];
$idQuizTypeFK = $_POST['quiztype'];
$idUserTEFK = 1;
$idStudySubjectFK = $_POST['studysubject'];
$idDisciplineFK = $_POST['discipline'];
$Randomize = 0;
if($_POST['randomize'] == "true"){
	$Randomize = 1;	
}

$CQ = new \App\Controllers\UserTEQuizCreated();
$CQC = new \App\Controllers\QuizConfig();
$_SESSION['idQuizCreated'] = $CQ->addQuiz($QuizName, $CreationDateTime, $idUserTEFK, $idStudySubjectFK, $idDisciplineFK);
if (isset($_SESSION['idQuizCreated']))
{
	$CQC->addQuizConfig($LimitTime, $points, $NofQuestions, $Randomize, $idQuizTypeFK, $_SESSION['idQuizCreated']); 	
}

