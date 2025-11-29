<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $todos = [
        ['title' => 'Fix Login Bug', 'assignee' => 'Rafael', 'due_date' => '2025-12-01', 'priority' => 'high', 'status' => 'pending', 'time_tracked' => 5],
        ['title' => 'Update Documentation', 'assignee' => 'Sarah', 'due_date' => '2025-12-02', 'priority' => 'medium', 'status' => 'completed', 'time_tracked' => 2],
        ['title' => 'Design Database', 'assignee' => 'Rafael', 'due_date' => '2025-12-03', 'priority' => 'high', 'status' => 'in_progress', 'time_tracked' => 8],
        ['title' => 'Meeting with Client', 'assignee' => 'John', 'due_date' => '2025-12-04', 'priority' => 'low', 'status' => 'open', 'time_tracked' => 1],
        ['title' => 'Fix CSS Issues', 'assignee' => 'Sarah', 'due_date' => '2025-12-05', 'priority' => 'medium', 'status' => 'pending', 'time_tracked' => 3],
        ['title' => 'Optimize Queries', 'assignee' => 'Rafael', 'due_date' => '2025-12-06', 'priority' => 'high', 'status' => 'pending', 'time_tracked' => 6],
        ['title' => 'Setup Server', 'assignee' => 'Admin', 'due_date' => '2025-12-07', 'priority' => 'high', 'status' => 'completed', 'time_tracked' => 10],
        ['title' => 'Write Unit Tests', 'assignee' => 'Rafael', 'due_date' => '2025-12-08', 'priority' => 'medium', 'status' => 'in_progress', 'time_tracked' => 4],
        ['title' => 'Clean up Code', 'assignee' => 'John', 'due_date' => '2025-12-09', 'priority' => 'low', 'status' => 'completed', 'time_tracked' => 1],
        ['title' => 'Prepare Release', 'assignee' => 'Admin', 'due_date' => '2025-12-10', 'priority' => 'high', 'status' => 'pending', 'time_tracked' => 2],
    ];

    foreach ($todos as $todo) {
        \App\Models\Todo::create($todo);
    }
}
}