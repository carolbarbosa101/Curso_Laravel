<?php
namespace App\Repositories\Eloquent;

abstract class AbstractRepository {

    protected $model;


    function __construct(){
            $this->model = $this->resolveModel();
    }


    public function all(){
        return $this->model->all();
    }
    
    public function paginate(int $paginate = 10){
        return $this->model->paginate($paginate);
    }



    protected function resolveModel(){
        return app($this->model);
    }
}
