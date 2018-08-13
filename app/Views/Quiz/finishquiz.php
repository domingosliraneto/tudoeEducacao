<?php 
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);

// require_once dirname(__FILE__).'/../../../lib/database/Connection.php';
// require_once dirname(__FILE__).'/../../../lib/database/Record.php';
// require_once dirname(__FILE__).'/../../../lib/database/Filter.php';
// require_once dirname(__FILE__).'/../../../lib/database/Where.php';
// require_once dirname(__FILE__).'/../../models/quiz/UserTEAskedQuiz.php';
// require_once dirname(__FILE__).'/../../controllers/quiz/UserTEAskedQuiz.php';
// require_once dirname(__FILE__).'/../../models/quiz/UserTEAskedQuizQuestion.php';
// require_once dirname(__FILE__).'/../../controllers/quiz/UserTEAskedQuizQuestion.php';
require_once __DIR__.'/../../../lib/core/Loader.php';


//$QuestionWording = $_POST['enun1'];

//$idQuestionFolder_FK = 1;
//$isCorrect = 0;

//$QQ = new \App\Controllers\QuizQuestion();
//$Question = $QQ->addQuestion($QuestionWording, $idQuestionFolder_FK);
$idUserTEFK = 1;
$idUserTEQuizCreatedFK = $_SESSION['idQuizCreated'];

$CQTQ = new \App\Controllers\UserTEAskedQuiz();
$askedQuiz = $CQTQ->addUserTEAskedQuiz(1, $idUserTEFK, $idUserTEQuizCreatedFK);

$UTEAQQ = new \App\Controllers\UserTEAskedQuizQuestion();
$UTEAQQ->addUserTEAskedQuizQuestion(1, $askedQuiz, $idQuizQuestion, $idAlternative);



