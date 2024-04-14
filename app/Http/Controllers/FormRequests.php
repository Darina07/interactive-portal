<?php

namespace App\Http\Controllers;

use App\Models\FormRequest;
use Illuminate\Http\Request;
use App\Models\User;
class FormRequests extends Controller
{
    //

    public function index(){
        return view('request.index',
            ['formrequests' => FormRequest::paginate(10)]);
    }

    public function edit(FormRequest $formrequest){

        if(auth()->user()->role > 0 || auth()->user()->id === $formrequest->user_id) {
            return view('request.edit', ['formrequest' => $formrequest, 'users' => User::all()]);

        }
        else{
            abort(403, "Permission Denied.");
        }
    }

    public function search(Request $request){
        return view('request.index',
            ['formrequests' => FormRequest::where('name', 'like', '%'.$request->input('search').'%')->paginate(10)]);
    }

    public function destroy(FormRequest $formrequest)
    {
        $formrequest->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }


    public function update(Request $request, FormRequest $formrequest){


        if(auth()->user()->role > 0 || auth()->user()->id == $formrequest->user_id) {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|max:255',
                'user_id' => 'max:255',
                'status' => 'required',
                'note' => 'max:255'
            ]);
            // Create a new user or perform any other action with the form data
            $formrequest->update($validatedData);
            return redirect()->back()->with('success', 'Request updated successfully.');
        }
        else{
            abort(403, "Permission Denied");
        }

    }
}
