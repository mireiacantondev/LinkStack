<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tu Panel de LinkStack') }}
            </h2>
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-1 rounded-lg text-sm animate-bounce">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </x-slot>

    <div class="py-12 bg-[#F2F2F2] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="md:col-span-2 space-y-8">
                    
                    <div class="bg-white overflow-hidden shadow-[0_0_20px_rgba(106,110,207,0.15)] rounded-[25px] p-8">
                        <h3 class="text-lg font-bold text-[#6A6ECF] mb-6 flex items-center gap-2">
                            <span class="w-2 h-6 bg-[#6A6ECF] rounded-full"></span>
                            Gestión de Categorías
                        </h3>
                        
                        <form action="{{ route('categories.store') }}" method="POST" class="flex gap-4">
                            @csrf
                            <input type="text" name="name" required placeholder="Ej: Redes Sociales, Portfolio..." 
                                class="flex-1 border-gray-200 rounded-xl focus:ring-[#6A6ECF] focus:border-[#6A6ECF] placeholder-gray-300">
                            
                            <div class="flex items-center bg-gray-50 px-3 rounded-xl border border-gray-200">
                                <input type="color" name="color" value="#6A6ECF" 
                                    class="w-8 h-8 border-none bg-transparent cursor-pointer">
                            </div>

                            <button type="submit" class="bg-[#6A6ECF] text-white px-6 py-2 rounded-xl font-bold hover:bg-[#585cb3] transition-all active:scale-95 shadow-lg shadow-purple-100">
                                +
                            </button>
                        </form>

                        <div class="mt-8 flex flex-wrap gap-3">
                            @forelse($categories as $category)
                                <div class="group relative flex items-center gap-2 px-4 py-2 rounded-full text-white text-sm font-bold shadow-sm transition-transform hover:scale-105"
                                    style="background-color: {{ $category->color }};">
                                    {{ $category->name }}
                                    
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline-flex">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white/70 hover:text-white font-black ml-1 text-lg leading-none">&times;</button>
                                    </form>
                                </div>
                            @empty
                                <p class="text-gray-400 text-sm italic">No tienes categorías aún. Crea la primera arriba.</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow-[0_0_20px_rgba(106,110,207,0.15)] rounded-[25px] p-8">
                        <h3 class="text-lg font-bold text-[#6A6ECF] mb-6 flex items-center gap-2">
                            <span class="w-2 h-6 bg-[#6A6ECF] rounded-full"></span>
                            Añadir Nuevo Enlace
                        </h3>
                        
                        <form action="{{ route('links.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" name="title" required placeholder="Título (ej: Mi Instagram)" 
                                    class="border-gray-200 rounded-xl focus:ring-[#6A6ECF] focus:border-[#6A6ECF] w-full">
                                
                                <input type="url" name="url" required placeholder="URL (https://...)" 
                                    class="border-gray-200 rounded-xl focus:ring-[#6A6ECF] focus:border-[#6A6ECF] w-full">
                            </div>

                            <div class="flex flex-col md:flex-row gap-4">
                                <select name="category_id" class="flex-1 border-gray-200 rounded-xl focus:ring-[#6A6ECF] focus:border-[#6A6ECF]">
                                    <option value="">Sin categoría (General)</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>

                                <button type="submit" class="bg-[#6A6ECF] text-white px-10 py-3 rounded-xl font-bold hover:bg-[#585cb3] transition-all shadow-lg shadow-purple-200">
                                    Guardar Enlace
                                </button>
                            </div>
                        </form>

                        <div class="mt-10 space-y-4">
                            @php $links = auth()->user()->links()->with('category')->get(); @endphp
                            @forelse($links as $link)
                                <div class="bg-gray-50 p-5 rounded-2xl flex justify-between items-center border border-transparent hover:border-[#6A6ECF]/30 hover:bg-white hover:shadow-md transition-all group">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center shadow-sm border border-gray-100">
                                            <span class="text-[#6A6ECF] font-bold">{{ substr($link->title, 0, 1) }}</span>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-800">{{ $link->title }}</p>
                                            <p class="text-xs text-gray-400">{{ $link->url }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center gap-3">
                                        @if($link->category)
                                            <span class="text-[10px] px-3 py-1 rounded-full text-white font-black uppercase tracking-wider" 
                                                style="background-color: {{ $link->category->color }}">
                                                {{ $link->category->name }}
                                            </span>
                                        @endif
                                        <form action="{{ route('links.destroy', $link) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button class="text-gray-300 hover:text-red-500 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-10">
                                    <p class="text-gray-400 italic">No hay enlaces todavía. ¡Empieza añadiendo uno!</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="hidden md:block">
                    <div class="sticky top-12">
                        <div class="relative mx-auto border-gray-900 bg-gray-900 border-[14px] rounded-[2.5rem] h-[600px] w-[300px] shadow-2xl overflow-hidden">
                            <div class="w-[148px] h-[18px] bg-gray-900 top-0 rounded-b-[1rem] left-1/2 -translate-x-1/2 absolute z-20"></div>
                            <div class="h-[32px] w-[3px] bg-gray-900 absolute -left-[17px] top-[72px] rounded-l-lg"></div>
                            <div class="h-[46px] w-[3px] bg-gray-900 absolute -left-[17px] top-[124px] rounded-l-lg"></div>
                            <div class="h-[46px] w-[3px] bg-gray-900 absolute -left-[17px] top-[178px] rounded-l-lg"></div>
                            <div class="h-[64px] w-[3px] bg-gray-900 absolute -right-[17px] top-[142px] rounded-r-lg"></div>
                            
                            <div class="rounded-[2rem] overflow-hidden w-full h-full bg-white flex flex-col pt-12 px-6">
                                <div class="w-16 h-16 bg-gradient-to-tr from-[#6A6ECF] to-purple-300 rounded-full mx-auto mb-4 shadow-md"></div>
                                <div class="w-24 h-3 bg-gray-100 rounded-full mx-auto mb-8"></div>
                                
                                <div class="space-y-3 overflow-y-auto no-scrollbar">
                                    @foreach($links as $link)
                                        <div class="w-full py-3 px-4 border border-gray-100 rounded-xl shadow-sm flex items-center justify-between">
                                            <span class="text-[10px] font-bold text-gray-700">{{ $link->title }}</span>
                                            @if($link->category)
                                                <div class="w-2 h-2 rounded-full" style="background-color: {{ $link->category->color }}"></div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                
                                <div class="mt-auto pb-6 text-center">
                                    <p class="text-[10px] text-gray-300 font-bold uppercase tracking-widest">LinkStack</p>
                                </div>
                            </div>
                        </div>
                        <p class="text-center mt-4 text-gray-400 text-sm font-medium">Vista previa en tiempo real</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</x-app-layout>