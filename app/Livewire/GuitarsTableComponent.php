<?php

namespace App\Livewire;

use App\Models\Guitar;
use Livewire\Component;

class GuitarsTableComponent extends Component
{

    public $guitars = [];
    public $myGuitar;

    public $model;
    public $brand;
    public $year;
    public $price;
    public $description;
    public $image;

    public $isEditing;
    public $modal = false;

    public function mount() {
        $this->guitars = $this->getGuitars();
    }

    public function render()
    {
        return view('livewire.guitars-table-component');
    }

    public function openCreateModal(Guitar $guitar = null, $isEditing = true) {
        if ($guitar) {
            $this->myGuitar= $guitar;
            $this->model = $guitar->model;
            $this->brand = $guitar->brand;
            $this->year = $guitar->year;
            $this->price = $guitar->price;
            $this->description = $guitar->description;
            $this->image = $guitar->image;
        } else {
            $this->clearFields();
        }

        $this->isEditing = $isEditing;
        $this->modal = true;
    }

    private function clearFields() {
        $this->model = "";
        $this->brand = "";
        $this->year = "";
        $this->price = "";
        $this->description = "";
        $this->image = "";
    }

    public function closeCreateModal() {
        $this->modal = false;
        $this->isEditing = false;
    }

    public function getGuitars() {
        return Guitar::all();
    }

    public function createOrUpdateGuitar() {
        if($this->myGuitar->id){
            $guitar = Guitar::find($this->myGuitar->id);
            $guitar->update([
                'model' => $this->model,
                'brand' => $this->brand,
                'year' => $this->year,
                'price' => $this->price,
                'description' => $this->description,
                'image' => $this->image]);
        } else {
            $newGuitar = new Guitar();

            $newGuitar->model = $this->model;
            $newGuitar->brand = $this->brand;
            $newGuitar->year = $this->year;
            $newGuitar->price = $this->price;
            $newGuitar->description = $this->description;
            $newGuitar->image = $this->image;

            $newGuitar->save();
        }

        $this->clearFields();

        $this->modal = false;

        $this->guitars = $this->getGuitars();
    }

    public function deleteGuitar(Guitar $guitar) {
        $guitar->delete();
        $this->guitars = $this->getGuitars();
    }
}
