<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" 
                role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <button wire:click="create()" 
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
            Crear Nuevo Producto</button>
            @if($isOpen)
                @include('livewire.producto_create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Precio</th>
                        <th class="px-4 py-2">Imagen</th>
                        <th class="px-4 py-2">Disponibilidad</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $prod)
                    <tr>
                        <td class="border px-4 py-2">{{ $prod->id }}</td>
                        <td class="border px-4 py-2">{{ $prod->nombre }}</td>
                        <td class="border px-4 py-2">{{ $prod->precio }}</td>
                        <td class="border px-4 py-2"><img src="/storage/{{ $prod->imagen }}"></td>
                        <td class="border px-4 py-2">{{ $prod->disponibilidad?'SI':'NO' }}</td>
                        <td class="border px-4 py-2">
                        <button wire:click="edit({{ $prod->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $prod->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
