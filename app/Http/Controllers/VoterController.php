<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voter;
use App\User;

class VoterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voters = Voter::orderBy('name', 'asc')->get();
        return view('sites.voter.index', compact('voters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.voter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $user = User::create([
            'name' => $request->name,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        Voter::create([
            'unique' => $request->unique,
            'name' => $request->name,
            'class' => $request->class,
            'level' => $request->level,
            'status' => $request->status,
        ]);
        //return
        return redirect()->back()->with('msg', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $voter_id)
    {
        $data['voter'] = Voter::where('id', $voter_id)->with(['user'])->first();

        return view('sites.voter.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $voter_id)
    {
        $voter = Voter::where('id', $voter_id);

        $voter->update([
            'unique' => $request->unique,
            'name' => $request->name,
            'class' => $request->class,
            'level' => $request->level,
            'status' => $request->status,
        ]);
        if ($request->name || $request->name != $voter->with(['user'])->first()->name) {
            User::find($voter->first()->user_id)->update(['name' => $request->name]);
        }
        return redirect()->back()->with('msg', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
