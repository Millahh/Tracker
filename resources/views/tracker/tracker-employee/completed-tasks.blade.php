<x-app-layout>
    <div class="px-5 py-3 min-h-fit max-h-screen">
        <x-page-title>Completed</x-page-title>
        <div class="tasks flex min-w-screen pb-4 min-h-fit max-h-screen">
            @forelse ($tasks as $task)
                <x-task-card :task=$task/>
            @empty
                <p class="text-2xl font-sans font-medium m-auto">You haven't been completed a task yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
