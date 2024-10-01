<?php

namespace App\Http\Controllers\RestroApi;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\ContactUs;
use App\Models\Country;
use App\Models\Facility;
use App\Models\State;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OtherController extends Controller
{
    public function __construct()
    {
        // $this->middleware('restroApi', ['except' => ['Country']]);
        $this->middleware('restroapi', ['only' => []]);
    }

    public function Country()
    {
        try {
            $country = Country::all();
            return response()->json(['success' => true, 'data' => ['result' => $country, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function State($id)
    {
        try {
            $State = State::where('country_id', $id)->get();
            return response()->json(['success' => true, 'data' => ['result' => $State, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function City($id)
    {
        try {
            $City = City::where('state_id', $id)->get();
            return response()->json(['success' => true, 'data' => ['result' => $City, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function CityAdd(Request $request)
    {
        try {

            $validator = Validator::make($request->all(),[
                'state_id' => ['required'],
                'name' => ['required','unique:cities,name,NULL,id,state_id,' . $request->state_id],
            ]);
            if($validator->fails()){
                $messages = $validator->getMessageBag();
                return response()->json(['success' => false, 'error' => ['message' => 'Validation Error', 'error_message' => $messages]], 422);
            }

            $City = City::create([
                'state_id' => $request->state_id,
                'name' => $request->name,
            ]);
            return response()->json(['success' => true, 'data' => ['result' => $City, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function Category()
    {
        try {
            $category = Category::all();
            return response()->json(['success' => true, 'data' => ['result' => $category, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function Facility()
    {
        try {
            $facility = Facility::all();
            return response()->json(['success' => true, 'data' => ['result' => $facility, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }

    public function ContactUs()
    {
        try {
            $facility = ContactUs::all();
            return response()->json(['success' => true, 'data' => ['result' => $facility, 'message' => 'success.']], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' => ['message' => 'Something went wrong.', 'error_message' => $e->getMessage()]], 422);
        }
    }
}
