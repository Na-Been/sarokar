<?php


namespace Modules\News\Http\Controllers;


use App\Http\Controllers\Controller;

class FileManagerController extends Controller
{

    protected $viewPath = 'news::file-manager.';

    public function index()
    {
        return view($this->viewPath . 'index');
    }


    public function store($file)
    {

        $image = $file->store('images');
    }
}
