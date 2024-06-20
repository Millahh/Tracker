<div class="border-2 p-3 rounded-xl">
    <div class="upcoming-info grid grid-cols-3 gap-4">
        <p class="col-span-2 font-bold text-lg pl-2">{{$task->task_name}}</p>
        <p class="bg-[#FFDADA] rounded-2xl text-center text-red-400 text-sm self-center p-1">Due {{$task->task_due}}</p>
    </div>
    <hr class="my-2">
    <div class="text-[#3E5457] px-4">
        @foreach ( $task->task_checkpoints as $checkpoint )
            <li>{{$checkpoint}}</li>
        @endforeach
    </div>
</div>