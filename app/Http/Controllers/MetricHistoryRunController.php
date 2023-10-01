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
        $runs = MetricHistoryRun::with('getStrategy')->get();
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
            try{
                $run = MetricHistoryRun::create([
                    'url' => $request->url,
                    'strategy_id' => $request->strategy_id,
                    'accesibility_metric' => $request->accesibility ?? 0,
                    'pwa_metric' => $request->pwa ?? 0,
                    'performance_metric' => $request->performance ?? 0,
                    'seo_metric' => $request->seo ?? 0,
                    'best_practices_metric' => $request->best_practices ?? 0
                ]);
                return response()->json([
                    'success' => true,
                    'run' => $run
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ]);
            }
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
