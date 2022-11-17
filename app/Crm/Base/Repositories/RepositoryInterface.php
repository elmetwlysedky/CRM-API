<?php

namespace App\Crm\Base\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

interface RepositoryInterface
{
    public function all();
    public function show($id) : ? Model;
    public function store(array $data) : ?Model;
    public function update(array $data) : ?Model;
    public function delete($id) : bool;

}
