</main>
<footer class="main-footer">
    <div class="text-right hidden-xs">
        <strong>Copyright &copy; 2016 - Tudo é Educação</strong>
    </div>
</footer>
</div>

<script src="/tudoeeducacao/public/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/tudoeeducacao/public/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<script src="/tudoeeducacao/public/bower_components/AdminLTE/dist/js/app.min.js"></script>
<script src="/tudoeeducacao/public/bower_components/AdminLTE/plugins/fastclick/fastclick.js"></script>
<script src="/tudoeeducacao/public/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="/tudoeeducacao/public/bower_components/AdminLTE/plugins/ionslider/ion.rangeSlider.min.js"></script>
<script src="/tudoeeducacao/public/bower_components/AdminLTE/plugins/bootstrap-slider/bootstrap-slider.js"></script>
<script src="/tudoeeducacao/public/bower_components/AdminLTE/plugins/select2/select2.full.min.js"></script>
<script src="/tudoeeducacao/public/bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="/tudoeeducacao/public/bower_components/AdminLTE/plugins/chartjs/Chart.min.js"></script>
<script src="/tudoeeducacao/public/bower_components/AdminLTE/plugins/iCheck/icheck.min.js"></script>
<script src="/tudoeeducacao/public/other_components/js/ajaxFunctions.js"></script>
<script src="/tudoeeducacao/public/other_components/js/elementFunctions.js"></script>
<script>
    $(function () {
        /* BOOTSTRAP SLIDER */
        $('.slider').slider({
            formatter: function (value) {
                limittime = value;
                return value;
            }
        });

        $(".select2").select2();

        $('#general-quiz').on('submit', function () {
            var quizname = document.getElementById('quizname').value;
            var discipline = document.getElementById('discipline').value;
            var studysubject = document.getElementById('studysubject').value;
            var points = document.getElementById('points').value;
            var nofquestions = document.getElementById('nofquestions').value;
            var quiztype = document.getElementById('quiztype').value;
            var randomize = document.getElementById('randomize').checked;

            var dataString = $("#general-quiz").serialize();

            dataString += '&quizname=' + quizname + '&discipline=' + discipline + '&studysubject=' + studysubject + '&points=' + points + '&nofquestions=' + nofquestions + '&limittime=' + limittime + '&quiztype=' + quiztype + '&randomize=' + randomize;
            //alert(dataString);

            ajaxPostRedirect(dataString, "createquiz.php", "questionadmin.php");

            return false;
        });
    });
</script>
<script>
        addComboAllQuizType('quiztype', 'ajaxquiz.php');
//        addComboAllDiscipline('discipline', '../user/ajaxuser.php');
//        addComboAllStudySubject('studysubject', '../user/ajaxuser.php');
</script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>