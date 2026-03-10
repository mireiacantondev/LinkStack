@props(['type' => 'text', 'name', 'placeholder' => ''])

<input 
    type="{{ $type }}" 
    name="{{ $name }}" 
    placeholder="{{ $placeholder }}" 
    class="w-full p-3 rounded-full bg-gray-100 border-none focus:ring-2 focus:ring-indigo-400 focus:outline-none transition-all duration-200"
>