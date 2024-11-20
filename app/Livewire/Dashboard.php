<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $isInClients = false;
    public $isInGuitars = false;
    public $isInOrders = false;

    public function goToClients() {
        if($this->isInClients)
            $this->isInClients = false;
        else
            $this->isInClients = true;
        $this->isInGuitars = false;
        $this->isInOrders = false;
    }

    public function goToGuitars() {
        $this->isInClients = false;
        if($this->isInGuitars)
            $this->isInGuitars = false;
        else
            $this->isInGuitars = true;
        $this->isInOrders = false;
    }

    public function goToOrders() {
        $this->isInClients = false;
        $this->isInGuitars = false;
        if($this->isInOrders)
            $this->isInOrders = false;
        else
            $this->isInOrders = true;
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
