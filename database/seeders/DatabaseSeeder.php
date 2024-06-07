<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
        [
            'first_name' => 'Munirotul',
            'last_name' => 'Millah',
            'NIP' => '123456789',
            'password' => Hash::make('12345678'),
            'role' => 'employee',
        ],
        [
            'first_name' => 'Muhammad',
            'last_name' => 'Daud',
            'NIP' => '123456780',
            'password' => Hash::make('12345678'),
            'role' => 'employee',
        ],
        [
            'first_name' => 'Jessica',
            'last_name' => 'Monica',
            'NIP' => '123456781',
            'password' => Hash::make('12345678'),
            'role' => 'employee',
        ],
        [
            'first_name' => 'Munirotul',
            'last_name' => 'Millah',
            'NIP' => '12345678',
            'password' => Hash::make('12345678'),
            'role' => 'employer',
        ],
    ]);

    DB::table('employees')->insert([[
        'user_id' => 1,
        'tasks_id' => json_encode([1, 2]),
    ],
    [
        'user_id' => 2,
        'tasks_id' => json_encode([1]),
    ],
    [
        'user_id' => 3,
        'tasks_id' => json_encode([1, 2]),
    ]]);

    DB::table('employers')->insert([[
        'user_id' => 4,
        'task_name' => 'Frontend Web',
        'task_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'task_checkpoints' => json_encode(['Task division', 'Check progress']),
        'task_due' => (Carbon::parse('2024-07-01'))->format('Y-m-d'),
        'task_assignments' => json_encode(["1|true", "2|false", "3|true"]),
    ],
    [
        'user_id' => 4,
        'task_name' => 'Backend Web',
        'task_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'task_checkpoints' => json_encode(['Monthly meeting', 'Task division', 'Check progress']),
        'task_due' => (Carbon::parse('2024-07-01'))->format('Y-m-d'),
        'task_assignments' => json_encode(["1|true", "2|false", "3|true"]),
    ]]);
    }
}
