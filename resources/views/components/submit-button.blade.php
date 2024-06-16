<form action="{{ route('update-attachment', $task->id)}}" method="post" id="form-{{$task->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="file" id="files-{{$task->id}}" name="file" class="hidden cursor-pointer"/>
    <div class="bg-[#B9D6DA] w-full text-sm py-3 rounded-lg mt-4 hover:bg-[#8fd2db] active:bg-[#8fd2db] focus:bg-[#8fd2db] cursor-pointer text-center" title="PDF/IMAGE ONLY">
        <i class="fa-regular fa-file" title="PDF/IMAGE ONLY"></i>
        <label for="files-{{$task->id}}" class="cursor-pointer" title="PDF/IMAGE ONLY">Resources or Attatchment</label>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $("#files-{{$task->id}}").change(function(){
        $("#form-{{$task->id}}").submit();
    });
    });
</script>