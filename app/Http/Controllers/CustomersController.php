<?php

namespace App\Http\Controllers;
use App\Models\Customers; 
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index(){

        $customers = Customers::paginate(10); // You can adjust the number of records per page (e.g., 10)
        return view('pages.customers.index', ['customers' => $customers]);

    }

    public function create(){
        return view('pages.customers.create');
    }

    public function read(){
        return view('pages.customers.read');
    }

    public function delete(){
        // Delete Function Only
    }

    public function search(){
        // Search Function Only
    }

    public function update(){
        return view('pages.customers.edit');
    }
}
