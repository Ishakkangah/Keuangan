<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permission       = Permission::all();

        return view('permission.index', compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string'
        ]);

        Permission::create([
            'name'          => $request->name
        ]);

        return redirect()->route('permission.index')->with('success', 'berhasil di input');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $Permission)
    {
        return view('permission.edit', compact('Permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $Permission)
    {
        $request->validate([
            'name'          => 'required|string'
        ]);

        $Permission->update([
            'name'          => $request->name
        ]);

        return redirect()->route('permission.index')->with('success', 'berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $Permission)
    {
        $Permission->delete();

        return redirect()->route('permission.index')->with('success', 'berhasil di input');
    }
}
