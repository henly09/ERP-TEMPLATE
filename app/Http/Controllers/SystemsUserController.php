<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Password;
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class SystemsUserController extends Controller
{
    public function index(){
        $users = User::paginate(10); // You can adjust the number of records per page (e.g., 10)
        return view('pages.sysuser.index', ['users' => $users]);
    }

    public function createSave(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'role' => 'required|in:User,Admin',
            'email_verified_at' => 'required|date_format:Y-m-d',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'email_verified_at' => $request->email_verified_at,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->action([SystemsUserController::class, 'index']);
    }

    public function create(){
        return view('pages.sysuser.create');
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->action([SystemsUserController::class, 'index']); 
    }

    public function Verified($id){
        
        $user = User::findOrFail($id);
        $currentDateTime = Carbon::now();
        $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
        $data = [
            'email_verified_at' => $formattedDateTime,
        ];
        $user->update($data);
        return redirect()->action([SystemsUserController::class, 'index']);

    }

    public function UnVerified($id){
        
        $user = User::findOrFail($id);
        $currentDateTime = Carbon::now();
        $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
        $data = [
            'email_verified_at' => null,
        ];
        $user->update($data);
        return redirect()->action([SystemsUserController::class, 'index']);

    }

    public function Admin($id){
        
        $user = User::findOrFail($id);
        $data = [
            'role' => "Admin",
        ];
        $user->update($data);
        return redirect()->action([SystemsUserController::class, 'index']);

    }

    public function UnAdmin($id){
        
        $user = User::findOrFail($id);
        $data = [
            'role' => "User",
        ];
        $user->update($data);
        return redirect()->action([SystemsUserController::class, 'index']);

    }

    public function search(Request $request){
        // Retrieve the search query from the request
        $query = $request->input('search');

        // Perform the search logic using Eloquent on the User model
        $users = User::where('name', 'like', '%' . $query . '%')
                            ->orWhere('email', 'like', '%' . $query . '%')
                            ->orWhere('role', 'like', '%' . $query . '%')
                            ->paginate(10);

        // Return the search results to a view or do something else with the results
        return view('pages.sysuser.index', ['users' => $users,'queried' => $query]);
    }
}
