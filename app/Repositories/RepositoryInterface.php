<?php
namespace App\Repositories;
interface RepositoryInterface
{
    public function all();
    public function find($id);
    public function findWithTrash($id);
    public function findWhere($where, $columns);
    public function whereWithTrash($where, $columns);
    public function create(array $attributes);
    public function update($id, array $attributes);
    public function delete($id);
}