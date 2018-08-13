<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title">Quiz - Geral</h3>
                </div>

                <div class="box-body">
                    <form id="general-quiz" role="form">
                        <div class="form-group">
                            <label>Nome do Quiz</label>
                            <input type="text" class="form-control" id="quizname" placeholder="Digite o nome do seu Quiz ...">
                        </div>
                        <br>

                        <div class="form-group">
                            <label>Tipo do Quiz</label>
                            <select id="quiztype" class="form-control select2" style="width: 100%;">
                                <option selected="selected">Selecione um Tipo...</option>
                            </select>
                        </div>
                        <br>

                        <div class="form-group">
                            <label>Disciplina</label>

                            <select id="discipline" class="form-control select2" style="width: 100%;">
                                <option selected="selected" value="">Selecione uma Disciplina...</option>
                            </select>
                        </div>

                        <br><br>
                        <div class="form-group">
                            <label>Assunto</label>
                            <select id="studysubject" class="form-control select2" style="width: 100%;">
                                <option selected="selected">Selecione um Assunto...</option>

                            </select>
                        </div>

                        <br>

                        <div>
                            <label>
                                <input type="checkbox" onchange="showElementOnChecked(this,'points')"> Pontos
                            </label>
                            <div style="width:40%;">
                                <br><input type="number" style="display:none" id="points" min="1" max="10">

                            </div>
                        </div>
                        <br>

                        <div>
                            <label>
                                <input type="checkbox" onchange="showElementOnChecked(this,'nofquestions')"> Numero de Questões
                            </label>
                            <div style="width:40%;">
                                <br><input type="number" style="display:none" id="nofquestions" min="1" max="180">

                            </div>
                        </div>
                        <br>

                        <div>
                            <label>
                                <input type="checkbox" onchange="showElementOnChecked(this,'limittm')"> Limite de tempo
                                (Minutos)
                            </label>
                            <div id="limittm" style="width:80%;position:relative;left:3%;display:none ">
                                <br>
                                <input id="value1" type="text" value="" class="slider form-control" data-slider-min="5" data-slider-max="240" data-slider-step="5" data-slider-value="5" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show" data-slider-id="blue">
                            </div>
                        </div>
                        <br>
                        <div>
                            <label>
                                <input id="randomize" type="checkbox"> Randomizar Questões
                            </label>
                        </div>

                        <div class="box-body">
                            <div class="row margin"></div>
                        </div>
                        <!-- Select multiple-->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-default">Voltar</button>
                            <button type="submit" class="btn btn-info pull-right">Avancar</button>
                        </div>

                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>