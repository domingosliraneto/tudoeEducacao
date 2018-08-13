<?php

namespace App\Controllers;

ini_set('display_errors', true);
error_reporting(E_ALL);

require_once dirname(__FILE__).'/../../../lib/database/Connection.php';
require_once dirname(__FILE__).'/../../../lib/database/Record.php';
require_once dirname(__FILE__).'/../../../lib/database/Filter.php';
require_once dirname(__FILE__).'/../../../lib/database/Where.php';
require_once dirname(__FILE__).'/../../models/user/Discipline.php';


class Discipline
{

    public function addDiscipline($DisciplineName, $idStudyAreaFK){
        $disc = new \App\Models\Discipline();
        return $disc->create(
                [
                    'DisciplineName' => $DisciplineName,
                    'idStudyAreaFK' => $idStudyAreaFK
                    
                ]);

    }

    public function listDiscipline(){
        $disc = new \App\Models\Discipline();
        return $disc->All();

    }

    public function deleteDiscipline($idDiscipline){
        $disc = new \App\Models\Discipline($idDiscipline);
        $disc->delete();

    }
    
    public function updateDiscipline($idDiscipline, $DisciplineName, $idStudyAreaFK){
        $disc = new \App\Models\Discipline($idDiscipline);
        $disc->update(
                [
                    'DisciplineName' => $DisciplineName,
                    'idStudyAreaFK' => $idStudyAreaFK
                ]);
    }
}

?>