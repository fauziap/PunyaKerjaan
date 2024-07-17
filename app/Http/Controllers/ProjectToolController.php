<?php

namespace App\Http\Controllers;

use App\Models\ProjectTool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectTool $projectTool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectTool $projectTool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectTool $projectTool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectTool $projectTool)
    {
        DB::beginTransaction();

        try {
            $projectTool->delete();
            DB::commit();
            return redirect()->route('admin.projects.tools', $projectTool->project_id);

        }
        catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.projects.tools', $projectTool->project_id);
        }
    }
}
