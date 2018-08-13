<?php

namespace App\Controllers;


class Alternative
{

    public function addAlternative($content, $isCorrect, $idQuizQuestionFK)
    {
        $alt = new \App\Models\Alternative();
        return $alt->create(
            [
                'content' => $content,
                'isCorrect' => $isCorrect,
                'idQuizQuestionFK' => $idQuizQuestionFK

            ]);

    }

    public function listAlternative($idQuizQuestionFK = null)
    {
        $alt = new \App\Models\Alternative();
        if ($idQuizQuestionFK == null) {
            return $alt->all();
        } else {
            $filtro = new \Lib\Database\Filter('idQuizQuestionFK', '=', $idQuizQuestionFK);
            $where = new \Lib\Database\Where();
            $where->add($filtro);
            return $alt->all($where);
        }


    }

    public function deleteQuestion($idAlternative)
    {
        $alt = new \App\Models\Alternative($idAlternative);
        $alt->delete();

    }

    public function updateQuestion($content, $isCorrect, $idQuizQuestionFK)
    {
        $alt = new \App\Models\Alternative($idAlternative);
        $alt->update(
            [
                'content' => $content,
                'isCorrect' => $isCorrect,
                'idQuizQuestionFK' => $idQuizQuestionFK
            ]);
    }
}
