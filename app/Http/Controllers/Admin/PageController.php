<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Http\Requests\PageRequest;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['pages'] = Page::latest('id')->simplePaginate(15);
        return view('admin.page.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $data = $request->all();
        $slug = strtolower(str_replace(' ', '-', $data['slug']));
        $data['slug'] = $slug;
        Page::create($data);

        Toastr::success('Page successfully added :)', 'Success');
        return redirect()->route('page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['page'] = Page::findOrFail($id);
        return view('admin.page.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['page'] = Page::findOrFail($id);
        return view('admin.page.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, Page $page)
    {
        $data              = $request->all();
        $page->title       = $data['title'];
        $page->description = $data['description'];
        $page->save();

        Toastr::success('Page successfully updated :)', 'Success');
        return redirect()->route('page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::find($id)->delete();

        Toastr::success('Page successfully delete :)', 'Success');
        return back();
    }
}
