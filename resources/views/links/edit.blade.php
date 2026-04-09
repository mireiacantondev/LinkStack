<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow">
            <h2 class="text-xl font-bold mb-4">Editar Enlace</h2>
            
            <form action="{{ route('links.update', $link) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT') <input type="text" name="title" value="{{ $link->title }}" class="w-full border-gray-300 rounded-xl">
                <input type="url" name="url" value="{{ $link->url }}" class="w-full border-gray-300 rounded-xl">
                
                <select name="category_id" class="w-full border-gray-300 rounded-xl">
                    <option value="">Sin categoría</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $link->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <div class="flex gap-2">
                    <button type="submit" class="bg-[#6A6ECF] text-white px-4 py-2 rounded-xl">Guardar Cambios</button>
                    <a href="{{ route('dashboard') }}" class="text-gray-500 py-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>