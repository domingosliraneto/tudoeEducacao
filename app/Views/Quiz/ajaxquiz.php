<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

// require_once dirname(__FILE__).'/../../../lib/database/Connection.php';
// require_once dirname(__FILE__).'/../../../lib/database/Record.php';
// require_once dirname(__FILE__).'/../../../lib/database/Filter.php';
// require_once dirname(__FILE__).'/../../../lib/database/Where.php';
// require_once dirname(__FILE__).'/../../models/quiz/UserTEQuizCreated.php';
// require_once dirname(__FILE__).'/../../controllers/quiz/UserTEQuizCreated.php';
// require_once dirname(__FILE__).'/../../models/quiz/QuizQuestion.php';
// require_once dirname(__FILE__).'/../../controllers/quiz/QuizQuestion.php';
// require_once dirname(__FILE__).'/../../models/quiz/Alternative.php';
// require_once dirname(__FILE__).'/../../controllers/quiz/Alternative.php';
// require_once dirname(__FILE__).'/../../models/quiz/QuizType.php';
// require_once dirname(__FILE__).'/../../controllers/quiz/QuizType.php';
require_once __DIR__ . '/../../../lib/core/Loader.php';

if (is_ajax()) {
    if (isset($_GET["filter"]) && !empty($_GET["filter"])) { //Checks if action value exists
        $filter = $_GET["filter"];
        switch ($filter) { //Switch case for value of action
            case "quiz":
                allQuiz();
                break;
        }
    }
}

//Function to check if the request is an AJAX request
function is_ajax()
{
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function allQuiz()
{

    $quiz = new \App\Controllers\QuizType();
    $q = $quiz->listQuizType();

    echo json_encode($q);
}





