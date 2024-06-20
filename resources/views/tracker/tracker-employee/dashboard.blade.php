<x-app-layout class="">
    <div class="dashboard grid-rows-3 grid-cols-2 grid-flow-col gap-4 min-h-fit max-h-screen py-5 px-10">
        <div class="part-1  bg-card bg-cover rounded-xl px-7 py-6">
            <p class="text-[#496569] text-xl font-bold"> 👋 Hi, {{$name}} </p>
            <hr class="my-1">
            <p class="italic text-white text-base font-light"> {{$random_quote}} </p>
            <p class="text-white text-sm font-light text-right">
                <i class="fa-solid fa-calendar fa-sm mr-1"></i>
                {{date("d/m/Y")}}
            </p>
        </div>
        <div class="part-2 row-span-2 rounded-xl border bg-[#F4F9FA] p-7">
            <p class="text-[#3E5457] text-xl font-bold pb-3"> 🕐 Upcoming Tasks</p>
            @if (empty($tasks[0]))
                <div class="text-center overflow-y-hidden">
                    <img src="{{url('/no-upcoming-task.png')}}" alt="Image" class=" w-3/6 m-auto"/>
                    <p class="text-[#3E5457]">Yeay, you don't have any upcoming tasks!</p>
                </div>
            @else
            <div class=" overflow-y-auto">
                <x-upcoming-task :task=$tasks[0]/>
            </div>
            @endif
        </div>
        <div class="part-3 row-span-3 border-2 rounded-xl px-5 py-5 box-border">
            <div class=" overflow-y-auto">
                <p class="text-[#3E5457] text-xl font-bold pb-1">📌 My Tasks</p>
            @forelse ($tasks->take(2) as $task)
                    <hr class="my-4">
                    <x-task-preview :task=$task/>
                    <a class="underline block text-right pt-2 hover:cursor-pointer hover:text-sky-600" href="{{ route('my-tasks') }}"> see more...</a>
            </div>
            @empty
                <div class="text-center self-center pt-5">
                    <img src="{{url('/no-task.png')}}" alt="Image" class="w-4/5 m-auto self-center"/>
                    <p class="text-[#3E5457]">You haven't been assigned a task yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
