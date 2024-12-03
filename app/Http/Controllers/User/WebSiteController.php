<?php

namespace App\Http\Controllers\User;

use App\Models\Website;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\WebsiteRequest;

class WebSiteController extends Controller
{
    /**
     *
     * @param int $id
     */
    private function authenticateUserWebsite(int $user_id)
    {
        return Auth::user()->websites()->findOrFail($user_id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['websites']  = Auth::user()->websites()->simplePaginate(15);
        return view('user.website.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.website.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebsiteRequest $request)
    {
        $data             = $request->all();
        $data['user_id']  = Auth::user()->id;
        $data['domain']   = rtrim($data['domain'], '/');
        if (!preg_match("~^(?:f|ht)tps?://~i", $data['domain'])) {
            $data['domain'] = "https://" . $data['domain'];
        }

        Website::create($data);

        Toastr::success('Website successfully added :)', 'Success');
        return redirect()->route('website.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['website'] =  $this->authenticateUserWebsite($id);
        return view('user.website.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['website'] = $this->authenticateUserWebsite($id);
        return view('user.website.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WebsiteRequest $request, Website $website)
    {
        $data = $request->all();

        $website->title     = $data['title'];
        $website->domain    = $data['domain'];
        $website->username  = $data['username'];
        $website->password  = $data['password'];
        $website->save();

        Toastr::success('Website successfully updated :)', 'Success');
        return redirect()->route('website.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authenticateUserWebsite($id)->delete();

        Toastr::success('Website successfully delete :)', 'Success');
        return back();
    }
}
