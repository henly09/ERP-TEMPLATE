<?php

namespace App\Http\Controllers;
use App\Models\Disbursement; 
use App\Models\Customers; 
use App\Models\Vouchreqs; 
use Illuminate\Http\Request;

class DisbursementController extends Controller
{
    public function index(){

        $disbursements = Disbursement::paginate(10);
        $customerIds = $disbursements->pluck('cust_id')->toArray();
        $vouchIDs = $disbursements->pluck('vouch_id')->toArray();

        $customersData = Customers::whereIn('id', $customerIds)
            ->get(['id', 'name', 'status']);

        $vouchreqsData = Vouchreqs::whereIn('id', $vouchIDs)
            ->get(['id', 'amount', 'requested_by']);
        
        $disbursements->each(function ($disbursement) use ($customersData, $vouchreqsData) {
            $customer = $customersData->where('id', $disbursement->cust_id)->first();
            if ($customer) {
                $disbursement->name = $customer->name;
                $disbursement->status = $customer->status;
            }
        
            $vouchreq = $vouchreqsData->where('id', $disbursement->vouch_id)->first();
            if ($vouchreq) {
                $disbursement->amount = $vouchreq->amount;
                $disbursement->requested_by = $vouchreq->requested_by;
            }
        });
        
        return view('pages.disbursement.index', ['disbursements' => $disbursements]);
    }

    public function create(){
        return view('pages.disbursement.create');
    }

    public function delete($id){
        $disbursement = Disbursement::findOrFail($id);
        $disbursement->delete();
        return redirect()->action([DisbursementController::class, 'index']); 
    }

    public function search(Request $request){

        $query = $request->input('search');

        $disbursements = Disbursement::where('total_amount', 'like', '%' . $query . '%')
                ->orWhere('bank_balance', 'like', '%' . $query . '%')
                ->orWhere('dis_per_dccr', 'like', '%' . $query . '%')
                ->paginate(10);

        $customerIds = $disbursements->pluck('cust_id')->toArray();
        $vouchIDs = $disbursements->pluck('vouch_id')->toArray();

        $customersData = Customers::whereIn('id', $customerIds)
            ->get(['id', 'name', 'status']);

        $vouchreqsData = Vouchreqs::whereIn('id', $vouchIDs)
            ->get(['id', 'amount', 'requested_by']);
        
        $disbursements->each(function ($disbursement) use ($customersData, $vouchreqsData) {
            $customer = $customersData->where('id', $disbursement->cust_id)->first();
            if ($customer) {
                $disbursement->name = $customer->name;
                $disbursement->status = $customer->status;
            }
        
            $vouchreq = $vouchreqsData->where('id', $disbursement->vouch_id)->first();
            if ($vouchreq) {
                $disbursement->amount = $vouchreq->amount;
                $disbursement->requested_by = $vouchreq->requested_by;
            }
        });
        
        return view('pages.disbursement.index', ['disbursements' => $disbursements,'queried' => $query]);
    }

    public function update(){
        return view('pages.disbursement.edit');
    }
}
