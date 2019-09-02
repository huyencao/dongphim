<?php
namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Container\Container as App;

abstract class EloquentRepository implements RepositoryInterface
{
    protected $model;
    public function __construct()
    {
        $this->app = new App();
        $this->makeModel();
    }
    abstract public function model();
    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model) {
            throw new Exception("Class { $this->model() } must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        return $this->model = $model;
    }
    public function all()
    {
        return $this->model->all();
    }
    public function find($id)
    {
        $result = $this->model->findOrFail($id);
        return $result;
    }
    public function findWithTrash($id)
    {
        $result = $this->model->withTrashed()->findOrFail($id);
        return $result;
    }
    public function findWhere($where , $columns)
    {
        $result = $this->model->where($where, $columns)->get();
        return $result;
    }
    public function whereWithTrash($where , $columns)
    {
        $result = $this->model::withTrashed()->where($where, $columns)->get();
        return $result;
    }
    public function whereNull($id)
    {
        $result = $this->model->whereNull($id)->get();
        return $result;
    }
    public function whereNotNull($id)
    {
        $result = $this->model->whereNotNull($id)->get();
        return $result;
    }
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }
    public function update($id, array $attributes)
    {
        $result = $this->model->findOrFail($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }
        return false;
    }
    public function delete($id)
    {
        $result = $this->model->findOrFail($id);
        if ($result) {
            $result->delete();
            return true;
        }
        return false;
    }
}