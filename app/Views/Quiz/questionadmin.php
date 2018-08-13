<!DOCTYPE html>
<?php 
session_start();
// require_once dirname(__FILE__).'/../../controllers/quiz/QuizQuestion.php';
// require_once dirname(__FILE__).'/../../controllers/quiz/Alternative.php';
// require_once dirname(__FILE__).'/../../controllers/quiz/UserTEQuizCreated.php';
// require_once dirname(__FILE__).'/../../controllers/quiz/QuizCreatedToQuestion.php';
require_once __DIR__.'/../../../lib/core/Loader.php';

//if (!isset($_SESSION['idQuizCreated'])){
  //      echo '<script>window.location = "quizadmin.php";</script>';
        
    //}

 ?>

<html lang="EN">
  <head>
    <title>Panel</title>
    <meta  charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resources/style.css" />
    <link rel="stylesheet" href="../../../resources/adminLTE.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
        <script src="../../../ckeditor/ckeditor.js"></script>
        <link rel="stylesheet" type="text/css" href="/webapp/style.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
        <link rel="stylesheet" href="../../../dist/css/AdminLTE.css" />
        <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../../../resources/style.css" />
        <link rel="stylesheet" href="../../../plugins/select2/select2.min.css">



  <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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
              <?php 
                $LQID = new \App\Controllers\UserTEQuizCreated();
                $listaQuiz = $LQID->listQuiz($_SESSION['idQuizCreated']);

                foreach ($listaQuiz as $keyQID => $valueQID) {                
                  $quizname = $valueQID->QuizName;
                  }
               ?>
              
               
              <h3 class="box-title">Questões do Quiz: <?php echo $quizname; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table">
                <tr>
                  <th>Enunciado</th>
                  
                  <th style="width: 20%; text-align: center">Edit</th>
                </tr>
                <?php 
                  $LQQ = new \App\Controllers\QuizCreatedToQuestion();
                  if (isset($_SESSION['idQuizCreated'])){


                  $lista = $LQQ->listQuizCreatedToQuestionByQuiz($_SESSION['idQuizCreated']);

                  foreach ($lista as $key => $valueLQQ) {
                    $LQ = new \App\Controllers\QuizQuestion();
                    $listaLQ = $LQ->listQuestion($valueLQQ->idQuizQuestionFK);

          foreach ($listaLQ as $key => $value) {
                  $verify = $value->idQuizQuestion;
                 ?>
                <tr>
                  
                  <td style="font-size:18px; padding-top:2%">
                    <div ><?php echo "Enunciado: {$value->QuestionWording}"; ?></div>
                    <?php 
                    $LA = new \App\Controllers\Alternative();
                    $listaA = $LA->listAlternative($value->idQuizQuestion);
                    $count = 1;
                    foreach ($listaA as $keyA => $valueA) {
                      
                     ?>
                    <br><div id="alternativeContent{$value->idQuizQuestion}"><?php  echo "Alternativa {$count}: {$valueA->content}"; $count++;?></div>
                    <?php } $count = 1; $buttonID = $value->idQuizQuestion; ?>
                  </td>
                  
                  <td>
                     <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <a href="#" id='<?php echo $buttonID; ?>' type="button" data-toggle="modal" data-target="#mod2" onclick="openEditModal('mod2','editquestion.php',this.id)" >
                  <div class="row custom-icon">
                    <i class="glyphicon glyphicon-edit" style="position:relative; top:50%; left:170%" title="edit"></i>
                  </div> 
                  
                </a>
              </div>
                  </td>
                </tr>
                <?php } } }?>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <span style="font-size: 200%;position:relative;left:30%"><?php if(!isset($verify)){echo "Nenhuma Questão Criada!";} ?></span>
              <div class="pull-right"><button data-toggle="modal" data-target="#mod"
 class="btn btn-block btn-primary btn-lg" onclick="openCreateModal('mod')">Nova questão</button></div>
              
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
          
            
        <div id="mod" class="modal fade" scrolling="yes">
         
              <div class="modal-body" >
                 
                
              </div>
        </div>

         <div id="mod2" class="modal fade" >
         
              <div class="modal-body" scrolling="yes" >
                 
                
              </div>
        </div>
      <script type="text/javascript">
    function openCreateModal(modal) {

       $("#"+modal).load('addquestion.php');
    } 
    function openEditModal(modal,url,button_ID) {
      
      
       $("#"+modal).load(''+url+'?idEdit='+button_ID+'');
    } 
</script>

        
        
        <!-- /.modal -->
      

              </div>
          </div>
          <!--End:Panel-->
          
          
        
        </div>
        <!--End: Right Panels -->         
      </div>    
      
    </div>

  </div>
  <script>

  function showElementOnChecked(clickedElement,element){
            if (clickedElement.checked){
              document.getElementById(element).style.display = "block";
            } else {
              document.getElementById(element).style.display = "none";
            }
           
         }

    

  </script>

              

  </body>
</html>
