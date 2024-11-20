<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;

class ClientsTableComponent extends Component
{
    public $clients = [];
    public $myClient;

    public $name;
    public $surname;
    public $email;
    public $phone;

    public $isEditing;
    public $modal = false;

    public function mount() {
        $this->clients = $this->getClients();
    }

    public function render()
    {
        return view('livewire.clients-table-component');
    }

    public function openCreateModal(Client $client = null, $isEditing = true) {
        if ($client) {
            $this->myClient= $client;
            $this->name = $client->name;
            $this->surname = $client->surname;
            $this->email = $client->email;
            $this->phone = $client->phone;
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
    }

    public function closeCreateModal() {
        $this->modal = false;
        $this->isEditing = false;
    }

    public function getClients() {
        return Client::all();
    }

    public function createOrUpdateClient() {
        if($this->myClient->id){
            $client = Client::find($this->myClient->id);
            $client->update([
                'name' => $this->name,
                'surname' => $this->surname,
                'email' => $this->email,
                'phone' => $this->phone]);
        } else {
            $newClient = new Client();

            $newClient->name = $this->name;
            $newClient->surname = $this->surname;
            $newClient->email = $this->email;
            $newClient->phone = $this->phone;

            $newClient->save();
        }

        $this->clearFields();

        $this->modal = false;

        $this->clients = $this->getClients();
    }

    public function deleteClient(Client $client) {
        $client->delete();
        $this->clients = $this->getClients();
    }

}
