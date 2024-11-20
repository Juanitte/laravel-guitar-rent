<div>
    <!-- component -->
<div class="container">
	<h1 class="mb-8 text-xl font-bold">
        Orders Table
    </h1>
	<table class="text-left w-full">
		<thead class="bg-gray-800 flex text-white w-full rounded-t-lg">
			<tr class="flex w-full mb-4">
				<th class="p-4 w-1/4">Client Email</th>
				<th class="p-4 w-1/4">Guitar</th>
                <th class="p-4 w-1/4">Return Date</th>
				<th class="p-4 w-1/4"></th>
			</tr>
		</thead>
        <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 50vh;">
			@foreach ($orders as $order)
                <tr class="flex w-full mb-4">
                    <td class="p-4 w-1/4">{{$this->getClient($order)->email}}</td>
                    <td class="p-4 w-1/4">{{$this->getGuitar($order)->brand}} {{$this->getGuitar($order)->model}}</td>
                    <td class="p-4 w-1/4">{{$order->return_date}}</td>
                    <td class="p-4 w-1/4 flex flex-row">
                        <a class="hover:cursor-pointer pr-2" wire:click="openCreateModal({{$order}}, false)">
                            <svg height="20px" width="20px" fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                        </a>
                        <a class="hover:cursor-pointer px-2" wire:click="openCreateModal({{$order}})">
                            <svg height="20px" width="20px" fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>
                        </a>
                        <a class="hover:cursor-pointer pl-2" wire:click="deleteOrder({{$order}})">
                            <svg height="20px" width="20px" fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z"/></svg>
                        </a>
                    </td>
                </tr>
            @endforeach
		</tbody>
	</table>
</div>
@if ($modal)
    <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
        <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
          <div class="w-full">
            <div class="m-8 my-20 max-w-[400px] mx-auto">
                @if ($isEditing)
                    <h1 class="text-3xl font-bold text-center mb-4">{{isset($myOrder->id) ? 'Edit' : 'Create new'}} order</h1>
                @else
                    <h1 class="text-3xl font-bold text-center mb-4">Order info</h1>
                @endif
                <div class="mb-4">
                    <label for="return_date" class="block mb-2 text-sm font-medium text-gray-900">Return date</label>
                    @if ($isEditing)
                        <input type="text" id="return_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-800 focus:border-gray-800 block w-full p-2.5" wire:model="return_date">
                    @else
                        <p>{{$myOrder->return_date}}</p>
                    @endif
                </div>
                <div class="mb-4">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Client Name</label>
                    <p>{{$myClient->name}}</p>
                </div>
                <div class="mb-4">
                    <label for="surname" class="block mb-2 text-sm font-medium text-gray-900">Client Surname</label>
                    <p>{{$myClient->surname}}</p>
                </div>
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Client Email</label>
                    <p>{{$myClient->email}}</p>
                </div>
                <div class="mb-4">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Client Phone</label>
                    <p>{{$myClient->phone}}</p>
                </div>
                <div class="mb-4">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900">Guitar Brand</label>
                    <p>{{$myGuitar->brand}}</p>
                </div>
                <div class="mb-4">
                    <label for="model" class="block mb-2 text-sm font-medium text-gray-900">Guitar Model</label>
                    <p>{{$myGuitar->model}}</p>
                </div>
                <div class="mb-4">
                    <label for="year" class="block mb-2 text-sm font-medium text-gray-900">Guitar Year</label>
                    <p>{{$myGuitar->year}}</p>
                </div>
                <div class="flex flex-row">
                    @if ($isEditing)
                        <button class="p-3 bg-gray-800 rounded-xl text-white w-full font-semibold" wire:click="updateOrder">
                            Update Order
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
