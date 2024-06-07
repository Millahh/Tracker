<?php 
$progress=0;
$file=0;
if (is_null($task->task_progress)) {
    $progress=0;
} else {
    foreach ($task->task_progress as $boolean) {
        $boolean == "true" ? $progress+=1 : $progress;
    }
}
is_null($task->file) ? $file=0 : $file=1;
$progress = ($progress+$file)/(count($task->task_checkpoints)+1)*100;
?>

<div class="card p-5 mx-5 border rounded-lg shadow-md">
    <p class="font-semibold text-xs text-gray-700 text-center">{{(int)$progress}}%</p>
    <div class="progress-bar w-full bg-gray-200 rounded-full h-4 mb-4 dark:bg-gray-300">
        @if ($progress == 100)
            <div class="bg-[#A3FF94] h-4 rounded-full " style="width:{{$progress}}%"></div>
        @else
            <div class="bg-[#889BFF] h-4 rounded-full " style="width:{{$progress}}%"></div>
        @endif
    </div>
    <div class="text-[#3E5457] rounded-lg border-[#B9D6DA] border-2 p-3">
        <p class="font-bold text-lg">{{$task->task_name}}</p>
        <p class="text-sm">{{$task->task_desc}}</p>
        <form action="{{ route('update-progress', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="checklists px-4">
                <?php $count=-1 ?>
                @foreach ($task->task_checkpoints as $checkpoint)
                    <?php $count+=1 ?>
                    <div class="flex mb-2 text-sm">
                        @if (is_null($task->task_progress))
                            <input checked id="default-checkbox" type="checkbox" value="false" name="task_progress[{{$count}}]" class="hidden">
                            <input id="default-checkbox" type="checkbox" value="true" name="task_progress[{{$count}}]" class="w-5 h-5 bg-gray-100 border-[#77AFB7] border-2 rounded cursor-pointer checked:bg-[#77AFB7] checked:hover:bg-[#77AFB7]" @disabled(Auth::user()->role === "employer")>
                        @else
                            @if ($task->task_progress[$count]=="true")
                                <input checked id="checked-checkbox" type="checkbox" value=false name="task_progress[{{$count}}]" class="hidden"/>
                                <input checked id="checked-checkbox" type="checkbox" value=true name="task_progress[{{$count}}]" class="w-5 h-5 bg-gray-100 border-[#77AFB7] border-2 rounded cursor-pointer checked:bg-[#77AFB7] checked:hover:bg-[#77AFB7]" @disabled(Auth::user()->role === "employer")/>
                            @else
                                <input checked id="checked-checkbox" type="checkbox" value=false name="task_progress[{{$count}}]" class="hidden"/>
                                <input id="default-checkbox" type="checkbox" value=true name="task_progress[{{$count}}]" class="w-5 h-5 bg-gray-100 border-[#77AFB7] border-2 rounded cursor-pointer checked:bg-[#77AFB7] checked:hover:bg-[#77AFB7]" @disabled(Auth::user()->role === "employer")/>
                            @endif
                        @endif
                        <p class="px-2">{{$checkpoint}}</p>
                    </div>
                @endforeach
            </div>
            @if (Auth::user()->role === "employee")
            <button type="submit">save progress</button>
        </form>
                @if (is_null($task->file))
                    <x-submit-button :task=$task/>
                @else
                    <x-uploaded-button :task=$task/>
                @endif
            @else
                @if (is_null($task->file))
                    <p class="mt-2 text-xs bg-slate-300 text-center"> <i class="fa-regular fa-file"></i> Attachment hasn't uploaded yet</p>
                @else
                    <x-download-button :task=$task/>
                @endif
                <x-edit-delete-buttons :task=$task/>
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