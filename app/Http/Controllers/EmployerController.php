<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class EmployerController extends Controller
{
    public function index(){
        return view('user.index',
            ['users' => User::paginate(10)]);
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|max:255',
            'phone' => 'required|max:255',
        ]);

        // Create a new user or perform any other action with the form data
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' =>  Hash::make($validatedData['email']),
            'phone' => $validatedData['phone'],
            'approve' => 1,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }

    public function edit(User $user){
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user){

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
            'phone' => 'required|max:255',
        ]);

        // Create a new user or perform any other action with the form data
        $user->update($validatedData);

        return redirect()->back()->with('success', 'User updated successfully.');


    }
    public function search(Request $request){
        return view('user.index',
            ['users' => User::where('name', 'like', '%'.$request->input('search').'%')->paginate(10)]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
