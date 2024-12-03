<?php

namespace App\Http\Controllers\Admin;

use App\Models\SiteInfo;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\SiteInfoRequest;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class SiteInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['site_info'] = SiteInfo::firstOrCreate();
        if ($this->data['site_info']->logo) {
            $this->data['site_info']->logo = Storage::url($this->data['site_info']->logo);
        }
        return view('admin.siteInfo.show', $this->data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['site_info'] = SiteInfo::findOrFail($id);
        if ($this->data['site_info']->logo) {
            $this->data['site_info']->logo = Storage::url($this->data['site_info']->logo);
        }
        return view('admin.siteInfo.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SiteInfoRequest $request, SiteInfo $site_info)
    {
        $data = $request->all();

        $site_info->tagline          = $data['tagline'];
        $site_info->title            = $data['title'];
        $site_info->meta_keywords    = $data['meta_keywords'];
        $site_info->meta_description = $data['meta_description'];
        $site_info->openai_api_key   = $data['openai_api_key'];

        if ($request->file('logo')) {
            if (!empty($site_info->logo)) {
                Storage::delete($site_info->logo);
            }
            $site_info->logo = Storage::putFile('siteInfo', $request->file('logo'));
        }
        $site_info->save();

        Artisan::call('config:cache');

        Toastr::success('SiteInfo successfully updated :)', 'Success');
        return redirect()->route('site-info.index');
    }
}
