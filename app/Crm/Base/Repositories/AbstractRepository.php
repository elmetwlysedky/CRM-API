<?php

namespace App\Crm\Base\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class AbstractRepository implements RepositoryInterface
{

protected Model $model;



    public function all()
    {
      return $this->model->all();
    }

    public function show($id): ?Model
    {

       return $this->model->find($id);

    }

    public function store( $data): ?Model
    {
        foreach ($data as $field =>$val){
            $this->model->{$field} = $val;
        }
        $this->model->save();
        return $this->model;

    }

    public function update( $data): ?Model
    {
        $model = $this->model->find($data['id']??0);

        foreach ($data as $field =>$val){
            $this->model->{$field} = $val;
        }
        $this->model->save();
        return $this->model;

        return $this->model->update($data);
    }

    public function delete($id): bool
    {
        $this->model = $this->model->find($id);

        return $this->model->delete();
    }


    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * @param Model $model
     */
    public function setModel(Model $model): void
    {
        $this->model = $model;
    }


}
