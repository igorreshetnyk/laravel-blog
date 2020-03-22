<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\Admin\BaseController;
use App\Jobs\GenerateCatalog\GenerateCatalogMainJob;
use App\Models\BlogPost;
use App\Repositories\BlogPostRepository;
use Carbon\Carbon;
use stdClass;

class DiggingDeeperController extends BaseController
{
    public function collection(BlogPostRepository $blogPostRepository)
    {

        $testCollection = BlogPost::withTrashed()->get();

        //dd(__METHOD__, $testCollection, $testCollection->toArray());

        $collection = collect($testCollection->toArray());

        // dd(get_class($testCollection), get_class($collection), $collection);

        // $result['first'] = $collection->first();
        // $result['last'] = $collection->last();
        // // dd($result);

        // $result['where']['data'] = $collection
        // ->where('category_id', 10)
        // ->values()  // обновляет ключи от 0
        // ->keyBy('id');  // ключи в соответствии с  id

        // $result['where']['count'] = $result['where']['data']->count();
        // $result['where']['isEmpty'] = $result['where']['data']->isEmpty();
        // $result['where']['isNotEmpty'] = $result['where']['data']->isNotEmpty();

        // $result['whereFirst'] = $collection->firstWhere('created_at', '>', '2020-01-07 18:20:27');
        // $result['whereAll'] = $collection->where('created_at', '>', '2020-02-07 18:20:27');

        // $result['map']['all'] = $collection->map(function($item){
        //     //dd($item);
        //     $newItem = new stdClass();
        //     $newItem->item_id = $item['id'];
        //     $newItem->item_name = $item['title'];
        //     $newItem->publish = $item['is_published'] ? 0 : 'publish';

        //     return $newItem;
        // });


        // $newItem = new stdClass();
        // $newItem->id = 999;

        // $newItem2 = new stdClass();
        // $newItem2->id = 888;

        // $collection->prepend($newItem);
        // $collection->push($newItem2);


        // $newItemFirst = $collection->prepend($newItem)->first();
        // $newItemLast = $collection->push($newItem2)->last();
        // $pullItem = $collection->pull(1);

        //dd($newItem, $newItem2, $collection);

        // dd(compact('collection','newItemFirst', 'newItemLast', 'pullItem'));

        // $collection->transform(function($item){
        //     $newItem = new stdClass();
        //     $newItem->item_id = $item['id'];
        //     $newItem->item_name = $item['title'];
        //     $newItem->exists = is_null($item['deleted_at']);
        //     $newItem->created_at = Carbon::parse($item['created_at']);

        //     return $newItem;
        // });

        // //dd($collection);

        // $filtred = $collection->filter(function($item){
        //     $byDay = $item->created_at->isFriday();
        //     $byDate = $item->created_at->day == 10;

        //     $result = $byDate && $byDay;

        //     return $result;
        // });

        // dd(compact('filtred'));

        $sortedSimpleCollection = collect([5, 4, 6, 3, 9, 6, 8])->sort();
        //dd($sortedSimpleCollection);
        $sortAscConllection = $collection->sortBy('created_at');
        $sortDescConllection = $collection->sortByDesc('id');

        dd(compact('sortAscConllection', 'sortDescConllection', 'sortedSimpleCollection'));
    }

    public function prepareCatalog()
    {
        GenerateCatalogMainJob::dispatch();
    }
}
