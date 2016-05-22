<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Employee;
use App\Http\Requests\EmployeeRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{

  protected $currenttime;
  protected $today;

  public function __construct()
  {

    $this->currenttime = Carbon::now()->format('h:i a');
    $this->today = Carbon::now()->formatLocalized('%a %d %b %y');

    View::share('currenttime', $this->currenttime);
    View::share('today', $this->today);

  }

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

    return view('pages.agents.home', compact('currenttime', 'employees', 'today'));

  }

  /**
   * Show the form for creating a new resource.
   *nice pls complete this series...thanks﻿
   * @return Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param EmployeeRequest $request
   * @param Agent $agent
   * @return Response
   */
  public function store(Agent $agent, EmployeeRequest $request)
  {

    if($request->ajax())
    {

      $slug = Str::slug($request->name);
      $agent->employees()->create(array(
        'name' => $request->name,
        'slug' => $slug,
        'email' => $request->email,
        'title' => $request->title,
      ));

      $response = [
        'msg' => 'Employee successfully created!!'
      ];

      return response()->json($response);

    }
    else
    {

      $slug = Str::slug($request->name);
      $agent->employees()->create(array(
        'name' => $request->name,
        'email' => $request->email,
        'slug' => $slug,
        'title' => $request->title,
      ));
      
      return redirect('employees')->with('success', 'Employee' . ucwords($request->name) . ' has been successfully created!!' );

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
   * @param Agent $agent
   * @param Employee $employee
   * @param Request $request
   * @return Response
   */
  public function edit(Agent $agent, Employee $employee, Request $request)
  {
    
    if($request->ajax())
    {

      $response = array(
        'id' => $agent->id,
        'agentslug' => $agent->slug,
        'employeeslug' => $employee->slug,
        'name' => $employee->name,
        'title' => $employee->title,
        'email' => $employee->email
      );

      return response()->json($response);
      
    }
    else
    {
      
      $employees = $agent->employees()->orderby('created_at')->get();
      
      return view('pages.agents.home', compact('agent', 'employee', 'employees'));
      
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Agent $agent
   * @param Employee $employee
   * @param EmployeeRequest $request
   * @return Response
   */
  public function update(Agent $agent, Employee $employee, EmployeeRequest $request)
  {
    
    if($request->ajax())
    {
      
      $slug = Str::slug($request->name);
      $employee->update(array(
        'name' => $request->name,
        'slug' => $slug,
        'email' => $request->email,
        'title' => $request->title,
      ));
      
      $response = [
        'msg' => 'Record updated!!'
      ];

      return response()->json($response);
      
    }
    else
    {
      
      $slug = Str::slug($request->name);
      $employee->update(array(
        'name' => $request->name,
        'slug' => $slug,
        'email' => $request->email,
        'title' => $request->title,
      ));

      return redirect('employees')->with('success', 'Employee' . ucwords($request->name) . ' has been successfully updated!!');

    }
  }

  /**
   * Permanently deletes the specified resource from the table.
   *
   * @param Agent $agent
   * @param Employee $employee
   * @return Response
   */
  public function delete(Agent $agent, Employee $employee)
  {

    $employee->forceDelete();

    return redirect()->back();

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
