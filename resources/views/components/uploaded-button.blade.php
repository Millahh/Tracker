<form action="{{ route('update-attachment', $task->id)}}" method="post" id="form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="file" id="files" name="file" class="hidden cursor-pointer"/>
    <div class="employee-uploaded bg-[#A3FF94] w-full text-sm py-3 rounded-lg mt-4 hover:bg-[#8de080] active:bg-[#8de080] focus:bg-[#8de080] cursor-pointer text-center">
        <i class="fa-regular fa-file cursor-pointer"></i>
        <label for="files" class="cursor-pointer reupload" title={{$task->file}}>Click here to reupload</label>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger text-xs text-red-600 space-y-1 flex items-center px-2 pt-1">
            @foreach ($errors->all() as $error)
                <ul class="text-center">{{ $error }}</ul>
            @endforeach
        </div>
    @endif
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $("#files").change(function(){
        $("#form").submit();
    });
    });
</script>