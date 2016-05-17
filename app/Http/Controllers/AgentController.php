<?php

namespace App\Http\Controllers;

use App\Agent;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class AgentController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $agents = Agent::all();
    $currenttime = Carbon::now()->format('h:i a');
    $today = Carbon::now()->formatLocalized('%a %d %b %y');

    return view('pages.agents.home', compact('agents', 'today', 'currenttime'));
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
   * @param Requests\AgentRequest $request
   * @return Response
   */
  public function store(Requests\AgentRequest $request)
  {
    if($request->ajax())
    {
      $slug = Str::slug($request->name);

      $agent = new Agent;

      $agent->name = $request->name;
      $agent->slug = $slug;
      $agent->industry = $request->industry;

      $agent->save();

      $response = [
        'msg' => 'Awesome! close this modal window !'
      ];

      return \response()->json($response);
    }
    else
    {
      $slug = Str::slug($request->name);

      $agent = new Agent;

      $agent->name = $request->name;
      $agent->slug = $slug;
      $agent->industry = $request->industry;

      $agent->save();

      return redirect('agents')->with('success', 'Agent' . ucwords($agent->name) . ' has been successfully created!' );
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
