<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;

/**
 * Class BlogPostRepository.
 */
class BlogPostRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'title', 'slug', 'is_published', 'published_at', 'user_id', 'category_id'];

        $result = $this
        ->startConditions()
        ->select($columns)
        ->orderBy('id', 'ASC')
        //->with('category', 'user')
        ->with('category:id,title', 'user:id,name')
        ->paginate($perPage);

        return $result;
    }

    public function getEdit($id){
        return $this->startConditions()->find($id);
    }
}
