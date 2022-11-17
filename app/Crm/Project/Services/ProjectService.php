<?php

namespace App\Crm\Project\Services;

use App\Crm\Project\Events\ProjectCreation;
use App\Crm\Project\Models\Project;
use App\Crm\Project\Requests\ProjectRequest;

class ProjectService
{
    public function index()
    {
        $project = Project::all();
        if (! $project){
            return response()->json(['status'=>'not found',\Illuminate\Http\Response::HTTP_NOT_FOUND]);
        }

        return response()->json([ $project,'status'=>'success',\Illuminate\Http\Response::HTTP_ACCEPTED]);
    }


    public function store(ProjectRequest $request)
    {
        $data = $request->validated();
        $project = Project::create($data);

        event(new ProjectCreation($project));

//        return $project;
//        return response()->json([ 'status'=>'success',\Illuminate\Http\Response::HTTP_ACCEPTED]);

    }


    public function show(int $id)
    {
        $project = Project::find($id);
        if (!$project){
            return response()->json(['status'=>'not found',\Illuminate\Http\Response::HTTP_NOT_FOUND]);
        }
        return response()->json([ $project,'status'=>'success',\Illuminate\Http\Response::HTTP_ACCEPTED]);

    }



    public function update(ProjectRequest $request,int $id )
    {
        $project = Project::find($id);
        if (! $project){
            return response()->json(['status'=>'not found'],\Illuminate\Http\Response::HTTP_NOT_FOUND);
        }

        $data = $request->validated();

        $project->update($data);
        return response()->json([ $project,'status'=>'success'],\Illuminate\Http\Response::HTTP_ACCEPTED);


    }


    public function destroy( int $id)
    {
        $project = Project::destroy($id);
        if (! $project){
            return response()->json(['status'=>'not found'],\Illuminate\Http\Response::HTTP_NOT_FOUND);
        }
        return response()->json([ $project,'status'=>'success'],\Illuminate\Http\Response::HTTP_ACCEPTED);

    }
}
