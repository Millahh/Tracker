  <!-- Main modal -->
  <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-screen">
    <div class="relative p-4 w-full max-w-4xl h-full max-h-screen">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow h-full max-h-screen">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-300">
                  <h3 class="text-xl font-semibold text-[gray-900]">
                      New Task
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-400 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-200 dark:hover:text-gray-400" data-modal-hide="static-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <form action="{{ route('employer.store') }}" method="POST">
                @csrf
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-2">
                    <div class="grid grid-rows-1 grid-flow-col gap-10">
                        <!-- Task Title -->
                        <div class="col space-y-2">
                            <label for="task_name" class="block text-md text-[#3E5457] font-bold">Title</label>
                            <input type="text" id="task_name" name="task_name" maxlength="35" class="bg-gray-50 border-2 border-[#77AFB7] focus:border-[#77AFB7] text-gray-900 text-sm rounded-sm w-full p-2.5" placeholder="Title goes here.." required />
                        </div>
                        <!-- Task Due -->
                        <div class="col space-y-2 min-w-full">
                            <label for="task_due" class="block text-md text-[#3E5457] font-bold">Task Due</label>
                            <div class="data-picker relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#77AFB7" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input datepicker datepicker-autohide type="text" id="task_due" name="task_due" class="block min-w-full ps-10 p-2.5 bg-gray-50 border-2 border-[#77AFB7] focus:border-[#77AFB7] text-gray-900 text-sm rounded-sm focus:ring-transparent" placeholder="Due date">
                            </div>
                        </div>
                    </div>
                    <!-- Task Description -->
                    <label for="task_desc" class="pt-2 block text-md text-[#3E5457] font-bold">Description</label>
                    <textarea rows="" id="task_desc" name="task_desc" class="bg-gray-50 border-2 border-[#77AFB7] focus:border-[#77AFB7] text-gray-900 text-sm rounded-sm w-full p-2.5" placeholder="Description goes here.." required ></textarea>
                    
                    <div class="grid grid-rows-1 grid-flow-col gap-10">
                        <!-- Task Checkpoints -->
                        <div class="col space-y-2">
                            <div class="flex pt-2">
                                <label for="task_desc" class="block text-md text-[#3E5457] font-bold mr-2">Task Breakdown</label>
                                <button id="btn1" class="text-xs underline text-blue-500 self-center" type="button"> + Add Here</button>
                            </div>
                            <div id="checkpoints">
                                <div class="flex mb-2">
                                    <input disabled id="disabled-checkbox" type="checkbox" value="" class="w-5 h-5 bg-gray-100 border-[#77AFB7] border-2 rounded">
                                    <input type="text" name="task_checkpoints[0]" maxlength="35" class="px-2 py-0 border-transparent outline-none focus:border-transparent text-gray-900 text-sm" placeholder="Write here.." required />
                                </div>
                            </div>
                        </div>
                        <div class="col space-y-2">
                            <div>
                                <label for="task_assignments" class="pt-2 block text-md text-[#3E5457] font-bold mr-2">Task Assignment</label>
                                <p class="text-xs text-neutral-400">*Fill the checkbox to assign task</p>
                            </div>
                            <div class="overflow-auto h-3/6 w-4/5">
                                <?php $assignment_loop=-1 ?>
                                @foreach ($task[0]->tasks_id as $task)
                                    <?php $assignment_loop+=1 ?>
                                    <div class="flex mb-2 text-sm">
                                        <input checked id="default-checkbox" type="checkbox" value={{(array_keys($task)[0])}}|false name="task_assignments[{{$assignment_loop}}]" class="hidden">
                                        <input id="default-checkbox" type="checkbox" value={{(array_keys($task)[0])}}|true name="task_assignments[{{$assignment_loop}}]" class="w-5 h-5 bg-gray-100 border-[#77AFB7] border-2 rounded cursor-pointer">
                                        <p class="px-2">{{(array_values($task)[0])}}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="absolute bottom-0 right-0 p-4">
                    <button data-modal-hide="static-modal" type="submit" class="py-2 px-5 text-md font-medium text-white focus:outline-none bg-[#77AFB7] rounded-lg focus:z-10 focus:bg-[#517176] hover:bg-[#517176]">Save</button>
                </div>
              </form>
          </div>
      </div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    var i = 0;
    $(document).ready(function(){
    $("#btn1").click(function(){
        ++i;
        $("#checkpoints").append(
            `<div class="flex mb-2">
                <input disabled id="disabled-checkbox" type="checkbox" value="" class="w-5 h-5 bg-gray-100 border-[#77AFB7] border-2 rounded">
                <input type="text" name="task_checkpoints[`+i+`]" maxlength="35" class="px-2 py-0 border-transparent outline-none focus:border-transparent text-gray-900 text-sm" placeholder="Write here.." required />
            </div>`);
    });
    });
</script>