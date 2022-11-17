<?php

namespace App\Http\Controllers\Api;

use App\Crm\Project\Requests\ProjectRequest;
use App\Crm\Project\Services\ProjectService;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    private ProjectService $projectService;

    public function __construct( ProjectService $projectService)
    {
        $this->projectService = $projectService ;
    }


    public function index()
    {
        return $this->projectService-> index();
    }


    public function store(ProjectRequest $request)
    {
        return $this->projectService-> store($request);
    }


    public function show($id)
    {
        return $this->projectService-> show((int) $id);
    }



    public function update(ProjectRequest $request, $id)
    {
        return $this->projectService-> update($request,(int)$id,);

    }


    public function destroy($id)
    {
        return $this->projectService-> destroy((int)$id);
    }
}
