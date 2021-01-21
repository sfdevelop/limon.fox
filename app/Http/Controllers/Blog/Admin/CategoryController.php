<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Modals\BlogCategory;
use Illuminate\Http\Request;


class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = BlogCategory::paginate(5);

        return view('Blog.admin.category.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(__METHOD__);

        $item = new BlogCategory();
        $categorylist = BlogCategory::all();

        return view("Blog.admin.category.edit", compact('item', 'categorylist'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        // dd(__METHOD__);

        $data=$request->input();

        if (empty($data['slug'])) {
            $data['slug']=str_slug($data['title']);
        }

            // создаем объект но не записываем в базу
               $item= new BlogCategory($data);
            //    dd($item);
               $item->save();

            if ($item) {
                return redirect()->route('blog.admin.categories.create')->with(['success'=>'Новая категория создана']);
            }
                else
                {
                return back()->withErrors(['msg'=>'Ошибка сохранения']);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        // dd(__METHOD__);
        $item = BlogCategory::findOrFail($id);

        $categorylist= BlogCategory::all();
        // dd($categorylist);
        return view('Blog.admin.category.edit',  compact('item','categorylist'));
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

        // $rules=[
        //     'title' => 'required|min:5|max:200',
        //     'slug' => 'max:200',
        //     'description' => 'string|max:5000|min:10',
        //     'parent_id' => 'required|integer|exists:blog_categories,id',
        // ];
        // $validateData = $request->validate($rules);

        $item = BlogCategory::find($id);

        if (empty($item )) {
            return back()->withErrors(['msg'=>"запись id=[{$id}] не найдена"])->withInput();
        }

        $data=$request  ->all();

        if (empty($data['slug'])) {
            $data['slug']=str_slug($data['title']);
        }

        // dd($data);
        $result=$item->fill($data)->save();

        if ($result) {
            return redirect()->route('blog.admin.categories.edit', $item->id)->with(['success'=>'успешно сохранено']);
        } else{
            return back()->withErrors(['msg'=>"Ошибка сохранения"])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(__METHOD__);
    }
}
