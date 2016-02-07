<?php

namespace App\Http\Controllers;

use App\Models\Cle\Course;
use App\Models\Cle\Exam;
use App\Models\Cle\Result;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
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
        $courses = Course::orderBy('name')->get();
        return view('courses.index', ['courses' => $courses]);
    }

    /**
     * GET
     * Course details
     */
    public function show($id)
    {
        $course = Course::find($id);

        $exams = Exam::where('course_id', $id)
                    ->get();


        // Voor het opmaken van de tabel is het nodig om te weten
        // wat het maximum aantal resultaten van een toets zijn.
        // Zoveel rijen zullen er uiteindelijk in de tabel moeten komen
        // tel het aantal resultaten per toets van deze student
        $iterations = DB::select('SELECT MAX(a.amt) AS amount
                FROM
                    (SELECT
                      COUNT(results.id) AS amt,
                      exams.description,
                      exams.id
                    FROM
                      results
                    INNER JOIN
                      exams ON results.exam_id = exams.id
                    WHERE
                      exams.course_id = :course_id AND results.student_id = :student_id
                    GROUP BY
                      results.exam_id) a', ['course_id' => $course->id, 'student_id' => Auth::user()->id]);

        // Deze tabel wordt gevuld met resultaten. Een '-' als er geen resultaat is
        // De tabel wordt gebruikt om te tekenen op de site
        $resultTable = [];
        foreach ($exams as $index => $exam)
        {
            // Haal alle resultaten per toets op
            $results = DB::table('results')
                ->where('exam_id', $exam->id)
                ->where('student_id', Auth::user()->id)
                ->orderBy('created_at')
                ->get();

            $div = '<div class="panel-group" id="accordion'.$index.'" role="tablist" aria-multiselectable="true">';
            // doorloop het aantal iteraties voor het max aantal resultaten
            for ($i = 0 ; $i < $iterations[0]->amount ; $i++)
            {
                if(!empty($results[$i])) {
                    $feedback = DB::table('feedbacks')
                        ->where('result_id', $results[$i]->id)
                        ->first();
                    if(!empty($feedback)) $feedback = $feedback->content;
                    else $feedback = 'Er is geen feedback toegevoegd.';

                    $div .= '<div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading'.$index.'_'.$i.'">
                                  <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion'.$index.'" href="#collapse'.$index.'_'.$i.'"';
                    // if this is the first feedback in the row, expand the panel
                    $div .= $i == 0 ? 'aria-expanded="true"' : 'aria-expanded="false"';
                    $div .= 'aria-controls="collapse'.$index.'_'.$i.'">';
                    $div .= $results[$i]->result.'</a>
                              </h4>
                            </div>
                            <div id="collapse'.$index.'_'.$i.'"';
                    $div .= $i == 0 ? 'class="panel-collapse collapse in"' : 'class="panel-collapse collapse"';

                    $div .= 'role="tabpanel" aria-labelledby="heading'.$index.'_'.$i.'">
                              <div class="panel-body">';
                    $div .= $feedback;
                    $div .= '</div>
                                </div>
                              </div>';
                    //$resultTable[$i][$index] = '<div>'.$results[$i]->result.'</div>';

                }
                else {
                    //$resultTable[$i][$index] = '-';
                }
            }
            $div .= '</div>';
            $resultTable[0][$index] = $div;

        }

        return view('courses.show', [
            'course'        => $course,
            'exams'         => $exams,
            'resultTable'   => $resultTable
        ]);
    }
}
