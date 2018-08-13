function ajaxPostRedirect(sendString, postURL, redirectURL) {


    $.ajax({
        type: "POST",
        url: postURL,
        data: sendString,
        cache: false,
        success: function (html) {

            window.location = redirectURL;
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
        }
    });


}

function makeComboBox(select, url, filter, optionvalue, option) {

    $.ajax({
        url: url + '?filter=' + filter,
        data: "",
        dataType: 'json',
        success: function (data) {
            $.each(data, function (key, arr) {
                $('#' + select).append('<option id="' + key + '" value="' + arr[optionvalue] + '">' + arr[option] + '</option>');
            });
        }
    });
}


function addComboAllQuizType(select, ajaxurl) {
    makeComboBox(select, ajaxurl, 'quiz', 'idQuizType', 'QuizType');
}

function addComboAllDiscipline(select, ajaxurl) {
    makeComboBox(select, ajaxurl, 'discipline', 'idDiscipline', 'DisciplineName');
}

function addComboAllStudySubject(select, ajaxurl) {
    makeComboBox(select, ajaxurl, 'studysubject', 'idStudySubject', 'StudySubjectName');
}

