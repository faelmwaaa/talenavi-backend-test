<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TodoExport implements FromCollection, WithHeadings
{
    protected $todos;

    public function __construct($todos)
    {
        $this->todos = $todos;
    }

    public function collection()
    {
        // 1. Map the data rows
        $data = $this->todos->map(function ($todo) {
            return [
                'title' => $todo->title,
                'assignee' => $todo->assignee,
                'due_date' => $todo->due_date,
                'time_tracked' => $todo->time_tracked,
                'status' => $todo->status,
                'priority' => $todo->priority,
            ];
        });

        // 2. Add the Summary Row at the bottom
        $totalTodos = $this->todos->count();
        $totalTime = $this->todos->sum('time_tracked');

        $data->push([
            'title' => 'TOTAL SUMMARY',
            'assignee' => '',
            'due_date' => 'Total Todos: ' . $totalTodos,
            'time_tracked' => 'Total Time: ' . $totalTime,
            'status' => '',
            'priority' => ''
        ]);

        return $data;
    }

    public function headings(): array
    {
        return ['Title', 'Assignee', 'Due Date', 'Time Tracked', 'Status', 'Priority'];
    }
}