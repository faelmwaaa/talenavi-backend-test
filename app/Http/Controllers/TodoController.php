<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Exports\TodoExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rule;

class TodoController extends Controller
{
    // 1. API Create Todo List
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'assignee' => 'nullable|string',
            'due_date' => 'required|date|after_or_equal:today', // Req: cannot be in past
            'time_tracked' => 'numeric',
            'status' => ['nullable', Rule::in(['pending', 'open', 'in_progress', 'completed'])],
            'priority' => ['required', Rule::in(['low', 'medium', 'high'])],
        ]);

        // Default to pending if not provided
        if (!isset($validated['status'])) {
            $validated['status'] = 'pending';
        }

        $todo = Todo::create($validated);

        return response()->json([
            'message' => 'Todo created successfully',
            'data' => $todo
        ], 201);
    }

    // 2. API Get Todo List & Generate Excel
    public function export(Request $request)
    {
        $query = Todo::query();

        // Filter: Title (Partial match)
        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        // Filter: Assignee (Comma separated)
        if ($request->has('assignee')) {
            $assignees = explode(',', $request->assignee);
            $query->whereIn('assignee', $assignees);
        }

        // Filter: Due Date Range (start & end)
        if ($request->has('start') && $request->has('end')) {
            $query->whereBetween('due_date', [$request->start, $request->end]);
        }

        // Filter: Time Tracked Range (min & max)
        if ($request->has('min') && $request->has('max')) {
            $query->whereBetween('time_tracked', [$request->min, $request->max]);
        }

        // Filter: Status (Comma separated)
        if ($request->has('status')) {
            $statuses = explode(',', $request->status);
            $query->whereIn('status', $statuses);
        }

        // Filter: Priority (Comma separated)
        if ($request->has('priority')) {
            $priorities = explode(',', $request->priority);
            $query->whereIn('priority', $priorities);
        }

        // Download Excel
        return Excel::download(new TodoExport($query->get()), 'todos_report.xlsx');
    }
}