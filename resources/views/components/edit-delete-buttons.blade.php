@include('tracker.tracker-employer.edit-form', ['ID'=>$task->id, 'task_assignments'=>$task->task_assignments])
<div class="text-right mt-4">
    <button data-modal-target="modal-edit-{{$task->id}}" data-modal-toggle="modal-edit-{{$task->id}}" class="inline-block rounded-2xl bg-[#BBEFF6] py-3 px-4 mx-1">
        <a  class="fa-solid fa-pen-to-square fa-lg" style="color: #00A5CB;"></a>
    </button>
    <form action="{{ route('employer.destroy', $task) }}" method="POST" class="inline-block mb-0">
        @csrf
        @method('DELETE')
        <button class="inline-block rounded-2xl bg-[#FFDADA] py-3 px-4 mx-1" onclick="return confirm('Are you sure you want to delete this task?')">
            <i class="fa-solid fa-trash fa-lg" style="color: #F24125;"></i>
        </button>
    </form>
</div>