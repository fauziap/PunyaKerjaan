<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreApplicantRequest;
use App\Models\ProjectApplication;

class FrontController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $projects = Project::orderByDesc('id')->get();

        return view('front.index', compact('categories', 'projects'));
    }

    public function out_of_connect()
    {
        return view('front.out_of_connect');
    }

    public function category(Category $category)
    {
        return view('front.category', compact('category'));
    }

    public function details(Project $project)
    {
        $projects = Project::orderByDesc('id')->get();
        return view ('front.details', compact('project', 'projects'));
    }

    public function apply_job(Project $project)
    {
        $user = Auth::user();
        if($user->hasAppliedToProject($project->id)){
            return redirect()->route('dashboard.proposals');
        }

        if($user->connect == 0){
            return redirect()->route('front.out_of_connect');
        }

        if($project->has_started){
            return redirect()->route('front.details', $project->slug);
        }

        return view('front.apply', compact('project'));

    }

    public function apply_job_store(StoreApplicantRequest $request, Project $project){
        $user = Auth::user();

        if($user->connect == 0){
            return redirect()->route('front.out_of_connect');
        } else {
            $user->decrement('connect', 1);
        }

        DB::transaction(function () use ($request, $user, $project) {
            $validated = $request->validated();

            $validated['freelancer_id'] = $user->id;
            $validated['project_id'] = $project->id;
            $validated['status'] = 'Waiting';

            $newApplyJob = ProjectApplication::create($validated);
        });

        return redirect()->route('front.details', $project->slug);

    }


}
