<?php

namespace App\Http\Controllers;

use App\Model\FeedBack;
use Validator;
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

    public function submit(Request $request)
    {
        $dataToSave = $request->all();
        if (isset($dataToSave["_token"])) {
            unset($dataToSave["_token"]);
        }
        try {
            $model = FeedBack::query()->create(["data" => json_encode($dataToSave)]);
            if ($model->id) {
                return response()->json(["message" => "Success"], 200);
            }
            return response()->json(["message" => "Data not sended"], 400);
        } catch (\Exception $exception) {
            return response()->json(["message" => $exception->getMessage()], 500);
        }
    }
}
