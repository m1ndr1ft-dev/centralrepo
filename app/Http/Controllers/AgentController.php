<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Http\Controllers\Auth;
use App\Http\Requests\AgentRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class AgentController extends Controller
{

  protected $user;
  protected $currenttime;
  protected $today;

  public function __construct()
  {

    $this->user = \Auth::user();
    $this->currenttime = Carbon::now()->format('h:i a');
    $this->today = Carbon::now()->formatLocalized('%a %d %b %y');

    View::share('user', $this->user);
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

    $agents = \Auth::user()->agents()->orderby('created_at')->get();
    $deletedAgents = \Auth::user()->agents()->onlyTrashed()->get();

    return view('pages.agents.home', compact('agents', 'currenttime', 'deletedAgents', 'today', 'user'));

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
   * @param AgentRequest $request
   * @return Response
   */
  public function store(AgentRequest $request)
  {

    if($request->ajax())
    {

      $slug = Str::slug($request->name);
      \Auth::user()->agents()->create([
        'name' => $request->name,
        'slug' => $slug,
        'industry' => $request->industry,
        'founder' => $request->founder,
      ]);

      $response = [
        'msg' => 'Agent was successfully created!'
      ];

      return response()->json($response);

    }
    else
    {

      $slug = Str::slug($request->name);
      \Auth::user()->agents()->create([
        'name' => $request->name,
        'slug' => $slug,
        'industry' => $request->industry,
        'founder' => $request->founder,
      ]);

      return redirect('agents')->with('success', 'Agent' . ucwords($request->name) . ' has been successfully created!!' );

    }
  }

  /**
   * Display the specified resource.
   *
   * @param Agent $agent
   * @return Response
   */
  public function show(Agent $agent)
  {

    $deletedAgents = \Auth::user()->agents()->onlyTrashed()->get();
    $employees = $agent->employees()->orderby('created_at')->get();

    return view('pages.agents.show', compact('agent', 'currenttime', 'deletedAgents', 'employees', 'today'));

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param Agent $agent
   * @param Request $request
   * @return Response
   */
  public function edit(Agent $agent, Request $request)
  {

    if ($request->ajax())
    {

      $response = [
        'id' => $agent->id,
        'name' => $agent->name,
        'agentslug' => $agent->slug,
        'industry' => $agent->industry,
        'founder' => $agent->founder,
      ];

      return response()->json($response);

    }
    else
    {

      $agents = \Auth::user()->agents()->orderby('created_at')->get();

      return view('pages.agents.home', compact('agents', 'currenttime', 'today', 'user'));

    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Agent $agent
   * @param AgentRequest $request
   * @return Response
   */
  public function update(Agent $agent, AgentRequest $request)
  {
    
    if ($request->ajax())
    {

      $slug = Str::slug($request->name);
      $agent->update([
        'name' => $request->name,
        'slug' => $slug,
        'industry' => $request->industry,
        'founder' => $request->founder,
      ]);

      $response = [
        'msg' => 'Agent was successfully updated!!'
      ];

      return response()->json($response);

    }
    else
    {

      $slug = Str::slug($request->name);
      $agent->update([
        'name' => $request->name,
        'slug' => $slug,
        'industry' => $request->industry,
        'founder' => $request->founder,
      ]);

      return redirect('agents')->with('success', 'Agent' . ucwords($request->name) . ' has been successfully updated!!' );

    }
  }

  /**
   * Hide the specified resource from view(soft delete).
   *
   * @param Agent $agent
   * @return Response
   */
  public function hide(Agent $agent)
  {

    $agent->delete();

    return redirect('agents')->with('success', 'Agent ' . $agent->name . ' was sent to trash!!');

  }

  /**
   * Restore the specified resource from the bin.
   *
   * @param Agent $agent
   * @return Response
   */
  public function restore(Agent $agent)
  {

    $agent->restore();

    return redirect('agents/trashed')->with('success', 'Agent ' . $agent->name . ' was restored!!');

  }

  /**
   * Permanently deletes the specified resource from the table.
   *
   * @param Agent $agent
   * @return Response
   */
  public function delete(Agent $agent)
  {

    $agent->forceDelete();

    return redirect('agents/trashed')->with('success', $agent->name . ' was deleted!!');

  }

  /**
   * Shows the specified resource from storage.
   *
   * @return Response
   */
  public function trashed()
  {

    $agents = \Auth::user()->agents()->orderby('created_at')->get();
    $deletedAgents = \Auth::user()->agents()->onlyTrashed()->get();

    return view('pages.agents.trashed', compact('agents', 'currenttime', 'deletedAgents', 'today', 'user'));

  }

  /**
   * Shows the specified resource from storage.
   *
   * @return Response
   */
  public function restoreAll()
  {

    \Auth::user()->agents()->onlyTrashed()->restore();

    return redirect('agents')->with('success', 'All agents restored!!');

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
