<?php

namespace App\Http\Controllers;

use App\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $employees = Employee::all();
    $currenttime = Carbon::now()->format('h:i a');
    $today = Carbon::now()->formatLocalized('%a %d %b %y');

    return view('pages.employees.home', compact('employees', 'today', 'currenttime'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Requests\EmployeeRequest $request
   * @return Response
   */
  public function store(Requests\EmployeeRequest $request)
  {
    if($request->ajax())
    {
      $slug = Str::slug($request->name);

      $employee = new Employee;

      $employee->name = $request->name;
      $employee->email = $request->email;
      $employee->slug = $slug;
      $employee->title = $request->title;

      $employee->save();

      $response = [
        'msg' => 'Awesome! close this modal window !'
      ];

      return \response()->json($response);
    }
    else
    {
      $slug = Str::slug($request->name);

      $employee = new Employee;

      $employee->name = $request->name;
      $employee->email = $request->email;
      $employee->slug = $slug;
      $employee->title = $request->title;

      $employee->save();

      return redirect('employees')->with('success', 'Employee' . ucwords($employee->name) . ' has been successfully created!' );
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    //
  }
}
