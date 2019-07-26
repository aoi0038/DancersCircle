<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DancersController extends Controller
{
    //
    public function add()
    {
        return view('admin.dancers.create');
    }
    
    public function create(Request $request)
    {
        return redirect('admin/dancers/create');
    }
    
    public function edit()
    {
        return view('admin.dancers.edit');
    }
    
    public function update()
    {
        return redirect('admin/dancers/edit');
    }
}
