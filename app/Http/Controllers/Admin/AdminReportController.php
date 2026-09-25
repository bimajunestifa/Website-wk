<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationReport;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function index()
    {
        $reports = EducationReport::orderBy('order', 'asc')->get();
        return view('admin.reports.index', compact('reports'));
    }

    public function update(Request $request, $id = null)
    {
        // Single report update (from individual card form)
        if ($id || $request->has('score')) {
            $reportId = $id ?: $request->input('id');
            $report = EducationReport::findOrFail($reportId);

            $validated = $request->validate([
                'indicator_name' => 'nullable|string|max:255',
                'score' => 'required|numeric|min:0|max:100',
                'status' => 'nullable|string|max:50',
                'year' => 'nullable|string|max:50',
                'notes' => 'nullable|string',
            ]);

            $report->update([
                'indicator_name' => $validated['indicator_name'] ?? $report->indicator_name,
                'score' => $validated['score'],
                'percentage' => round($validated['score']),
                'status' => $validated['status'] ?? $report->status,
                'year' => $validated['year'] ?? $report->year,
                'notes' => $validated['notes'] ?? $report->notes,
            ]);

            return back()->with('success', 'Indikator "' . $report->indicator_name . '" berhasil diperbarui!');
        }

        // Batch update if submitted as array
        if ($request->has('reports')) {
            $validated = $request->validate([
                'reports' => 'required|array',
                'reports.*.id' => 'required|exists:education_reports,id',
                'reports.*.score' => 'nullable|numeric|min:0|max:100',
                'reports.*.percentage' => 'nullable|numeric|min:0|max:100',
                'reports.*.status' => 'nullable|string|max:50',
                'reports.*.notes' => 'nullable|string',
            ]);

            foreach ($validated['reports'] as $reportData) {
                $score = $reportData['score'] ?? $reportData['percentage'] ?? 0;
                EducationReport::where('id', $reportData['id'])->update([
                    'score' => $score,
                    'percentage' => round($score),
                    'status' => $reportData['status'] ?? 'Sangat Baik',
                    'notes' => $reportData['notes'] ?? null,
                ]);
            }

            return back()->with('success', 'Semua indikator rapor pendidikan berhasil diperbarui!');
        }

        return back()->with('error', 'Tidak ada data untuk diperbarui.');
    }
}

