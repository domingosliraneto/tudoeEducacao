<?php

namespace App\Controllers;

ini_set('display_errors', true);
error_reporting(E_ALL);

require_once dirname(__FILE__).'/../../../lib/database/Connection.php';
require_once dirname(__FILE__).'/../../../lib/database/Record.php';
require_once dirname(__FILE__).'/../../../lib/database/Filter.php';
require_once dirname(__FILE__).'/../../../lib/database/Where.php';
require_once dirname(__FILE__).'/../../models/user/StudySubject.php';


class StudySubject
{

    public function addStudySubject($StudySubjectName, $StudySubjectDesciption){
        $stsub = new \App\Models\StudySubject();
        return $stsub->create(
                [
                    'StudySubjectName' => $StudySubjectName,
                    'StudySubjectDesciption' => $StudySubjectDesciption
                    
                ]);

    }

    public function listStudySubject(){
        $stsub = new \App\Models\StudySubject();
        return $stsub->All();

    }

    public function deleteStudySubject($idStudySubject){
        $stsub = new \App\Models\StudySubject($idStudySubject);
        $stsub->delete();

    }
    
    public function updateStudySubject($idStudySubject, $StudySubjectName, $StudySubjectDesciption){
        $stsub = new \App\Models\StudySubject($idStudySubject);
        $stsub->update(
                [
                    'StudySubjectName' => $StudySubjectName,
                    'StudySubjectDesciption' => $StudySubjectDesciption
                ]);
    }
}