<x-app-layout>
    <div class="dashboard grid grid-rows-3 grid-cols-2 grid-flow-col gap-4 min-h-screen py-5 px-10">
        <div class="bg-card bg-cover rounded-xl px-7 py-6">
            <p class="text-[#496569] text-xl font-bold"> 👋 Hi, Munirotul Millah! </p>
            <hr class="my-1">
            <p class="italic text-white text-base font-light"> This is just a random quote by "Munirotul Millah" : If it meant to be, than it’ll happen. </p>
            <p class="text-white text-sm font-light text-right">Jumat, 24 Juni 2024</p>
        </div>
        <div class="row-span-2 rounded-xl border bg-[#F4F9FA] p-7">
            <p class="text-[#3E5457] text-xl font-bold pb-3"> 🕐 Upcoming Tasks</p>
            <div class="border-2 p-3 rounded-xl">
                <div class="grid grid-cols-3 gap-4">
                    <p class="col-span-2 font-bold text-lg pl-2">Input employees' data</p>
                    <p class="bg-[#FFDADA] rounded-2xl text-center text-red-400 text-sm self-center p-1">Due 31 May</p>
                </div>
                <hr class="my-2">
                <div class="tasks text-[#3E5457] px-4">
                    <li>30 new employees</li>
                    <li>re-check</li>
                    <li>meeting on sunday</li>
                    <li>30 new employees</li>
                    <li>re-check</li>
                    <li>meeting on sunday</li>
                </div>
            </div>
        </div>
        <div class="row-span-3 border-2 rounded-xl p-5">
            <p class="text-[#3E5457] text-xl font-bold pb-3">📌 My Tasks</p>
            <x-task-card/>
            <hr class="my-4">
            <x-task-card/>
            <a class="underline block text-right pt-2 hover:cursor-pointer hover:text-sky-600"> see more...</a>
        </div>
    </div>
</x-app-layout>
