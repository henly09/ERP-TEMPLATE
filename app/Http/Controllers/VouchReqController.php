<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VouchReqController extends Controller
{
    public function index(){
        return view('pages.vouchreq.index');
    }

    public function create(){
        return view('pages.vouchreq.create');
    }

    public function read(){
        return view('pages.vouchreq.read');
    }

    public function delete(){
        // Delete Function Only
    }

    public function search(){
        // Search Function Only
    }

    public function update(){
        return view('pages.vouchreq.edit');
    }
}
