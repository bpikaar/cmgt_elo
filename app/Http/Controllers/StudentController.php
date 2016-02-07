<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBuildingBlockRequest;
use App\Models\BB\BuildingBlock;
use App\Models\Cle\Course;
use App\Models\Cle\Exam;
use App\Models\Cle\Result;
use App\Models\Cle\Sprint;
use App\User;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    private $navbbs;
    private $currentCourse;
    private $userId;

    public function __construct()
    {
        $this->middleware('auth');

        $this->userId = Auth::user()->id;

        $this->navbbs = DB::table('building_block_student')
            ->join('building_blocks', 'building_blocks.id', '=', 'building_block_student.building_block_id')
            ->where('building_block_student.user_id', $this->userId)
            ->get();

        $this->currentCourse = Course::where('start_date', '<=', Carbon::now()->toDateString() )
                                        ->where('end_date', '>=',Carbon::now()->toDateString() )
                                        ->first();
    }

    /**
     * GET
     * Building blocks student
     * @return Response
     */
    public function index()
    {
        $bbs = BuildingBlock::with('curators')->get();

        $tempSprints = Sprint::where('course_id', $this->currentCourse->id)
            ->get();

        $sprints = [];
        $courseCompleted = 1; // default value

        foreach ($tempSprints as $index => $sprint)
        {
            $sprints[$index]['sprint'] = $sprint;

            $exams = Exam::where('sprint_id', $sprint->id)
                ->get();

            $sprintCompleted = 1;
            foreach ($exams as $index2 => $exam)
            {
                $sprints[$index]['exams'][$index2]['exam']    = $exam;

                // Resultaten per toets inclusief de feedback van alle resultaten.
                // In de front-end wordt alleen het laatst toegevoegd resultaat voorzien van feedback
                $sprints[$index]['exams'][$index2]['results'] = Result::leftJoin('feedbacks', 'feedbacks.result_id', '=', 'results.id')
                                                                    ->where('results.exam_id', $exam->id)
                                                                    ->where('results.student_id', $this->userId)
                                                                    ->orderBy('results.created_at')->get();

                // Checks if exam is completed
                $completed = Result::where('exam_id', $exam->id)
                    ->where('student_id', $this->userId)
                    ->where('result', 'v')
                    ->where('result', 'V')
                    ->orderBy('created_at')->get();

                if($completed->isEmpty())
                {
                    $examCompleted = 0;
                    $sprintCompleted = 0;
                }
                else
                    $examCompleted = 1;
                $sprints[$index]['exams'][$index2]['completed'] = $examCompleted;
            }

            if(!$sprintCompleted) $courseCompleted = 0; // alleen overschrijven als een sprint niet behaald is.

            $sprints[$index]['sprintCompleted'] = $sprintCompleted;
        }
//        dd($sprints);
        return view('student.index', [
            'bbs'               => $bbs,
            'navbbs'            => $this->navbbs,
            'course'            => $this->currentCourse,
            'sprints'           => $sprints,
            'courseCompleted'   => $courseCompleted,
        ]);
    }

    /**
     * GET
     * Dashboard student
     * @return Response
     */
    public function dashboard()
    {
        return view('student.dashboard', [
            'navbbs'    => $this->navbbs,
        ]);
    }

    public function assessmentApplication($id)
    {
        $bb = BuildingBlock::find($id);
        return view('student/assessment_application', compact('bb'));
    }

    /**
     * POST
     * @param $id building block id
     * @return Response
     */
    public function createAssessment($id)
    {
        $bb = BuildingBlock::find($id);
        return view('student/assessment_application', compact('bb'));
    }
    /**
     * GET
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $users = User::all();
        return view('bb.create', compact('users'));
    }

    /**
     * POST
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    /**
     * GET
     */
    public function edit($id)
    {
        $users = User::all();
        $bb = BuildingBlock::with('curators')->find($id);

        $curators = User::lists('firstname', 'id');
        $selected = $bb->curators()->lists('id');  //cu lists('id');

        return view('bb.edit', compact('bb', 'curators', 'selected', 'users'));
    }

    public function store(CreateBuildingBlockRequest $request)
    {
        $bb = BuildingBlock::create($request->all());
        $bb->curators()->attach($request->curators);

        return redirect('/users');
    }

    /**
     * Update a Building Block
     *
     * @param CreateBuildingBlockRequest $request
     * @param $id
     * @return Response
     */
    public function update(CreateBuildingBlockRequest $request, $id)
    {
        $bb = BuildingBlock::findOrFail($id);
        $bb->update($request->all());
        $bb->curators()->sync($request->curators);
        return redirect('bb');
    }

    /**
     * Change status of building block (toggle open, busy)
     * @param $blockId building block id
     * @return mixed
     */
    public function statusUpdate($blockId)
    {
        $bb = DB::table('building_block_student')
            ->where('building_block_id', $blockId)
            ->first();

        $bb->status = ($bb->status == 1) ? 0 : 1;
        DB::table('building_block_student')
            ->where('building_block_id', $blockId)
            ->update(['status' => $bb->status]);

        //TODO dit met ajax op te lossen?
        //return redirect('student/dashboard');
        return redirect()->back();
    }
}
