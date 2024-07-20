<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\WalletTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\StoreToolProjectRequest;
use App\Models\ProjectApplication;
use App\Models\ProjectTool;
use App\Models\Tool;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $projectsQuery = Project::with(['category', 'applicants'])->orderByDesc('id');
        if($user->hasRole('project_client')){
            $projectsQuery->whereHas('owner', function ($query) use ($user){
                $query->where('client_id', $user->id);
            });
        }

        $projects = $projectsQuery->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.projects.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $user = Auth::user();
        $balance = $user->wallet->balance;

        if($request->input('budget') > $balance){
            return redirect()->back()->withErrors(['budget' => 'Balance Anda tidak cukup']);
        }

        DB::transaction(function () use ($request, $user) {
            $user->wallet->decrement('balance', $request->input('budget'));

            $projectWalletTransaction = WalletTransaction::create([
                'type' => 'Project Cost',
                'amount' => $request->input('budget'),
                'is_paid' => true,
                'user_id' => $user->id,
            ]);

             $validated = $request->validated();

             if($request->hasFile('thumbnail')){
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
             }

             $validated['slug'] = Str::slug($validated['name']);
             $validated['has_finished'] = false;
             $validated['has_started'] = false;
             $validated['client_id'] = $user->id;

             $newProject = Project::create($validated);

        });

        return redirect()->route('admin.projects.index');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function tools(Project $project)
    {
        if($project->client_id != auth()->id()){
            abort(403, 'You are not authorized');
        }
        $tools = Tool::all();
        return view('admin.projects.tools', compact('project','tools'));
    }

    public function tools_store(StoreToolProjectRequest $request, Project $project)
    {
        DB::transaction(function () use ($request, $project) {

            $validated = $request->validated();
            $validated['project_id'] = $project->id;

            $toolProject = ProjectTool::firstOrCreate($validated);

        });

        return redirect()->route('admin.projects.tools', $project->id);
    }

    public function complete_project_store(ProjectApplication $projectApplicant)
    {

        DB::transaction(function() use ($projectApplicant){
            $validated['type'] = 'Revenue';
            $validated['is_paid'] = true ;
            $validated['amount'] = $projectApplicant->project->budget;
            $validated['user_id'] = $projectApplicant->freelancer_id;

            $addRevenue = WalletTransaction::firstOrCreate($validated);

            $projectApplicant->freelancer->wallet->increment('balance', $projectApplicant->project->budget);

            $projectApplicant->project->update([
                'has_finished' => true
            ]);
        });

        return redirect()->route('admin.projects.show', [$projectApplicant->project, $projectApplicant->id]);

    }

    public function edit(Project $project)
    {
        //
    }


    public function update(Request $request, Project $project)
    {
        //
    }


    public function destroy(Project $project)
    {
        //
    }
}
