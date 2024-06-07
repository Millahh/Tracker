<form action="{{ route('update-attachment', $task->id)}}" method="post" id="form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="file" id="files" name="file" class="hidden cursor-pointer"/>
    <div class="bg-[#B9D6DA] w-full text-xs py-3 rounded-lg mt-2 hover:bg-[#8fd2db] active:bg-[#8fd2db] focus:bg-[#8fd2db] cursor-pointer" title="PDF/IMAGE ONLY">
        <i class="fa-regular fa-file" title="PDF/IMAGE ONLY"></i>
        <label for="files" class="cursor-pointer" title="PDF/IMAGE ONLY">Resources and/or Attatchment</label>
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