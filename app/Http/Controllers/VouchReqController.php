<?php

namespace App\Http\Controllers;
use App\Models\Vouchreqs; 
use App\Models\Customers;
use Illuminate\Http\Request;

class VouchReqController extends Controller
{
        public function index(){

        // Paginate the Vouchreqs table
        $vouchreqs = Vouchreqs::orderBy('id', 'desc')->paginate(10);

        // Get the customer IDs from the paginated Vouchreqs
        $customerIds = $vouchreqs->pluck('cust_id')->toArray();

        // Query the Customers table to retrieve the name and status columns
        $customersData = Customers::whereIn('id', $customerIds)
            ->select('id', 'name', 'status')
            ->get();

        // Loop through the paginated Vouchreqs data
        $vouchreqs->each(function ($vouchreq) use ($customersData) {
            // Find the corresponding customer data by matching cust_id and id
            $customer = $customersData->where('id', $vouchreq->cust_id)->first();

            // If a matching customer is found, add the name and status to the vouchreq data
            if ($customer) {
                $vouchreq->name = $customer->name;
                $vouchreq->status = $customer->status;
            }
        });

        return view('pages.vouchreq.index',['vouchreqs' => $vouchreqs]);

        }

        public function create($id = null){

            if(!$id){

                $customers = Customers::get();
                return view('pages.vouchreq.create',['customers' => $customers]);

            } else {

                $customers = Customers::get();
                $toVouch = Customers::find($id);
                return view('pages.vouchreq.create',['customers' => $customers, 'toVouch' => $toVouch]);

            }
        }

        public function createSave(Request $request){

            $validatedData = $request->validate([
                'cust_id' => 'required',
                'particulars' => 'required',
                'amount' => 'required|numeric',
                'requested_by' => 'required',
                'check_by' => 'required',
                'comments' => 'required',
            ]);

            $vouchreqs = Vouchreqs::create($validatedData);

            return redirect()->action([VouchReqController::class, 'index']);
        }

    public function delete($id){
        $vouchreqs = Vouchreqs::findOrFail($id);
        $vouchreqs->delete();
        return redirect()->action([VouchReqController::class, 'index']); 
    }

    public function search(Request $request){
         // Retrieve the search query from the request
         $query = $request->input('search');

         // Perform the search logic using Eloquent on the Customers model
         $vouchreqs = Vouchreqs::where('requested_by', 'like', '%' . $query . '%')
                             ->orWhere('check_by', 'like', '%' . $query . '%')
                             ->orWhere('particulars', 'like', '%' . $query . '%')
                             ->orderBy('id', 'desc')
                             ->paginate(10);

          // Get the customer IDs from the paginated Vouchreqs
          $customerIds = $vouchreqs->pluck('cust_id')->toArray();
  
          // Query the Customers table to retrieve the name and status columns
          $customersData = Customers::whereIn('id', $customerIds)
              ->select('id', 'name', 'status')
              ->get();
  
          // Loop through the paginated Vouchreqs data
          $vouchreqs->each(function ($vouchreq) use ($customersData) {
              // Find the corresponding customer data by matching cust_id and id
              $customer = $customersData->where('id', $vouchreq->cust_id)->first();
  
              // If a matching customer is found, add the name and status to the vouchreq data
              if ($customer) {
                  $vouchreq->name = $customer->name;
                  $vouchreq->status = $customer->status;
              }
          });
  
         // Return the search results to a view or do something else with the results
         return view('pages.vouchreq.index', ['vouchreqs' => $vouchreqs, 'queried' => $query]);
    }

    public function update($id){

            $vouchreqs = Vouchreqs::find($id);
            $customers = Customers::get();
            return view('pages.vouchreq.edit',['vouchreqs' => $vouchreqs,'customers' =>$customers]);

    }

    public function saveEdit(Request $request, $id){
        $vouchreqs = Vouchreqs::findOrFail($id);

        $validatedData = $request->validate([
            'cust_id' => 'required',
            'particulars' => 'required',
            'amount' => 'required|numeric',
            'requested_by' => 'required',
            'check_by' => 'required',
            'comments' => 'required',
        ]);
        $vouchreqs->update($validatedData);
        
        return redirect()->action([VouchReqController::class, 'index']);
    }
}
