<div class="card p-5 mx-5 border rounded-lg shadow-md">
    <p class="font-semibold text-xs text-gray-700 text-center">{{$task->task_percentage}}%</p>
    <div class="progress-bar w-full bg-gray-200 rounded-full h-4 mb-4 dark:bg-gray-300">
        @if ($task->task_percentage == 100)
            <div class="bg-[#A3FF94] h-4 rounded-full " style="width:100%"></div>
        @else
            <div class="bg-[#889BFF] h-4 rounded-full " style="width:{{$task->task_percentage}}%"></div>
        @endif
    </div>
    <div class="text-[#3E5457] rounded-lg border-[#B9D6DA] border-2 p-3">
        <p class="font-bold text-lg">{{$task->task_name}}</p>
        <p class="text-sm">{{$task->task_desc}}</p>
        <form action="{{ route('update-progress', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="checklists pt-1">
                <?php $count=-1 ?>
                @foreach ($task->task_checkpoints as $checkpoint)
                    <?php $count+=1 ?>
                    <div class="flex mb-2 text-sm">
                        @if (empty($task->task_progress))
                            <input checked id="default-checkbox" type="checkbox" value=false name="task_progress[{{$count}}]" class="hidden">
                            <input id="default-checkbox" type="checkbox" value=true name="task_progress[{{$count}}]" class="w-5 h-5 bg-gray-100 border-[#77AFB7] border-2 rounded cursor-pointer checked:bg-[#77AFB7] checked:hover:bg-[#77AFB7]" @disabled(Auth::user()->role === "employer")>
                        @else
                            @if (empty($task->task_progress[$count]) || $task->task_progress[$count]=="false")
                                <input checked id="checked-checkbox" type="checkbox" value=false name="task_progress[{{$count}}]" class="hidden"/>
                                <input id="default-checkbox" type="checkbox" value=true name="task_progress[{{$count}}]" class="w-5 h-5 bg-gray-100 border-[#77AFB7] border-2 rounded cursor-pointer checked:bg-[#77AFB7] checked:hover:bg-[#77AFB7]" @disabled(Auth::user()->role === "employer")/>
                            @else
                                <input checked id="checked-checkbox" type="checkbox" value=false name="task_progress[{{$count}}]" class="hidden"/>
                                <input checked id="checked-checkbox" type="checkbox" value=true name="task_progress[{{$count}}]" class="w-5 h-5 bg-gray-100 border-[#77AFB7] border-2 rounded cursor-pointer checked:bg-[#77AFB7] checked:hover:bg-[#77AFB7]" @disabled(Auth::user()->role === "employer")/>
                            @endif
                        @endif
                        <p class="px-2">{{$checkpoint}}</p>
                    </div>
                @endforeach
            </div>
            @if (Auth::user()->role === "employee")
                <x-save-progress-button/>
            @endif
        </form>
            @if (Auth::user()->role === "employee")
                @if (is_null($task->file))
                    <x-submit-button :task=$task/>
                @else
                    <x-uploaded-button :task=$task/>
                @endif
            @else
                @if (is_null($task->file))
                    <p class="mt-2 text-xs bg-slate-300 text-center"> <i class="fa-regular fa-file"></i> Attachment hasn't uploaded yet</p>
                    <div class="text-right">
                        <x-edit-delete-buttons :task=$task/>
                    </div>
                @elseif ($task->task_percentage == 100)
                    <?php $names="" ?>
                    <div class="bg-[#A3FF94] px-1">
                        <p class="mt-2 text-xs text-center inline">Completed by:</p>
                        @foreach ($task->task_assignments as $task_assignments)
                            @foreach ($task->tasks_id as $tasks_id)
                                @if (substr($task_assignments, 2)=="true" && array_keys($tasks_id)[0] == (int)$task_assignments[0])
                                    <p class="hidden">{{$names .=" ".array_values($tasks_id)[0] . ","}}</p>
                                @endif
                            @endforeach
                        @endforeach
                        <p class="text-xs text-center inline">{{substr($names, 0, -1)}}.</p>
                    </div>
                    <div class="flex justify-between h-fit">
                        <x-download-button :task=$task/>
                        <x-edit-delete-buttons :task=$task/>
                    </div>
                @else
                    <div class="flex justify-between h-fit -mt-5">
                        <x-download-button :task=$task/>
                        <x-edit-delete-buttons :task=$task/>
                    </div>
                @endif
            @endif
    </div>
    <div class="text-sm text-right text-[#B5B5B5] mt-1">
        <i class="fa-solid fa-calendar fa-sm mr-1"></i>
        {{$task->task_due}}
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>

</script>