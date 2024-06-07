<form action="{{ route('employee.update', $task)}}" method="post" id="form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="file" id="files" name="file" class="hidden cursor-pointer"/>
    <div class="employee-uploaded bg-[#A3FF94] w-full text-xs py-3 rounded-lg mt-2 hover:bg-[#8de080] active:bg-[#8de080] focus:bg-[#8de080] hover:text-white cursor-pointer">
        <i class="fa-regular fa-file cursor-pointer"></i>
        <label for="files" class="cursor-pointer reupload" title={{$task->file}}>CLICK HERE TO REUPLOAD</label>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $("#files").change(function(){
        $("#form").submit();
    });
    });
</script>