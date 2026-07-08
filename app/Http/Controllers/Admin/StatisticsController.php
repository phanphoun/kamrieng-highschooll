<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        $stats = Statistic::orderBy('sort_order')->get();

        return view('admin.statistics.index', compact('stats'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'statistics' => 'required|array',
            'statistics.*.id' => 'required|exists:statistics,id',
            'statistics.*.label_en' => 'required|string|max:255',
            'statistics.*.label_kh' => 'nullable|string|max:255',
            'statistics.*.value' => 'required|string|max:50',
            'statistics.*.is_active' => 'boolean',
        ]);

        foreach ($validated['statistics'] as $data) {
            Statistic::where('id', $data['id'])->update([
                'label_en' => $data['label_en'],
                'label_kh' => $data['label_kh'] ?? null,
                'value' => $data['value'],
                'is_active' => $data['is_active'] ?? true,
            ]);
        }

        return redirect()->route('admin.statistics.index')
            ->with('success', 'Statistics updated successfully.');
    }
}
