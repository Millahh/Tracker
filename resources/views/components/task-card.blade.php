<div class="card p-5 mx-5 border rounded-lg shadow-md">
    <p class="font-semibold text-xs text-gray-700 text-center">59%</p>
    <div class="progress-bar w-full bg-gray-200 rounded-full h-4 mb-4 dark:bg-gray-300">
        <div class="bg-[#889BFF] h-4 rounded-full " style="width: 59%"></div>
    </div>
    <div class="text-[#3E5457] rounded-lg border-[#B9D6DA] border-2 p-3">
        <p class="font-bold text-lg">{{$task->task_name}}</p>
        <p class="text-sm">{{$task->task_desc}}</p>
        <div class="checklists px-4">
            @foreach ($task->task_checkpoints as $checkpoint)
                <li>{{$checkpoint}}</li>
            @endforeach
        </div>
        {{-- <x-submit-button/>
        <x-uploaded-button/>
        <x-download-button/> --}}
        <x-edit-delete-buttons :task=$task/>
    </div>
    <div class="text-sm text-right text-[#B5B5B5] mt-1">
        <i class="fa-solid fa-calendar fa-sm mr-1"></i>
        {{$task->task_due}}
    </div>
</div>