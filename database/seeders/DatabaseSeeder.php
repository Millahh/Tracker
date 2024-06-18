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
        'task_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.',
        'task_checkpoints' => json_encode(['Task division', 'Check progress']),
        'task_due' => (Carbon::parse('2024-07-01'))->format('d/m/Y'),
        'task_assignments' => json_encode(["1|true", "2|false", "3|true"]),
    ],
    [
        'user_id' => 4,
        'task_name' => 'Backend Web',
        'task_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
        'task_checkpoints' => json_encode(['Monthly meeting', 'Task division', 'Check progress']),
        'task_due' => (Carbon::parse('2024-07-01'))->format('d/m/Y'),
        'task_assignments' => json_encode(["1|true", "2|false", "3|true"]),
    ]]);

    DB::table('quotes')->insert([[
        'quote' => "Success is not final, failure is not fatal: It is the courage to continue that counts. — Winston Churchill"
    ],
    [
        'quote' => "The only way to do great work is to love what you do. Keep pushing forward. — Steve Jobs"
    ],
    [
        'quote' => "The best way to predict the future is to invent it and take control of your destiny. — Alan Kay"
    ],
    [
        'quote' => "Believe you can and you're halfway there. Your mindset determines your progress and success. — Theodore Roosevelt"
    ],
    [
        'quote' => "The only limit to our realization of tomorrow is our doubts of today. Believe in yourself. — Franklin D. Roosevelt"
    ],
    [
        'quote' => "Do not wait to strike till the iron is hot; but make it hot by striking. — William Butler Yeats"
    ],
    [
        'quote' => "It does not matter how slowly you go as long as you do not stop moving forward. — Confucius"
    ],
    [
        'quote' => "Your time is limited, don't waste it living someone else's life. Follow your own passion and dreams. — Steve Jobs"
    ],
    [
        'quote' => "The only person you are destined to become is the person you decide to be. Take action now. — Ralph Waldo Emerson"
    ],
    [
        'quote' => "Act as if what you do makes a difference. It does. Your actions can inspire others. — William James"
    ],
    [
        'quote' => "Success usually comes to those who are too busy to be looking for it. Keep working hard. — Henry David Thoreau"
    ],
    [
        'quote' => "What you get by achieving your goals is not as important as what you become by achieving them. — Zig Ziglar"
    ],
    [
        'quote' => "Don't watch the clock; do what it does. Keep going and stay consistent in your efforts. — Sam Levenson"
    ],
    [
        'quote' => "The future belongs to those who believe in the beauty of their dreams. Keep dreaming and believing. — Eleanor Roosevelt"
    ],
    [
        'quote' => "It always seems impossible until it's done. Every great achievement starts with the decision to try. — Nelson Mandela"
    ],
    [
        'quote' => "Opportunities don't happen. You create them by being persistent and proactive in your pursuits. — Chris Grosser"
    ],
    [
        'quote' => "The only way to achieve the impossible is to believe it is possible. Have faith in yourself. — Charles Kingsleigh"
    ],
    [
        'quote' => "Start where you are. Use what you have. Do what you can. Begin your journey today. — Arthur Ashe"
    ],
    [
        'quote' => "Don't be pushed around by the fears in your mind. Be led by the dreams in your heart. — Roy T. Bennett"
    ],
    [
        'quote' => "The best time to plant a tree was 20 years ago. The second best time is now. Act immediately. — Chinese Proverb"
    ],
    [
        'quote' => "You are never too old to set another goal or to dream a new dream. Embrace new beginnings. — C.S. Lewis"
    ],
    [
        'quote' => "Keep your face always toward the sunshine—and shadows will fall behind you. Stay positive and hopeful. — Walt Whitman"
    ],
    [
        'quote' => "The only place where success comes before work is in the dictionary. Hard work leads to success. — Vidal Sassoon"
    ],
    [
        'quote' => "If you want to lift yourself up, lift up someone else. Helping others can elevate you too. — Booker T. Washington"
    ],
    [
        'quote' => "Dream big and dare to fail. Courageous actions often lead to the most rewarding experiences. — Norman Vaughan"
    ],
    [
        'quote' => "Your limitation—it's only your imagination. Break through mental barriers and believe in infinite possibilities. — Anonymous"
    ],
    [
        'quote' => "Success is walking from failure to failure with no loss of enthusiasm. Persistence pays off in the end. — Winston Churchill"
    ],
    [
        'quote' => "The harder the conflict, the more glorious the triumph. Overcoming challenges makes victory sweeter. — Thomas Paine"
    ],
    [
        'quote' => "Great things are done by a series of small things brought together. Consistent effort leads to big results. — Vincent Van Gogh"
    ],
    [
        'quote' => "It does not matter how slowly you go as long as you do not stop. Keep progressing steadily. — Confucius"
    ],
    [
        'quote' => "Perseverance is not a long race; it is many short races one after the other. Keep pushing forward. — Walter Elliot"
    ]
]);}
}
