<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Mi LinkStack') }}
            </h2>
            @if (session('success'))
                <div class="bg-green-500 text-white px-6 py-2 rounded-xl text-sm font-bold shadow-lg shadow-green-200 animate-bounce">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </x-slot>

    <div class="py-12 bg-[#F2F2F2] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="space-y-6">
                    <div class="bg-white shadow-[0_0_20px_rgba(106,110,207,0.1)] rounded-[25px] p-6 border border-gray-50">
                        <h3 class="text-md font-bold text-[#6A6ECF] mb-4 flex items-center gap-2">
                            <span class="w-1.5 h-4 bg-[#6A6ECF] rounded-full"></span>
                            Nueva Categoría
                        </h3>
                        <form action="{{ route('categories.store') }}" method="POST" class="space-y-3">
                            @csrf
                            <input type="text" name="name" required placeholder="Ej: Trabajo, Ocio..." 
                                class="w-full border-gray-100 bg-gray-50 rounded-xl focus:ring-[#6A6ECF] focus:border-[#6A6ECF]">
                            
                            <div class="flex gap-2">
                                <div class="flex items-center bg-gray-50 px-3 rounded-xl border border-gray-100">
                                    <input type="color" name="color" value="#6A6ECF" class="w-8 h-8 border-none bg-transparent cursor-pointer">
                                </div>
                                <button type="submit" class="flex-1 bg-[#6A6ECF] text-white font-bold rounded-xl hover:bg-[#585cb3] transition-all py-2">
                                    Crear
                                </button>
                            </div>
                        </form>
                        
                        <div class="mt-6 flex flex-wrap gap-2">
                            @foreach($categories as $category)
                                <div x-data="{ openDelete: false }" class="inline-block">
                                    <div @click="openDelete = true" class="cursor-pointer group relative flex items-center px-3 py-1 rounded-full text-[11px] font-bold text-white shadow-sm hover:scale-105 transition-transform" style="background-color: {{ $category->color }}">
                                        {{ $category->name }}
                                        <span class="ml-1 opacity-60 group-hover:opacity-100">&times;</span>
                                    </div>

                                    <template x-teleport="body">
                                        <div x-show="openDelete" class="fixed inset-0 z-[70] flex items-center justify-center bg-black/40 backdrop-blur-sm" x-transition>
                                            <div @click.away="openDelete = false" class="bg-white w-full max-w-sm p-8 rounded-[30px] shadow-2xl mx-4 text-center">
                                                <div class="w-16 h-16 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                                </div>
                                                <h3 class="text-xl font-bold text-gray-800 mb-2">¿Borrar categoría?</h3>
                                                <p class="text-gray-500 text-sm mb-8">Los enlaces de <b>{{ $category->name }}</b> no se borrarán, pero se quedarán sin categoría.</p>
                                                <div class="flex gap-3">
                                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="flex-1">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" class="w-full bg-red-500 text-white py-3 rounded-2xl font-bold hover:bg-red-600">Eliminar</button>
                                                    </form>
                                                    <button @click="openDelete = false" class="flex-1 bg-gray-100 text-gray-500 py-3 rounded-2xl font-bold">Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-white shadow-[0_0_20px_rgba(106,110,207,0.1)] rounded-[25px] p-6 border border-gray-50">
                        <h3 class="text-md font-bold text-[#6A6ECF] mb-4 flex items-center gap-2">
                            <span class="w-1.5 h-4 bg-[#6A6ECF] rounded-full"></span>
                            Añadir Enlace
                        </h3>
                        <form action="{{ route('links.store') }}" method="POST" class="space-y-3">
                            @csrf
                            <input type="text" name="title" required placeholder="Título" class="w-full border-gray-100 bg-gray-50 rounded-xl">
                            <input type="url" name="url" required placeholder="URL (https://...)" class="w-full border-gray-100 bg-gray-50 rounded-xl">
                            <select name="category_id" class="w-full border-gray-100 bg-gray-50 rounded-xl">
                                <option value="">Sin categoría</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="w-full bg-[#6A6ECF] text-white py-3 rounded-xl font-bold shadow-lg shadow-purple-100 hover:bg-[#585cb3]">
                                Guardar Marcador
                            </button>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="bg-white shadow-[0_0_20px_rgba(106,110,207,0.1)] rounded-[25px] p-8 min-h-[600px] border border-gray-50">
                        <div class="flex justify-between items-center mb-8 border-b border-gray-50 pb-4">
                            <h3 class="text-xl font-bold text-gray-800">Mis Marcadores</h3>
                            <span class="text-xs bg-gray-100 text-gray-500 px-3 py-1 rounded-full font-bold uppercase">{{ $links->count() }} Enlaces</span>
                        </div>

                        <div class="grid grid-cols-1 gap-4">
                            @forelse($links as $link)
                                <div x-data="{ openEdit: false, openDelete: false }" class="contents">
                                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl border border-transparent hover:border-[#6A6ECF]/20 hover:bg-white hover:shadow-md transition-all">
                                        <div class="flex items-center gap-4 flex-1 min-w-0">
                                            <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-[#6A6ECF] font-black text-xl border border-gray-100">
                                                {{ substr($link->title, 0, 1) }}
                                            </div>
                                            <div class="truncate">
                                                <a href="{{ $link->url }}" target="_blank" class="font-bold text-gray-800 hover:text-[#6A6ECF] transition-colors block truncate">{{ $link->title }}</a>
                                                <p class="text-xs text-gray-400 truncate">{{ $link->url }}</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center gap-4">
                                            @if($link->category)
                                                <span class="hidden sm:inline-block text-[10px] px-3 py-1 rounded-full text-white font-black uppercase" style="background-color: {{ $link->category->color }}">
                                                    {{ $link->category->name }}
                                                </span>
                                            @endif
                                            
                                            <div class="flex items-center border-l border-gray-200 ml-2 pl-4 gap-1">
                                                <button @click="openEdit = true" class="p-2 text-gray-300 hover:text-[#6A6ECF] transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                                </button>
                                                <button @click="openDelete = true" class="p-2 text-gray-300 hover:text-red-500 transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <template x-teleport="body">
                                        <div x-show="openEdit" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm" x-transition>
                                            <div @click.away="openEdit = false" class="bg-white w-full max-w-md p-8 rounded-[30px] shadow-2xl mx-4">
                                                <h3 class="text-xl font-bold text-[#6A6ECF] mb-6 text-center">Editar Enlace</h3>
                                                <form action="{{ route('links.update', $link) }}" method="POST" class="space-y-4">
                                                    @csrf @method('PUT')
                                                    <input type="text" name="title" value="{{ $link->title }}" class="w-full border-gray-100 bg-gray-50 rounded-xl">
                                                    <input type="url" name="url" value="{{ $link->url }}" class="w-full border-gray-100 bg-gray-50 rounded-xl">
                                                    <select name="category_id" class="w-full border-gray-100 bg-gray-50 rounded-xl">
                                                        <option value="">Sin categoría</option>
                                                        @foreach($categories as $cat)
                                                            <option value="{{ $cat->id }}" {{ $link->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="flex gap-3 pt-4">
                                                        <button type="submit" class="flex-1 bg-[#6A6ECF] text-white py-3 rounded-xl font-bold hover:bg-[#585cb3]">Guardar</button>
                                                        <button type="button" @click="openEdit = false" class="flex-1 bg-gray-100 text-gray-500 py-3 rounded-xl font-bold">Cancelar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </template>

                                    <template x-teleport="body">
                                        <div x-show="openDelete" class="fixed inset-0 z-[60] flex items-center justify-center bg-black/40 backdrop-blur-sm" x-transition>
                                            <div @click.away="openDelete = false" class="bg-white w-full max-w-sm p-8 rounded-[30px] shadow-2xl mx-4 text-center">
                                                <div class="w-16 h-16 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                                </div>
                                                <h3 class="text-xl font-bold text-gray-800 mb-2">¿Estás seguro?</h3>
                                                <p class="text-gray-500 text-sm mb-8">Este enlace se eliminará permanentemente de tu colección.</p>
                                                <div class="flex gap-3">
                                                    <form action="{{ route('links.destroy', $link) }}" method="POST" class="flex-1">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" class="w-full bg-red-500 text-white py-3 rounded-2xl font-bold hover:bg-red-600 shadow-lg shadow-red-100 transition-all">Eliminar</button>
                                                    </form>
                                                    <button @click="openDelete = false" class="flex-1 bg-gray-100 text-gray-500 py-3 rounded-2xl font-bold hover:bg-gray-200 transition-all">Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            @empty
                                <div class="text-center py-20 bg-gray-50 rounded-[25px] border-2 border-dashed border-gray-200">
                                    <p class="text-gray-400 font-medium italic text-lg">Tu colección está vacía. ¡Empieza añadiendo un enlace!</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>