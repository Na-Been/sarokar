<?php


namespace App\Repo;


use App\Models\User;

class UserRepo
{
    /**
     * @var User
     */
    private $user;

    /**
     * UserRepo constructor.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function getAll()
    {
        $data = $this->user->orderBy('id', 'DESC')->get();
        return $data;
    }

    public function findById($id)
    {
        return $this->user->findOrFail($id);
    }

    public function storeOrUpdateImage($request)
    {
        $file = $request->file('avatar');
        $fileName = $request->name . date('YmdHis') . "." . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/news/'), $fileName);
        return $fileName;
    }
}
