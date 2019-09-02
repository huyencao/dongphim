<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\User;

class UserRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\User::class;
    }

    public function findUser($id)
    {
        $data = User::find($id);
        if ($data == null) {
            return false;
        } else {
            return $data;
        }
    }
}
