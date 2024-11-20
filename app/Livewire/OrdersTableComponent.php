<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\ClientsGuitars;
use App\Models\Guitar;
use Livewire\Component;

class OrdersTableComponent extends Component
{
    public $orders = [];
    public $myOrder;
    public $return_date;

    public $myClient;
    public $name;
    public $surname;
    public $email;
    public $phone;

    public $myGuitar;
    public $brand;
    public $model;
    public $year;
    public $price;
    public $description;
    public $image;

    public $modal = false;
    public $isEditing = true;

    public function mount() {
        $this->orders = $this->getOrders();
    }

    public function render()
    {
        return view('livewire.orders-table-component');
    }

    public function getOrders() {
        return ClientsGuitars::all();
    }

    public function getClient(ClientsGuitars $order) {
        return Client::find($order->client_id);
    }

    public function getGuitar(ClientsGuitars $order) {
        return Guitar::find($order->guitar_id);
    }

    public function openCreateModal(ClientsGuitars $order = null, $isEditing = true) {
        if ($order) {
            $this->myOrder = $order;
            $this->myClient = $this->getClient($order);
            $this->myGuitar = $this->getGuitar($order);
            $this->return_date = $order->return_date;
        } else {
            $this->clearFields();
        }
        $this->isEditing = $isEditing;
        $this->modal = true;
    }

    private function clearFields() {
        $this->name = "";
        $this->surname = "";
        $this->email = "";
        $this->phone = "";
        $this->brand = "";
        $this->model = "";
        $this->return_date = "";
    }

    public function closeCreateModal() {
        $this->clearFields();
        $this->modal = false;
    }

    public function updateOrder() {
        $this->myOrder->return_date = $this->return_date;
        $this->myOrder->save();

        $this->closeCreateModal();
        $this->orders = $this->getOrders();
    }

    public function deleteOrder(ClientsGuitars $order) {
        $order->delete();
        $this->orders = $this->getOrders();
    }
}
