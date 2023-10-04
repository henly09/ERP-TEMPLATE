<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisbursementController extends Controller
{
    public function index(){
        return view('pages.disbursement.index');
    }

    public function create(){
        return view('pages.disbursement.create');
    }

    public function read(){
        return view('pages.disbursement.read');
    }

    public function delete(){
        // Delete Function Only
    }

    public function search(){
        // Search Function Only
    }

    public function update(){
        return view('pages.disbursement.edit');
    }
}
