<?php

namespace App\Http\Controllers;

use App\Models\MetricHistoryRun;
use App\Models\Strategy;
use Illuminate\Http\Request;

class MetricHistoryRunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $runs = MetricHistoryRun::all();
        return view('runs', compact('runs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $strategies = Strategy::all();
        return view('runCreate', compact('strategies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->ajax()) {
            $run = MetricHistoryRun::create([
                'strategy_id' => $request->strategy_id,
                'url' => $request->url,
                'status' => 'pending',
            ]);
            return response()->json($run);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MetricHistoryRun $metricHistoryRun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MetricHistoryRun $metricHistoryRun)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MetricHistoryRun $metricHistoryRun)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MetricHistoryRun $metricHistoryRun)
    {
        //
    }
}
