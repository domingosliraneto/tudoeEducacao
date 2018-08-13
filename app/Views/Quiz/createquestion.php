<?php 
ini_set('display_errors', 'On');
error_reporting(E_ALL);

// require_once dirname(__FILE__).'/../../../lib/database/Connection.php';
// require_once dirname(__FILE__).'/../../../lib/database/Record.php';
// require_once dirname(__FILE__).'/../../../lib/database/Filter.php';
// require_once dirname(__FILE__).'/../../../lib/database/Where.php';
// require_once dirname(__FILE__).'/../../models/quiz/QuizQuestion.php';
// require_once dirname(__FILE__).'/../../controllers/quiz/QuizQuestion.php';
// require_once dirname(__FILE__).'/../../models/quiz/Alternative.php';
// require_once dirname(__FILE__).'/../../controllers/quiz/Alternative.php';
// require_once dirname(__FILE__).'/../../models/quiz/QuizCreatedToQuestion.php';
// require_once dirname(__FILE__).'/../../controllers/quiz/QuizCreatedToQuestion.php';
require_once __DIR__.'/../../../lib/core/Loader.php';

$QuestionWording = $_POST['enun1'];
$idUserTEQuizCreatedFK = $_POST['idquiz'];
$idQuestionFolder_FK = 1;
$isCorrect = 0;

$QQ = new \App\Controllers\QuizQuestion();
$Question = $QQ->addQuestion($QuestionWording, $idQuestionFolder_FK);

$CQTQ = new \App\Controllers\QuizCreatedToQuestion();
$CQTQ->addQuizCreatedToQuestion($idUserTEQuizCreatedFK, $Question);


for ($i=1; $i <= 6 ; $i++) { 
	
		if(!empty($_POST['alt'.$i])){

			if($_POST['check'.$i] == "true"){
					
					$isCorrect = 1;
				}

			$A = new \App\Controllers\Alternative();
		    $alter = $A->addAlternative($_POST['alt'.$i], $isCorrect, $Question);	

				$isCorrect = 0;
		}
		
		
}

