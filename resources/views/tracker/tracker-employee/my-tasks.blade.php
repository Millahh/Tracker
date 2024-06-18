<x-app-layout>
    <div class="px-5 pb-2 pt-4 min-h-screen">
        <x-page-title>My Tasks</x-page-title>
        <div class="tasks flex pb-4 min-h-fit max-h-screen">
            @forelse ($tasks as $task)
                <x-task-card :task=$task/>
            @empty
                <p class="text-2xl font-sans font-medium m-auto text-[#3E5457]">You haven't been assigned a task yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
