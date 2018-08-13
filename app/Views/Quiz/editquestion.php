<!DOCTYPE html>
<?php 
    session_start();
    require_once dirname(__FILE__).'/../../controllers/quiz/QuizQuestion.php';
    require_once dirname(__FILE__).'/../../controllers/quiz/Alternative.php';
    if (!isset($_SESSION['idQuizCreated'])){
        echo '<script>window.location = "addquiz.php";</script>';
        
    }

     if (isset($_GET['idEdit'])){
      $idQuizQuestion = $_GET['idEdit'];
        
        
    }
 ?>

        <!-- Make sure the path to CKEditor is correct. -->
        
        
   
        
        <!-- left column -->
        
        <!--/.col (left) -->
        <!-- right column -->

        <div class="col-md-11">

       <div id="md" class="box box-info">
        <button type="button" class="close" data-dismiss="modal" onclick="document.getElementById('mod').style.display='none'" aria-label="Close" style="padding:1%">
                  <span aria-hidden="true">&times;</span></button>
           
            
            <br><br>    
        <form id="question" method="post" action="createquestion.php">
        <div id="wording">
            <?php 


                  $LQ = new \App\Controllers\QuizQuestion();
                  $listaQ = $LQ->listQuestion($idQuizQuestion);

                  foreach ($listaQ as $key => $value) {
            
                 ?>
            <div class="form-group" style="position:relative;left:5%"><label>Edit Enunciado</label></div>
            <div name="editenun1" id="editenun1" class="questionBox" contenteditable="true" ><?php  echo $value->QuestionWording; ?></div>
            
        </div>
        <br>
        <?php 
                  $LA = new \App\Controllers\Alternative();
                  $listaA = $LA->listAlternative($idQuizQuestion);
                  $arrayName = array();
                  foreach ($listaA as $keyA => $valueA) {
                      array_push($arrayName, $valueA->content);
                  }
                 ?>

        <div id="alternatives">
            
                <div id="alternative1" > 
                  <div class="form-group" style="position:relative;left:5%"><label>Alternativa 1</label></div>
                  <div name="editalter1" id="editalter1" class="alterBox" contenteditable="true" ><?php echo $arrayName[0]; ?></div> 
                </div>
                <div id="alternative2" > 
                  <div class="form-group" style="position:relative;left:5%"><label>Alternativa 2</label></div>
                  <div name="editalter2" id="editalter2" class="alterBox" contenteditable="true"  ><?php echo $arrayName[1]; ?></div>
                </div>
                <div id="alternative3" style="display:none"> 
                  <div class="form-group" style="position:relative;left:5%"><label>Alternativa 3</label></div>
                  <div name="editalter3" id="editalter3" class="alterBox" contenteditable="true"  ><?php if(isset($arrayName[2])){echo $arrayName[2];} ?></div>
                  
                </div>
                <div id="alternative4" style="display:none"> 
                  <div class="form-group" style="position:relative;left:5%"><label>Alternativa 4</label></div>
                  <div name="editalter4" id="editalter4" class="alterBox" contenteditable="true"  ><?php if(isset($arrayName[3])){echo $arrayName[3];} ?></div>
                  
                </div>
                <div id="alternative5" style="display:none"> 
                  <div class="form-group" style="position:relative;left:5%"><label>Alternativa 5</label></div>
                  <div name="editalter5" id="editalter5" class="alterBox" contenteditable="true"  ><?php if(isset($arrayName[4])){echo $arrayName[4];} ?></div>
                  
                </div>
                <div id="alternative6" style="display:none"> 
                  <div class="form-group" style="position:relative;left:5%"><label>Alternativa 6</label></div>
                  <div name="editalter6" id="editalter6" class="alterBox" contenteditable="true"  ><?php if(isset($arrayName[5])){echo $arrayName[5];}  ?></div>
                  
                </div>
                  <?php } ?>
                <script>
                CKEDITOR.disableAutoInline = true;
                CKEDITOR.config.htmlEncodeOutput = false;
                CKEDITOR.config.entities = false;
                CKEDITOR.inline( 'editenun1' );
                CKEDITOR.inline( 'editalter1' );
                CKEDITOR.inline( 'editalter2' );
                CKEDITOR.inline( 'editalter3' );
                CKEDITOR.inline( 'editalter4' );
                CKEDITOR.inline( 'editalter5' );
                CKEDITOR.inline( 'editalter6' );
                </script>
            
        </div>
        <br>
        <br>
        <div class="box-footer">
            <button class="btn btn-info pull-right">Finalizar questão</button>
            
              <button id="addalternative" type="button" class="btn btn-info glyphicon glyphicon-plus pull-left" onclick="addAlternative()" ></button>
              <button id="delalternative" type="button" class="btn btn-info glyphicon glyphicon-minus pull-left" style="display:none" onclick="delAlternative()" ></button>    
            </div>
            
            
        </form>
        
        
        

       </div>
        </div>
       <!--  </div>
        </section>
        </div> -->

        
        
        
     <script>

          
         count = 3;
         function addAlternative(){

            child = document.getElementById('alternative'+count);
            child.style.display = "block";
            linebreak = document.createElement("br");
            child.parentNode.insertBefore(linebreak, child);
            count++;

            if(count == 4){
              document.getElementById('delalternative').style.display = "block";
            }

            if(count==7){
                document.getElementById('addalternative').style.display = "none";
            }
            

         }

         function delAlternative(){

            child = document.getElementById('alternative'+(count-1));
            child.style.display = "none";
            count--;
            if(count==2){
                document.getElementById('delalternative').style.display = "none";
            }

         }

         
         </script>

         <script>

         $('#question').on('submit', function(){

                var enun1 = CKEDITOR.instances.editenun1.getData();
                var alt1 = CKEDITOR.instances.editalter1.getData();
                var alt2 = CKEDITOR.instances.editalter2.getData();
                var alt3 = CKEDITOR.instances.editalter3.getData();
                var alt4 = CKEDITOR.instances.editalter4.getData();
                var alt5 = CKEDITOR.instances.editalter5.getData();
                var alt6 = CKEDITOR.instances.editalter6.getData();
                var idquiz = "<?php echo $_SESSION['idQuizCreated'] ?>";
                var dataString = $("#question").serialize();

                dataString += '&alt1='+alt1+'&alt2='+alt2+'&alt3='+alt3+'&alt4='+alt4+'&alt5='+alt5+'&alt6='+alt6+'&enun1='+enun1+'&idquiz='+idquiz;
                //alert(dataString);


    $.ajax({
        type: "POST",
                    url: "updatequestion.php",
                    data: dataString,
                    cache: false,
                    success: function(html){
                        alert("success");
                        window.location = "questionadmin.php";
                   },
                   error: function(xhr, ajaxOptions, thrownError){ 
                        alert(xhr.responseText);
                    }
    });

    return false;
});

         

         </script>
