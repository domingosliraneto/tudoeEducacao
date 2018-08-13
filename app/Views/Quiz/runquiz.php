<!DOCTYPE html>
<?php 
session_start();
ini_set('display_errors', true);
error_reporting(E_ALL);
// require_once dirname(__FILE__).'/../../controllers/quiz/UserTEQuizCreated.php';
// require_once dirname(__FILE__).'/../../controllers/quiz/QuizQuestion.php';
// require_once dirname(__FILE__).'/../../controllers/quiz/Alternative.php';
// require_once dirname(__FILE__).'/../../controllers/quiz/QuizCreatedToQuestion.php';
require_once __DIR__.'/../../../lib/core/Loader.php';
if(isset($_POST['idquiz'])){
	$_SESSION['idQuizCreated'] = $_POST['idquiz'];	
}

echo $_SESSION['idQuizCreated'];
 ?>
<html lang="ES">
	<head>
		<title>Panel</title>
		<meta name="viewport" content="initial-scale=1" charset="UTF-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../../resources/style.css" />
		<link rel="stylesheet" href="../../../resources/adminLTE.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="../../../js/ajaxFunctions.js"></script>
  <script src="../../../js/elementFunctions.js"></script>

		<style>
			.panel-default > .panel-heading, .navbar-default, .navbar-default .navbar-brand,
		.navbar-nav>li>a {
			background-color: #252527;
			color: white !important;
		}
		.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover,.navbar-nav>li>a:hover{
			background-color: #33A5D5 !important;
		}
		</style>
	</head>
	<body>
		<div class="content-wrapper">
		<div class="content">
			
			<div class="row">	
				
				<!-- Start: Right Panels -->
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
					<!-- Start: Panel Filter -->
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
						<div class="input-group">
							<input type="text" class="form-control input" placeholder="type for module..." id="panel-search-text">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button" id="panel-seach-btn">Search!</button>
							</span>
						</div>
								
					</div>
					<!-- End: Panel Filter -->
					<!-- Start:Panel-->
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div style="padding-top:2%">
		          	<form id="submit-quiz" >
		          	 <div class="box box-info">
            <div class="box-header with-border">
              <?php 
                $LQID = new \App\Controllers\UserTEQuizCreated();
                $listaQuiz = $LQID->listQuiz($_SESSION['idQuizCreated']);

                foreach ($listaQuiz as $keyQID => $valueQID) {                
                  $quizname = $valueQID->QuizName;

                  }
               ?>
              
               
              <h3 class="box-title">Fazendo o Quiz: <?php echo $quizname; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table">
                <tr>
                  <th>Questoes</th>
                  
                  <th style="width: 20%; text-align: center"></th>
                </tr>
               <?php 
                  $LQQ = new \App\Controllers\QuizCreatedToQuestion();
                  if (isset($_SESSION['idQuizCreated'])){


                  $lista = $LQQ->listQuizCreatedToQuestionByQuiz($_SESSION['idQuizCreated']);
                  $countQuestion = 1;
                  foreach ($lista as $key => $valueLQQ) {
                    $LQ = new \App\Controllers\QuizQuestion();

                    $listaLQ = $LQ->listQuestion($valueLQQ->idQuizQuestionFK);
                    
          foreach ($listaLQ as $key => $value) {
                  $verify = $value->idQuizQuestion;
                 ?>
                <tr>
                  
                  <td style="font-size:18px; padding-top:2%">
                    <div id='<?php echo "question{$countQuestion}"; ?>' class='<?php echo $value->idQuizQuestion; ?>'>
                    	<div ><?php echo "{$countQuestion} - ".substr($value->QuestionWording, 3); ?></div>
                    
                    <?php 
                    $LQ = new \App\Controllers\Alternative();
                    $listaA = $LQ->listAlternative($value->idQuizQuestion);
                    $count = 1;
                    foreach ($listaA as $keyA => $valueA) {
                      
                     ?>
                     <input id='<?php echo "Alternative{$count}"; ?>' name='<?php echo $valueA->idAlternative; ?>' type="radio" value="wrong"><?php  echo " ".substr($valueA->content, 3); $count++;?><br>
                    
                    <?php  } $count = 1; $buttonID = $value->idQuizQuestion; ?>

                    </div>
                    
                  </td>
                  
                  <td>
                    
                  </td>
                </tr>
                <?php $countQuestion++; } } }?>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <span style="font-size: 200%;position:relative;left:30%"><?php if(!isset($verify)){echo "Nenhuma Questão Criada!";} ?></span>
              <div class="pull-right"><button data-toggle="modal" data-target="#mod"
 class="btn btn-block btn-primary btn-lg" onclick="openCreateModal('mod')">Finalizar Quiz</button></div>
              
            </div>
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin" style="padding-left: 40%">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
          </form>
          <!-- /.box -->


		          </div>
					</div>
					<!--End:Panel-->
					
					
				
				</div>
				<!--End: Right Panels -->					
			</div>		
			
		</div>
		 <div id="modalnewquiz" class="modal fade" scrolling="yes">
         
              <div class="modal-body" >
                 
                
              </div>
        </div>

	</div>
	<script>

	
    $('#submit-quiz').on('submit', function(){
                //var quizId = "<?php echo $_SESSION['idQuizCreated']; ?>";
                var countQuestion = "<?php echo $countQuestion; ?>";
                var Question = new Array();
                var Alternative = new Array();
                for (var i = 1; i < countQuestion; i++) {
                  questionName = 'question'+i;
                  Question.push(document.getElementById('question'+i).className);
                  
                  
                  for (var j = 1; j <= 6; j++) {
                    var alt = document.getElementById('Alternative'+j).name;
                    if (alt != null){
                      Alternative.push({'questionName':document.getElementById('Alternative'+j).name});
                    alert(document.getElementById('Alternative'+j).name);  
                    }
                    
                  };
                };

                console.log(Question);
                console.log(Alternative);
                
                //var quiztype = document.getElementById('quiztype').value;
                //var randomize = document.getElementById('randomize').checked;
                
                var dataString = $("#submit-quiz").serialize();
                dataString += '&question='+Question+'&alternative='+Alternative+'&countQuestion='+countQuestion;
                //dataString += '&quizname='+quizname+'&discipline='+discipline+'&studysubject='+studysubject+'&points='+points+'&nofquestions='+nofquestions+'&limittime='+limittime+'&quiztype='+quiztype+'&randomize='+randomize;
                //alert(dataString);

                //ajaxPostRedirect(dataString,"finishquiz.php","runquiz.php");
    

    return false;
});


	</script>

		          

	</body>
</html>
