<?php
/**
 * Created by PhpStorm.
 * User: Shahin
 * Date: 8/7/2021
 * Time: 11:54 PM
 */

namespace App\Repositories;


abstract class Repository
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->model());
    }

    abstract public function model();

    public function all()
    {
        return $this->model->orderBy('id', 'desc')->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function update($model, array $data)
    {
        return $this->model->update($data);
    }

    public function delete($model)
    {
        return $this->model->delete();
    }

    public function exists($id)
    {
        return $this->model->where('id', $id)->exists();
    }

    public function paginate($limit = 10)
    {
        return $this->model->orderBy('id', 'desc')->paginate($limit);
    }

    public function getBy($col, $value, $limit = 15)
    {
        return $this->model->where($col, $value)->limit($limit)->get();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }
}
