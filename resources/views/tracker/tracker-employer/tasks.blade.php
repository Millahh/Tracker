@include('tracker.tracker-employer.task-form')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<x-app-layout>
    <x-add-button/>
    <div class="p-5 min-h-screen">
        <div class="tasks flex min-w-screen pb-5">
            @forelse ($tasks as $task)
                <x-task-card :task=$task/>
            @empty
                <p class="text-2xl font-sans font-medium m-auto">You haven't created a task yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
