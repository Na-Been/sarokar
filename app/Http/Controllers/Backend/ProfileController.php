<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repo\UserRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * @var UserRepo
     */
    private $userRepo;

    /**
     * ProfileController constructor.
     */
    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $user = $this->userRepo->findById($id);
        return view('backend.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        try {
            $id = Auth::id();
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users,id,' . $id,
                'avatar' => 'mimes:jpg,jpeg,png'
            ]);
            if ($request->password != null) {
                $this->validate($request, [
                    'password' => 'confirmed|min:6',
                ]);
            }

            $data = $request->all();
            $user = $this->userRepo->findById($id);
            if ($request->password != null) {
                $data['password'] = bcrypt($request->password);
            } else {
                $data['password'] = $user->password;
            }

            if ($request->file('avatar')) {
                $file = $request->file('avatar');
                $data['avatar'] = $file->store('profile');

            }
            $update = $user->fill($data)->save();
            if ($update) {
                session()->flash('success', 'Profile Successfully updated!');
                return back();
            } else {
                session()->flash('error', 'Profile could not be update!');
                return back();
            }
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION:' . $exception);
            return back();
        }
    }
}
