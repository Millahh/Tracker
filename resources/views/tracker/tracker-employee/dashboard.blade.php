<x-app-layout class="">
    <div class="dashboard grid-rows-3 grid-flow-col gap-4 min-h-fit max-h-screen py-5 px-10">
        <div class="part-1 bg-card bg-cover rounded-xl px-7 py-6">
            <p class="text-[#496569] text-xl font-bold"> 👋 Hi, {{$name}} </p>
            <hr class="my-1">
            <p class="italic text-white text-base font-light"> {{$random_quote}} </p>
            <p class="text-white text-sm font-light text-right">
                <i class="fa-solid fa-calendar fa-sm mr-1"></i>
                {{date("d/m/Y")}}
            </p>
        </div>
        <div class="part-2 row-span-2 rounded-xl border bg-[#F4F9FA] p-7 overflow-y-auto">
            <p class="text-[#3E5457] text-xl font-bold pb-3"> 🕐 Upcoming Tasks</p>
            <div class="border-2 p-3 rounded-xl">
                <div class="upcoming-info grid grid-cols-3 gap-4">
                    <p class="col-span-2 font-bold text-lg pl-2">{{$tasks[0]->task_name}}</p>
                    <p class="bg-[#FFDADA] rounded-2xl text-center text-red-400 text-sm self-center p-1">Due {{$tasks[0]->task_due}}</p>
                </div>
                <hr class="my-2">
                <div class="text-[#3E5457] px-4">
                    @foreach ( $tasks[0]->task_checkpoints as $checkpoint )
                        <li>{{$checkpoint}}</li>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="part-3 row-span-3 border-2 rounded-xl p-5">
            <p class="text-[#3E5457] text-xl font-bold pb-1">📌 My Tasks</p>
            @forelse ($tasks->take(2) as $task)
                <hr class="my-4">
                <x-task-preview :task=$task/>
            @empty
                <p>You haven't been assigned a task yet.</p>
            @endforelse
            <a class="underline block text-right pt-2 hover:cursor-pointer hover:text-sky-600" href="{{ route('my-tasks') }}"> see more...</a>
        </div>
    </div>
</x-app-layout>
