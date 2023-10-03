<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);
        if ($contacts->count() > 0) {

            $data = [
                'status' => 200,
                'contacts' => $contacts
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'status' => 404,
                'contacts' => 'NO RECORDS FOUND'
            ];
            return response()->json($data, 404);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'email' => 'required|email|unique:contacts,email,',
            'phone' => 'required|digits:10',
            'country' => 'required|string|max:191',
            'city' => 'required|string|max:191',
            'state' => 'required|size:2',
            'zip' => 'required|digits:5',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $contacts = Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'country' => $request->country,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,

            ]);
            if ($contacts) {
                return response()->json([
                    'status' => 200,
                    'message' => "Contact Created succefully",
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Something Whrong !!",
                ], 500);
            }
        }
    }
}
