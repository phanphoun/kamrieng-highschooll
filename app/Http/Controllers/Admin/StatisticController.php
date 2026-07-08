<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use App\Http\Requests\Admin\StoreStatisticRequest;
use App\Http\Requests\Admin\UpdateStatisticRequest;

class StatisticController extends Controller
{
    public function index()
    {
        $statistics = Statistic::orderBy('sort_order')->paginate(20);
        return view('admin.statistics.index', compact('statistics'));
    }

    public function create()
    {
        return view('admin.statistics.create');
    }

    public function store(StoreStatisticRequest $request)
    {
        $validated = $request->validated();

        Statistic::create($validated);

        return redirect()->route('admin.statistics.index')->with('success', 'Statistic created successfully.');
    }

    public function edit(Statistic $statistic)
    {
        return view('admin.statistics.edit', compact('statistic'));
    }

    public function update(UpdateStatisticRequest $request, Statistic $statistic)
    {
        $validated = $request->validated();

        $statistic->update($validated);

        return redirect()->route('admin.statistics.index')->with('success', 'Statistic updated successfully.');
    }

    public function destroy(Statistic $statistic)
    {
        $statistic->delete();
        return redirect()->route('admin.statistics.index')->with('success', 'Statistic deleted successfully.');
    }
}
