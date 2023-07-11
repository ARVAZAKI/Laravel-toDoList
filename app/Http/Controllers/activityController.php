<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use Illuminate\Http\Request;

class activityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activity = Activity::latest()->paginate(5);
        return view('activity', compact('activity'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Activity::create([
            'activity' => $request->activity
        ]);
        return redirect()->back();
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $activity = Activity::findOrFail($id);
        $activity->update([
            'activity' => $request->activity
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
    public function delete($id){
        $activity = Activity::findOrFail($id);
        $activity->delete();
        return redirect()->back();
    }
}
