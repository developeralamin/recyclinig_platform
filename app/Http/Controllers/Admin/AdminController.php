<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Contact;
use App\Models\Payment;
use App\Models\Website;
use App\Models\InfoArticle;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUserRequest;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     *
     * @param int $id
     */
    private function singleUser(int $id)
    {
        return User::findOrFail($id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return AdminDashboardPage
     *
     */
    public function index()
    {
        return view('admin.content');
    }

    /**
     * Display a listing of the resource.
     *
     * @return AdminDashboardPage
     *
     */
    public function dashboard()
    {
        $this->data['user']                     = User::count();
        $this->data['total_contact']            = Contact::count();
        $this->data['total_website']            = Website::count();
        $this->data['total_word']               = InfoArticle::sum('length');
        $this->data['total_generate_article']   = InfoArticle::where('status', '=', 'done')->count();
        $this->data['total_processing_article'] = InfoArticle::where('status', '=', 'processing')->count();

        return view('admin.dashboard', $this->data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return AllUsers
     *
     */
    public function users()
    {
        $this->data['users'] = User::latest()->simplePaginate(15);
        return view('admin.users.users', $this->data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return SingleUser
     *
     */
    public function userDetails($id)
    {
        $this->data['user']          = $this->singleUser($id);
        $this->data['total_article'] =  InfoArticle::where('user_id', $this->data['user']->id)->count();
        $this->data['total_website'] =  Website::where('user_id', $this->data['user']->id)->count();
        $this->data['total_payment'] =  Payment::where('user_id', $this->data['user']->id)->sum('amount');
        $this->data['articles']      = InfoArticle::where('user_id', $this->data['user']->id)->latest('id')->simplePaginate(30);
        $this->data['payments']      = Payment::where('user_id', $this->data['user']->id)->latest('id')->simplePaginate(30);

        return view('admin.users.detials', $this->data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return UserCredits Form
     *
     */
    public function userCredtis($id)
    {
        $this->data['user'] = $this->singleUser($id);

        return view('admin.users.user_credits', $this->data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return AddUserCredits
     *
     */
    public function addUserCredtis(UserRequest $request, $id)
    {
        $user               = $this->singleUser($id);
        $user->balance      = $request['balance'];
        $user->expire_date  = $request['expire_date'];
        $user->save();

        return redirect()->route('users-details', $user->id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return UpdateUser
     *
     */
    public function updateUser(UpdateUserRequest $request, $id)
    {
        $user               = $this->singleUser($id);
        $user->name         = $request['name'];
        $user->email        = $request['email'];
        $user->phone        = $request['phone'];
        $user->save();

        return redirect()->route('users-details', $user->id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return deleteUser
     *
     */
    public function deleteUser($id)
    {
        $user  = $this->singleUser($id);
        $user->delete();
        Toastr::success('User successfully delete :)', 'Success');

        return redirect()->route('users-list');
    }

    /**
     * Display a listing of the resource.
     *
     * @return UpdateUser
     *
     */
    public function updateUserStatus($id)
    {
        $userStatus = User::select('is_active')->where('id', $id)->first();
        $status = ($userStatus->is_active == 1) ? 0 : 1;

        $data = ['is_active' => $status];
        if($status == 1) {
            $data['email_verified_at'] = Carbon::now();
        }

        User::where('id', $id)->update($data);

        Toastr::success('Successfully changed user status :)', 'Success');

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return allContact
     *
     */
    public function allContact()
    {
        $this->data['contacts'] = Contact::latest('id')->get();

        return view('admin.contact.contact', $this->data);
    }
}
