<x-app-layout>
    <div class="p-5 min-h-screen">
        <div class="tasks flex min-w-screen pb-5">
            @forelse ($tasks as $task)
                <x-task-card :task=$task/>
            @empty
                <p class="text-2xl font-sans font-medium m-auto">You haven't been assigned a task yet.</p>
            @endforelse
        </div>
    </div>
    
</x-app-layout>
