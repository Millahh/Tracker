@include('tracker.tracker-employer.task-form', ['task'=>$tasks])
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<x-app-layout>
    <div class="px-5 pb-2 pt-4 min-h-screen">
        <x-page-title>Completed</x-page-title>
        <div class="tasks flex min-w-screen pb-4">
            @forelse ($tasks as $task)
                <x-task-card :task=$task/>
            @empty
                <p class="text-2xl font-sans font-medium m-auto">No task has been completed yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
