<?php

namespace Modules\User\Http\Controllers;

use App\Models\User;
use App\Repo\UserRepo;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var UserRepo
     */
    private $userRepo;

    /**
     * UserController constructor.
     * @param User $user
     * @param UserRepo $userRepo
     */
    public function __construct(User $user, UserRepo $userRepo)
    {
//        $this->middleware('can:isSuperAdmin');
        $this->middleware('can:isAdminOrSuperAdmin');
        $this->user = $user;
        $this->userRepo = $userRepo;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $users = $this->userRepo->getAll();
        return view('user::index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(UserRequest $request)
    {
        try {
            $data = $request->all();
            $password = bin2hex(random_bytes(5));
            $data['password'] = bcrypt($password);

            if ($request->file('avatar')) {
                $data['avatar'] = $this->userRepo->storeOrUpdateImage($request);
            }
            $user = $this->user->create($data);
            if ($user) {
//                Mail::send('backend.user.emailCredential', ['name' => $request->name, 'password' => $password], function ($m) use ($request) {
//                    $m->to($request->email)->subject('User Access Information');
//                });
                session()->flash('success', 'User Successfully Created!');
                return back();
            } else {
                session()->flash('error', 'User could not be Create!');
                return back();
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Exception : ' . $e);
            return back();
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $id = (int)$id;
        try {
            $user = $this->userRepo->findById($id);
            if ($user) {
                return view('user::edit', compact('user'));
            } else {
                session()->flash('error', 'MR could not be update!');
                return back();
            }
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION:' . $exception);
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $id = (int)$id;
        try {
            $data = $request->all();
            $user = $this->userRepo->findById($id);
            if ($user) {
                if ($request->file('avatar')) {
                    $file = $request->file('avatar');
                    $profilefile = $request->name . date('YmdHis') . "." . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/users/'), $profilefile);
                    $data['avatar'] = $profilefile;
                }
                $update = $user->fill($data)->save();
                if ($update) {
                    session()->flash('success', 'User Successfully updated!');
                    return redirect(route('user.index'));
                } else {
                    session()->flash('error', 'User could not be update!');
                    return back();
                }
            }
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION:' . $exception);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $id = (int)$id;
        try {
            $user = $this->userRepo->findById($id);
            if ($user) {
                $user->delete();
                session()->flash('success', 'User successfully deleted!');
                return back();
            } else {
                session()->flash('error', 'User could not be delete!');
                return back();
            }
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION' . $exception);
            return back();
        }
    }


    public function changeStatus($id)
    {
        $id = (int)$id;
        $value = $this->user->findOrFail($id);
        $this->user
            ->where('id', '=', $id)
            ->update(['status' => ($value->status == 'active') ? 'inactive' : 'active']);

    }
}
