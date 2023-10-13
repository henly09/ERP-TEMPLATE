<?php

namespace App\Http\Controllers;
use App\Models\Customers; 
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index(){

        $customers = Customers::orderBy('id', 'desc')->paginate(10);
        return view('pages.customers.index', ['customers' => $customers]);

    }

    public function create(){
        return view('pages.customers.create');
        
    }

    public function createSave(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:customers,email',
            'contact_Num' => 'required|numeric',
            'address' => 'required',
            'status' => 'required|in:Active,Closed,Balance,Paid',
            'due_Date' => 'required|date_format:Y-m-d',
        ]);

        $customer = Customers::create($validatedData);

        
        return redirect()->action([CustomersController::class, 'index']);
    }

    public function delete($id){

        $customer = Customers::findOrFail($id);
        $customer->delete();
        return redirect()->action([CustomersController::class, 'index']); 
             
    }

    public function search(Request $request){
           // Retrieve the search query from the request
           $query = $request->input('search');

           // Perform the search logic using Eloquent on the Customers model
           $customers = Customers::where('name', 'like', '%' . $query . '%')
                               ->orWhere('email', 'like', '%' . $query . '%')
                               ->orWhere('address', 'like', '%' . $query . '%')
                               ->orderBy('id', 'desc')
                               ->paginate(10);
   
           // Return the search results to a view or do something else with the results
           return view('pages.customers.index', ['customers' => $customers,'queried' => $query]);
    }

    public function update($id){

        $customer = Customers::find($id);

        if (!$customer) {
            abort(404, 'Customer not found');
        }
        return view('pages.customers.edit', ['customer' => $customer]);
    }

    public function saveEdit(Request $request, $id){
        $customer = Customers::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact_Num' => 'required',
            'address' => 'required',
            'status' => 'required',
            'due_Date' => 'required|date_format:Y-m-d',
        ]);

        $customer->update($validatedData);
        return redirect()->action([CustomersController::class, 'index']);
    }
}
