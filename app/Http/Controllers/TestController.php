<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Traits\ManagesResponse;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Models\Citizen;
use App\Models\ThirdParty;
use App\Models\Ward;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TestController extends Controller
{
    use ManagesResponse;



public function Ward(Request $request, $dev_key)
{
    try {


        $checkUser = ThirdParty::where('dev_key', $dev_key)->first();

        if (!$checkUser) {
            return Response::json([
                'status' => 'error',
                'message' => 'Invalid dev key!'
            ], 403);
        }
        $data = Citizen::all();
        $message = 'Citizens  successfully fetched';

        $data = Citizen::orderBy('id', 'desc')->get();
        $message = 'Citizens successfully fetched';

        return $this->sendResponse($data,$message);
    }catch (ModelNotFoundException $e) {
        return response()->json(['message' => $e->getMessage()],404);
    } catch(\Exception $e) {
        return response()->json(['message' => $e->getMessage()],500);
    }
}




















}
