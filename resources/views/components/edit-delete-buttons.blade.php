@include('tracker.tracker-employer.edit-form', ['ID'=>$task->id, 'task_assignments'=>$task->task_assignments])
<div class="mt-4">
    <button data-modal-target="modal-edit-{{$task->id}}" data-modal-toggle="modal-edit-{{$task->id}}" class="inline-block rounded-lg bg-[#BBEFF6] hover:bg-[#78d4e0] py-5 px-4" @disabled($task->task_percentage == 100)>
        <a  class="fa-solid fa-pen-to-square fa-lg"></a>
    </button>
    <form action="{{ route('employer.destroy', $task) }}" method="POST" class="inline-block mb-0">
        @csrf
        @method('DELETE')
        <button class="inline-block rounded-lg bg-[#FFDADA] hover:bg-[#f8b0b0] py-5 px-4 mx-1" onclick="return confirm('Are you sure you want to delete this task?')">
            <i class="fa-solid fa-trash fa-lg" style="color: #F24125;"></i>
        </button>
    </form>
</div>