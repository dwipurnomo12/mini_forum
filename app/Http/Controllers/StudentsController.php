<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.students.index', [
            'students'  => User::where('role_id', '3')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|unique:users',
            'password'  => 'required|min:8',
            'role_id'   => 'required',
            'id_number' => 'required|numeric',
            'major'     => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role_id'   => $request->role_id,
            'id_number' => $request->id_number,
            'major'     => $request->major
        ]);

        return redirect('/admin/students')->with('success', 'Successfully added new data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = User::where('role_id', '3')->find($id);
        return view('admin.students.show', [
            'student'   => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = User::where('role_id', '3')->find($id);
        return view('admin.students.edit', [
            'student'   => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = User::where('role_id', '3')->find($id);
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required',
            'id_number' => 'required|numeric',
            'major'     => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->filled('password')) {
            $passwordValidator = Validator::make($request->all(), [
                'password'          => 'required|min:8',
                'confirmPassword'   => 'same:password',
            ]);

            if ($passwordValidator->fails()) {
                return back()->withErrors($passwordValidator)->withInput();
            }

            $student->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
                'id_number' => $request->id_number,
                'major'     => $request->major
            ]);
        } else {
            $student->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'id_number' => $request->id_number,
                'major'     => $request->major
            ]);
        }

        return redirect('/admin/students')->with('success', 'Successfully updated data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = User::where('role_id', '3')->find($id);
        $student->delete();

        return redirect()->back()->with('success', 'Successfully deleted data!');
    }
}
