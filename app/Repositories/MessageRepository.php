<?php

namespace App\Repositories;

use App\Models\Message as Model;
use Illuminate\Database\Eloquent\Collection;

class MessageRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'name', 'email'];
        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('created_at', 'DESC')
            ->paginate($perPage);

        return $result;
    }

    public function getById($id)
    {
        return $this->startConditions()->find($id);
    }

}
