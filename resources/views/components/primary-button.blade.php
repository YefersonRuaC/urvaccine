<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg']) }}>
    {{ $slot }}
</button>
