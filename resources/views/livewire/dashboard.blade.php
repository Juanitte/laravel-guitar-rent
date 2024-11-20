<div>
    <h1 class="pb-8 text-xl font-bold">
        Dashboard
    </h1>
    <div class="flex flex-row justify-between">
        <button class="w-full bg-gray-800 border border-white text-white my-2 p-2 rounded-md hover:bg-white hover:border hover:border-gray-800 hover:text-gray-800" wire:click="goToClients">
            Clients
        </button>
        <button class="w-full bg-gray-800 border border-white text-white my-2 p-2 rounded-md hover:bg-white hover:border hover:border-gray-800 hover:text-gray-800" wire:click="goToGuitars">
            Guitars
        </button>
        <button class="w-full bg-gray-800 border border-white text-white my-2 p-2 rounded-md hover:bg-white hover:border hover:border-gray-800 hover:text-gray-800" wire:click="goToOrders">
            Orders
        </button>
    </div>
    <div>
        @If ($isInClients)
            <livewire:clients-table-component />
        @elseif ($isInGuitars)
            <livewire:guitars-table-component />
        @elseif ($isInOrders)
            <livewire:orders-table-component />
        @endif
    </div>
</div>