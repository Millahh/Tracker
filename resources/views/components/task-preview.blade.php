<div class="bg-[#F4F9FA] p-4 rounded-xl">
    <p class="col-span-2 font-bold text-lg pl-2">{{$task->task_name}}</p>
    <hr class="my-2">
    <p class="text-[#3E5457] px-2 mb-2">{{{Str::words($task->task_desc, 25)}}}</p>
    <p class="bg-[#D7E2E3] inline rounded-2xl text-center text-gray-500 text-sm self-center py-1 px-5">{{count($task->task_checkpoints)}} Sub-tasks</p>
</div>