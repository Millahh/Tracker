<div id="alert-error" class="flex items-center p-4 mb-4 text-sm text-[#ffffff] rounded-lg bg-[#ff9494] shadow-lg fixed top-5 right-5 z-50 justify-center w-fit" role="alert">
    <div>
      <span class="font-medium pr-1">{{ session('error') }}</span>
    </div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-300 inline-flex items-center justify-center h-8 w-8 " data-dismiss-target="#alert-error" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>