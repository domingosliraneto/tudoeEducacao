<!DOCTYPE html>
<?php 
ini_set('display_errors', true);
error_reporting(E_ALL);
use \App\Controllers\UserTEQuizCreated as UserTEQuizCreated;
//require_once dirname(__FILE__).'/../../controllers/quiz/UserTEQuizCreated.php';
require_once __DIR__.'/../../../lib/core/Loader.php';
 ?>
<html lang="EN">
	<head>
		<title>Panel</title>
		<meta name="viewport" content="initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../../resources/style.css" />
		<link rel="stylesheet" href="../../../resources/adminLTE.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

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
		          	
		          	<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Gerenciador de Quiz</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table">
                <tr>
                  <th>Quiz Name</th>
                  <th style="width: 20%; text-align: center">Test Quiz</th>
                  <th style="width: 20%; text-align: center">Edit</th>
                </tr>
                <?php 
                	$LQ = new UserTEQuizCreated();
					$lista = $LQ->listQuiz();


					foreach ($lista as $key => $value) {
						$verify = $value->QuizName;
						
						
                 ?>
                <tr>
                  
                  <td style="font-size:18px; padding-top:2%"><?php echo $value->QuizName; ?></td>
                  <td>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
								<a id='<?php echo $value->idUserTEQuizCreated; ?>' href="#" onclick="testQuiz(this)">
									<div class="row custom-icon">
										<i class="glyphicon glyphicon-play" style="position:relative; top:50%; left:170%" title="play"></i>
									</div> 
									
								</a>
							</div>
                  </td>
                  <td>
                  	 <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
								<a href="#">
									<div class="row custom-icon">
										<i class="glyphicon glyphicon-edit" style="position:relative; top:50%; left:170%" title="edit"></i>
									</div> 
									
								</a>
							</div>
                  </td>
                </tr>
                <?php }  ?>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix"><span style="font-size: 200%;position:relative;left:30%"><?php if(!isset($verify)){echo "Nenhum Quiz Criado!";} ?></span>
            	
              	<div class="pull-right"><button data-toggle="modal" data-target="#modalnewquiz"
 class="btn btn-block btn-primary btn-lg" onclick="openCreateQuiz()">Novo Quiz</button></div>
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

	function openCreateQuiz() {

       $("#modalnewquiz").load('addquiz.php');
    } 

    $(function () {
    /* BOOTSTRAP SLIDER */
    $('.slider').slider({
      formatter: function(value) {
        limittime = value;
    return value;
    
  }

}    );
    $(".select2").select2();

    $('#general-quiz').on('submit', function(){
                var quizname = document.getElementById('quizname').value;
                var discipline = document.getElementById('discipline').value;
                var studysubject = document.getElementById('studysubject').value;
                var nofquestions = document.getElementById('nofquestions').value;
                
                
                var dataString = $("#general-quiz").serialize();

                dataString += '&quizname='+quizname+'&discipline='+discipline+'&studysubject='+studysubject+'&nofquestions='+nofquestions+'&limittime='+limittime;

                alert(dataString);


    

    return false;
});




    
    
    
    
  });

    function testQuiz(element){
    	var data = $(this).serialize();
    	data += '&idquiz='+element.id;
    	alert(data);
    	ajaxPostRedirect(data,"runquiz.php","runquiz.php");
    }

function ajaxPostRedirect(sendString,postURL,redirectURL){

 
    $.ajax({
        type: "POST",
                    url: postURL,
                    data: sendString,
                    cache: false,
                    success: function(html){
                        alert("hello");

                        window.location = redirectURL;
                   },
                   error: function(xhr, ajaxOptions, thrownError){ 
                        alert(xhr.responseText);
                    }
    });

   
}


	</script>

		          

	</body>
</html>
