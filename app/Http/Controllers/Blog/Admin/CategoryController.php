<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\Admin\BaseController;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Http\Requests\BlogCategoryCreateRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{

    private $blogCategoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$paginator = BlogCategory::paginate(5);

        $paginator = $this->blogCategoryRepository->getAllWithPaginate(5);

        return view('blog.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogCategory();
        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        $data = $request->input();

            // in observer

//         if (empty($data['slug'])) {
//             $data['slug'] = Str::slug($data['title']);
// }
        // $item = new BlogCategory($data);
        // $item->save();

        $item = (new BlogCategory())->create($data);

        if ($item) {
            return redirect()->route('blog.admin.categories.edit', [$item->id])
                ->with(['success' => 'Category save']);
        } else {
            return back()->withErrors(['msg' => 'Save error'])
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $item = BlogCategory::findOrFail($id);
        // $categoryList = BlogCategory::all();

        $item = $this->blogCategoryRepository->getEdit($id);

        // $v['title_before'] = $item->title;
        // $item->title = 'Ajkldsdf jfdlskfj 2323';

        // $v['title_after'] = $item->title;
        // $v['getAttribute'] = $item->getAttribute('title');
        // $v['attributesToArray'] = $item->attributesToArray();
        // $v['attributes'] = $item->attributes['title'];
        // $v['getAttributeValue'] = $item->getAttributeValue('title');
        // $v['getMutatedAttributes'] = $item->getMutatedAttributes();
        // $v['hasGetMutator for title'] = $item->hasGetMutator('title');
        // $v['toArray'] = $item->toArray();

        // dd($item, $v);

        $categoryList = $this->blogCategoryRepository->getForCombobox();

        return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {

        // $rules = [
        //     'title' =>          ['required', 'min:5', 'max:255'],
        //     'slug' =>           ['max:200'],
        //     'description' =>    ['string','max:500','min:3'],
        //     'parent_id' =>      ['required','integer', 'exists:blog_categories,id'],
        // ];

        // $validateData = $this->validate($request, $rules);
        // $validateData = $request->validate($rules);

        $item = $this->blogCategoryRepository->getEdit($id);
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "No category id=[{$id}]"])
                ->withInput();
        }
        $data = $request->all();
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }
        $result = $item->update($data);
        // $result = $item
        //     ->fill($data)
        //     ->save();

        if ($result) {
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => 'Save']);
        } else {
            return back()
                ->withErrors(['msg' => 'Error save'])
                ->withInput();
        }
    }
}
