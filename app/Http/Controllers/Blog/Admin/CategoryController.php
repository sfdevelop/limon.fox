<?php

namespace App\Http\Controllers\Blog\Admin;

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
        dd(__METHOD__);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd(__METHOD__);
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
    public function update(Request $request, $id)
    {
        // $id=99999999;
        // dd(__METHOD__, $request->all(), $id);
        $item = BlogCategory::find($id);
        // dd($item);
        if (empty($item )) {
            return back()->withErrors(['msg'=>"запись id=[{$id}] не найдена"])->withInput();
        }

        $data=$request  ->all();
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
