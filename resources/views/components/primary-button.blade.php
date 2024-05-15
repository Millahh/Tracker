<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline min-w-full items-center py-2 bg-[#77AFB7] border border-transparent rounded font-sans font-black text-sm text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
