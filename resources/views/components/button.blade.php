<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#004e64] border
    border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#003749]
    focus:bg-[#003749] active:bg-[#002530] focus:outline-none focus:ring-2 focus:ring-[#004e64] focus:ring-offset-2
    transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
