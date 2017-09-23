<?php

namespace App\Http\Controllers;

use App\Repositories\FieldsRepository;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        $fields = new FieldsRepository();

        return view('welcome', ['fields' => $fields->getAll()]);
    }
}
