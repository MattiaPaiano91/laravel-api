<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


//Models
use App\Models\Project;
use GrahamCampbell\ResultType\Success;

class ProjectController extends Controller
{
    public function index()
    {

        $projects = Project::with('technologies','types')->paginate(3);

        return response()->json([
            'success'=> true,
            'result'=>$projects
        ]);
    }

    public function show(string $slug)
    {
        $projects = Project::where('slug', $slug)->firstOrFail();
        return response()->json([
            'success'=> true,
            'result'=>$projects
        ]);
    }
}
