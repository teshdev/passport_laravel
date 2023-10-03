<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //To view existing contact lists
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
    //To create new contact
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
    //To call single contact
    public function show($id)
    {
        $contact  = Contact::find($id);
        if ($contact) {
            return response()->json([
                'status' => 200,
                'contact' => $contact,
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Contact found!",
            ], 404);
        }
    }
    //Update a contact list
    public function update(Request $request, int $id)
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
            $contact = Contact::find($id);

            if ($contact) {
                $contact->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'country' => $request->country,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zip' => $request->zip,

                ]);
                return response()->json([
                    'status' => 200,
                    'message' => "Contact Updated succefully",
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "No contact Found!",
                ], 404);
            }
        }
    }
    //Delete contact
    public function destroy($id)
    {
        $contact  = Contact::find($id);
        if ($contact) {
            $contact->delete();
            return response()->json([
                'status' => 200,
                'message' => "Contact Deleted succefully",
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'message' => "No contact Found!",
            ], 404);
        }
    }
}
