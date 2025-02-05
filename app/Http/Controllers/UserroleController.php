<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userrole;

class UserroleController extends Controller
{

    public function index()
    {
        $userrole = Userrole::orderBy('created_at', 'DESC')->get();
        return view('userroles.index', compact('userrole'));
    }
  
    public function create()
    {
        return view('userroles.create');
    }
  
    public function store(Request $request)
    {
        Userrole::create($request->all());
        return redirect()->route('userroles')->with('toast_success', 'User Role added successfully');
    }
  
    public function show(string $id)
    {
        $userrole = Userrole::findOrFail($id);
        return view('userroles.show', compact('userrole'));
    }
  
    public function edit(string $id)
    {
        $userrole = Userrole::findOrFail($id);
        return view('userroles.edit', compact('userrole'));
    }
  
    public function update(Request $request, string $id)
    {
        $userrole = Userrole::findOrFail($id);
        $userrole->update($request->all());
  
        return redirect()->route('userroles')->with('toast_success', 'User Role updated successfully');
    }
  
    public function destroy(string $id)
    {
        $userrole = Userrole::findOrFail($id);
        $userrole->delete();
  
        return redirect()->route('userroles')->with('toast_success', 'User Role deleted successfully');
    }
}