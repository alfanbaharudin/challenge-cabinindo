<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Employee::where('name', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {
            $data = Employee::paginate(10);
        }
        return view('home', compact('data'));
    }

    public function created(Request $request)
    {
        $this->authorize('create', Employee::class);
        $this->validate($request, [
            'telp' => 'required|min:10|max:13',
        ]);
        Employee::create($request->all());
        return redirect()->route('employee')->with('success', 'Add Employee Success');
    }

    public function updated(Request $request, $id)
    {
        $this->authorize('update', Employee::class);
        $data = Employee::find($id);
        $data->update($request->all());
        return redirect()->route('employee')->with('success', 'Edit Employee Success');
    }

    public function deleted($id)
    {
        $this->authorize('delete', Employee::class);
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('employee')->with('success', 'Delete Success');
    }
}
