<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBuildingBlockRequest;
use App\Models\BB\BuildingBlock;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BuildingBlocksController extends Controller
{
    public function index()
    {
        $bbs = BuildingBlock::with('curators')->get();

        return view('bb.index', compact('bbs'));
    }

    /**
     * GET
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $users = User::all();
        $bb = new BuildingBlock();
        return view('bb.create', compact('users', 'bb'));
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

        return redirect('bb');
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
}
