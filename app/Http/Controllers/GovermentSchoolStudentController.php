<?php

namespace App\Http\Controllers;

use App\GovermentSchoolStudent;
use Illuminate\Http\Request;

class GovermentSchoolStudentController extends Controller
{
    public function index(GovermentSchoolStudent $govermentSchoolStudent)
    {
        $govermentSchoolStudents=GovermentSchoolStudent::get();
        return view('socialStatus.goverment_school_student.index',compact(['govermentSchoolStudent','govermentSchoolStudents']));
    }
}
