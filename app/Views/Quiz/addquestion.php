<div class="col-md-11">

    <div class="box box-info">
        <div class="modal-header">
            <div><span style="position:relative;left:43%">Criando Nova Questão</span>
                <button type="button" class="close" data-dismiss="modal"
                        onclick="document.getElementById('mod').style.display='none'" aria-label="Close"
                        style="padding:0%">
                    <span aria-hidden="true">&times;</span></button>
            </div>
        </div>
        <br><br>
        <form id="question" method="post">
            <div id="wording">
                <div class="form-group"><label>Enunciado</label></div>
                <div name="editor1" id="enun1" class="questionBox" contenteditable="true"></div>
            </div>
            <br>
            <div id="alternatives">
                <table>
                    <tr id="alternative1">
                        <td>
                            <div>
                                <div class="form-group"><label>Alternativa 1</label></div>
                                <div name="alter1" id="alter1" class="alterBox" contenteditable="true"></div>
                            </div>
                        </td>
                        <td class="answercheckbox">
                            <label><input id="check1" type="checkbox"> </label>
                        </td>
                    </tr>
                    <tr id="alternative2">
                        <td>
                            <div>
                                <div class="form-group"><label>Alternativa 2</label></div>
                                <div name="alter2" id="alter2" class="alterBox" contenteditable="true"></div>
                            </div>
                        </td>
                        <td class="answercheckbox">
                            <label><input id="check2" type="checkbox"> </label>
                        </td>
                    </tr>
                    <tr id="alternative3" style="display:none">
                        <td>
                            <div>
                                <div class="form-group"><label>Alternativa 3</label></div>
                                <div name="alter3" id="alter3" class="alterBox" contenteditable="true"></div>
                            </div>
                        </td>
                        <td class="answercheckbox">
                            <label><input id="check3" type="checkbox"> </label>
                        </td>
                    </tr>
                    <tr id="alternative4" style="display:none">
                        <td>
                            <div class="alternative">
                                <div class="form-group"><label>Alternativa 4</label></div>
                                <div name="alter4" id="alter4" class="alterBox" contenteditable="true"></div>
                            </div>
                        </td>
                        <td class="answercheckbox">
                            <label><input id="check4" type="checkbox"> </label>
                        </td>
                    </tr>
                    <tr id="alternative5" style="display:none">
                        <td>
                            <div>
                                <div class="form-group"><label>Alternativa 5</label></div>
                                <div name="alter5" id="alter5" class="alterBox" contenteditable="true"></div>
                            </div>
                        </td>
                        <td class="answercheckbox">
                            <label><input id="check5" type="checkbox"> </label>
                        </td>
                    </tr>
                    <tr id="alternative6" style="display:none">
                        <td>
                            <div>
                                <div class="form-group"><label>Alternativa 6</label></div>
                                <div name="alter6" id="alter6" class="alterBox" contenteditable="true"></div>

                            </div>
                        </td>
                        <td class="answercheckbox">
                            <label><input id="check6" type="checkbox"> </label>
                        </td>
                    </tr>
                </table>
                <script>
                    CKEDITOR.disableAutoInline = true;
                    CKEDITOR.config.htmlEncodeOutput = false;
                    CKEDITOR.config.entities = false;
                    CKEDITOR.inline('enun1');
                    CKEDITOR.inline('alter1');
                    CKEDITOR.inline('alter2');
                    CKEDITOR.inline('alter3');
                    CKEDITOR.inline('alter4');
                    CKEDITOR.inline('alter5');
                    CKEDITOR.inline('alter6');
                </script>
            </div>
            <br>
            <br>
            <div class="box-footer">
                <button class="btn btn-info pull-right">Finalizar questão</button>
                <button id="addalternative" type="button" class="btn btn-info glyphicon glyphicon-plus pull-left"
                        onclick="addAlternative()"></button>
                <button id="delalternative" type="button" class="btn btn-info glyphicon glyphicon-minus pull-left"
                        style="display:none" onclick="delAlternative()"></button>
            </div>
        </form>
    </div>
</div>
<script>


    count = 3;
    function addAlternative() {

        child = document.getElementById('alternative' + count);
        child.style.display = "block";
        count++;

        if (count == 4) {
            document.getElementById('delalternative').style.display = "block";
        }

        if (count == 7) {
            document.getElementById('addalternative').style.display = "none";
        }


    }

    function delAlternative() {

        child = document.getElementById('alternative' + (count - 1));
        child.style.display = "none";
        count--;
        if (count == 2) {
            document.getElementById('delalternative').style.display = "none";
        }
        if (count == 6) {
            document.getElementById('addalternative').style.display = "block";
        }

    }


</script>

<script>

    $('#question').on('submit', function () {

        var enun1 = CKEDITOR.instances.enun1.getData();
        var alt1 = CKEDITOR.instances.alter1.getData();
        var alt2 = CKEDITOR.instances.alter2.getData();
        var alt3 = CKEDITOR.instances.alter3.getData();
        var alt4 = CKEDITOR.instances.alter4.getData();
        var alt5 = CKEDITOR.instances.alter5.getData();
        var alt6 = CKEDITOR.instances.alter6.getData();
        var idquiz = "<?php echo $_SESSION['idQuizCreated'] ?>";
        var check1 = document.getElementById('check1').checked;
        var check2 = document.getElementById('check2').checked;
        var check3 = document.getElementById('check3').checked;
        var check4 = document.getElementById('check4').checked;
        var check5 = document.getElementById('check5').checked;
        var check6 = document.getElementById('check6').checked;
        var dataString = $("#question").serialize();

        dataString += '&alt1=' + alt1 + '&alt2=' + alt2 + '&alt3=' + alt3 + '&alt4=' + alt4 + '&alt5=' + alt5 + '&alt6=' + alt6 + '&enun1=' + enun1 + '&idquiz=' + idquiz;
        dataString += '&check1=' + check1 + '&check2=' + check2 + '&check3=' + check3 + '&check4=' + check4 + '&check5=' + check5 + '&check6=' + check6;
        //alert(dataString);
        ajaxPostRedirect(dataString, "createquestion.php", "questionadmin.php");


        return false;
    });


</script>
