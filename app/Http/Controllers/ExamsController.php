<?php

namespace App\Http\Controllers;

use App\Models\Cle\Course;
use App\Models\Cle\Exam;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExamsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * GET
     * Overview of all the courses
     */
    public function index()
    {
        $courses = Exam::orderBy('name')->get();
        return view('courses.index', ['courses' => $courses]);
    }

    /**
     * GET
     * Course details
     */
    public function show($id)
    {
        $exam = Exam::find($id);

        $course = Course::find($exam->course_id);

        $feedback = DB::table('feedbacks')
                        ->join('results', 'feedbacks.result_id' , '=', 'results.id')
                        ->join('exams', 'results.exam_id', '=', 'exams.id')

                        ->where('results.exam_id', $id)
                        ->where('feedbacks.student_id', Auth::user()->id)
                        ->select('feedbacks.*', 'exams.description')
                        ->orderBy('feedbacks.created_at', 'desc')
                        ->get();

        return view('exams.show', [
            'exam'      => $exam,
            'course'    => $course,
            'feedback'  => $feedback
        ]);
    }
}
