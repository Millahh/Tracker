@include('tracker.tracker-employer.task-form', ['task'=>$tasks])
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<x-app-layout>
    <x-add-button/>
    <div class="px-5 pb-2 pt-4 min-h-screen">
        <x-page-title>Tasks</x-page-title>
        <div class="tasks flex min-w-screen pb-4">
            @forelse ($tasks as $task)
                <x-task-card :task=$task/>
            @empty
                <div class="text-center self-center">
                    <img src="{{url('/no-task.png')}}" alt="Image" class=" w-1/3 m-auto"/>
                    <p class="text-xl text-[#3E5457]">You haven't created a task yet.</p>
                </div>
            @endforelse
        </div>
        @session('error')
            <x-alert-error-session/>
        @endsession
    </div>
</x-app-layout>
