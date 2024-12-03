<?php

namespace App\Http\Controllers\Admin;

use App\Models\Website;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class WebsiteController extends Controller
{
    /**
     * Website List
     *
     * @return void
     */
    public function website()
    {
        $this->data['websites']  = Website::latest()->simplePaginate(15);
        return view('admin.website.website', $this->data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteWebsite($id)
    {
        Website::find($id)->delete();

        Toastr::success('Website successfully delete :)', 'Success');
        return back();
    }
}
