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
        {{-- {{$task->file}} --}}
        @if (Auth::user()->role === "employee")
            @if (is_null($task->file))
                <x-submit-button :task=$task/>
            @else
                <x-uploaded-button/>
            @endif
        @else
            @if (is_null($task->file))
                <p class="mt-2 text-xs bg-slate-300 text-center"> <i class="fa-regular fa-file"></i> Attachment hasn't uploaded yet</p>
            @else
                <x-download-button/>
            @endif
            <x-edit-delete-buttons :task=$task/>
        @endif
    </div>
    <div class="text-sm text-right text-[#B5B5B5] mt-1">
        <i class="fa-solid fa-calendar fa-sm mr-1"></i>
        {{$task->task_due}}
    </div>
</div>