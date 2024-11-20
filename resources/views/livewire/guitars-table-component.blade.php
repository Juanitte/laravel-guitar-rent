<div>
    <!-- component -->
<div class="container">
	<h1 class="mb-8 text-xl font-bold">
        Guitars Table
    </h1>
    <button class="bg-gray-800 border border-white text-white my-2 p-2 rounded-md hover:bg-white hover:border hover:border-gray-800 hover:text-gray-800" wire:click="openCreateModal">
        New
    </button>
</div>
<!-- component -->
<div class="flex justify-center items-center min-h-screen flex-wrap">
    @foreach ($guitars as $guitar)
    <a class="hover:cursor-pointer" wire:click="openCreateModal({{$guitar}}, false)">
        <div class="max-w-[720px] mx-auto mb-2">
            <!-- Centering wrapper -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96 border">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white bg-clip-border rounded-xl h-96">
                        <img
                            src="{{ asset($guitar->image) }}"
                            alt="card-image" class="object-cover w-full h-full" />
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <p class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                {{ $guitar->brand }} {{ $guitar->model }}
                            </p>
                            <p class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                {{ $guitar->price }}
                            </p>
                        </div>
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-gray-700 opacity-75">
                            {{ $guitar->description }}
                        </p>
                        <div class="flex flex-row justify-center p-6">
                            <a class="hover:cursor-pointer px-2" wire:click="openCreateModal({{$guitar}})">
                                <svg height="20px" width="20px" fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>
                            </a>
                            <a class="hover:cursor-pointer pl-2" wire:click="deleteClient({{$guitar}})">
                                <svg height="20px" width="20px" fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z"/></svg>
                            </a>
                        </div>
                    </div>
            </div>
        </div>
    </a>
    @endforeach
</div>
@if ($modal)
    <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
        <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
          <div class="w-full">
            <div class="m-8 my-20 max-w-[400px] mx-auto">
                @if ($isEditing)
                    <h1 class="text-3xl font-bold text-center mb-4">{{isset($myGuitar->id) ? 'Edit' : 'Create new'}} Guitar</h1>
                @else
                    <h1 class="text-3xl font-bold text-center mb-4">{{$myGuitar->brand}} {{$myGuitar->model}} info</h1>
                @endif
                <div class="mb-4">
                    <label for="model" class="block mb-2 text-sm font-medium text-gray-900">Model</label>
                    @if ($isEditing)
                        <input type="text" id="model" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-800 focus:border-gray-800 block w-full p-2.5" wire:model="model">
                    @else
                        <p>{{$myGuitar->model}}</p>
                    @endif
                </div>
                <div class="mb-4">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900">Brand</label>
                    @if ($isEditing)
                        <input type="text" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-800 focus:border-gray-800 block w-full p-2.5" wire:model="brand">
                    @else
                        <p>{{$myGuitar->brand}}</p>
                    @endif
                    </div>
                <div class="mb-4">
                    <label for="year" class="block mb-2 text-sm font-medium text-gray-900">Year</label>
                    @if ($isEditing)
                        <input type="text" id="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-800 focus:border-gray-800 block w-full p-2.5" wire:model="year">
                    @else
                        <p>{{$myGuitar->year}}</p>
                    @endif
                </div>
                <div class="mb-4">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                    @if ($isEditing)
                        <input type="text" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-800 focus:border-gray-800 block w-full p-2.5" wire:model="price">
                    @else
                        <p>{{$myGuitar->price}}</p>
                    @endif
                </div>
                <div class="mb-4">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Desscription</label>
                    @if ($isEditing)
                        <input type="text" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-800 focus:border-gray-800 block w-full p-2.5" wire:model="description">
                    @else
                        <p>{{$myGuitar->description}}</p>
                    @endif
                </div>
                <div class="mb-4">
                    <label for="iamge" class="block mb-2 text-sm font-medium text-gray-900">Image</label>
                    @if ($isEditing)
                        <input type="text" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-800 focus:border-gray-800 block w-full p-2.5" wire:model="image">
                    @else
                        <p>{{$myGuitar->image}}</p>
                    @endif
                </div>
                <div class="flex flex-row">
                    @if ($isEditing)
                        <button class="p-3 bg-gray-800 rounded-xl text-white w-full font-semibold" wire:click="createOrUpdateGuitar">
                            {{isset($myGuitar->id) ? 'Update' : 'Create'}} Guitar
                        </button>
                    @endif
                    <button class="p-3 bg-white border border-gray-800 text-gray-800 rounded-xl w-full font-semibold" wire:click="closeCreateModal">
                        @if ($isEditing)
                            Cancel
                        @else
                            Close
                        @endif
                    </button>
                </div>
            </div>
          </div>
        </div>
    </div>
  @endif
</div>