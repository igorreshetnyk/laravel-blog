<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;


/**
 * Class BlogCategoryRepository.
 */
class BlogCategoryRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getForCombobox()
    {
        //return $this->startConditions()->all();
        $fileds = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS title',
        ]);

        $result = $this
        ->startConditions()
        ->selectRaw($fileds)
       ->toBase()
        ->get();

        return $result;
    }

    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this
        ->startConditions()
        //->select($colums)
        ->paginate($perPage, $columns);

        return $result;
    }
}
