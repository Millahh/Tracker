<x-app-layout>
    <div class="px-5 pb-2 pt-4 min-h-screen">
        <x-page-title>My Tasks</x-page-title>
        <div class="tasks flex pb-4 min-h-fit max-h-screen">
            @forelse ($tasks as $task)
                <x-task-card :task=$task/>
            @empty
                <div class="text-center self-center">
                    <img src="{{url('/no-task.png')}}" alt="Image" class=" w-1/3 m-auto"/>
                    <p class="text-xl text-[#3E5457]">You haven't been assigned a task yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
