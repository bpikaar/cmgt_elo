<?php

namespace App\Http\Controllers;

use App\Models\Cle\Course;
use App\Models\Cle\Exam;
use App\Models\Cle\Feedback;
use App\Models\Cle\Result;
use App\Models\Cle\Sprint;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function __construct()
    {
        // TODO add authorize role teacher
        $this->middleware('auth');
    }

    /**
     * GET
     * Overview of all the courses
     */
    public function index()
    {
        $courses = Course::orderBy('name')->get();
        return view('teacher.index', ['courses' => $courses]);
    }


    /**
     * Overview of the students for a course
     * @param $id course id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function studentsByCourse($courseName)
    {
        $course = Course::where('name', $courseName)->first();
        $users  = User::all();

        return view('teacher/students_by_course', [
            'course'    => $course,
            'users'     => $users
        ]);
    }

    /**
     * GET
     * Add grade and feedback for an exam
     */
    public function addGrade($courseName, $studentId)
    {
        $student = User::find($studentId);
        $course  = Course::where('name', $courseName)->first();
        $exams   = $course->exams()->with('sprint')->get();

        return view('teacher/add_grade', [
            'student'   => $student,
            'exams'     => $exams,
            'course'    => $course
        ]);
    }

    /**
     * Store all results and feedback for a course
     */
    public function storeResults(Request $request)
    {
        $student    = User::find($request->student_id);
        $course     = Course::find($request->course_id);
        $exams      = Exam::where('course_id', $course->id)->get();

        // Validate when feedback is present and no result is entered
        $rules =[];
        $messages = [];
        foreach ($request->exams as $index => $exam)
        {
            if ($exam['result'] == '' && $exam['feedback'] != '')
            {
                $rules["exams.$index.result"] = 'required';
                $messages[] = 'Er moet een resultaat ingevuld zijn als je feedback wilt geven.';
            }
        }

        // Handle validation or store
        if (!empty($rules))
        {
            $this->validate($request, $rules, $messages);
        }
        else
        {
            foreach ($request->exams as $index => $exam)
            {
                // Store result and feedback in DB
                if ($exam['result'] != '' && $exam['feedback'] != '')
                {
                    // Save Result in db and get new id
                    $result = new Result();
                    $result->exam_id = $exam['id'];
                    $result->result = $exam['result'];
                    $result->student_id = $student->id;
                    $result->save();

                    // Save feedback with result id
                    $feedback = new Feedback();
                    $feedback->result_id = $result->id;
                    $feedback->content = $exam['feedback'];
                    $feedback->student_id = $student->id;
                    $feedback->save();
                }
            }
        }

        return view('teacher.add_grade', [
            'student'=> $student,
            'course' => $course,
            'exams'  => $exams
        ]);
    }
}
