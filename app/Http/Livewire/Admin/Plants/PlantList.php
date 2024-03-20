<?php

namespace App\Http\Livewire\Admin\Plants;

use Livewire\WithPagination;
use App\Models\Plant;
use DB;
use App\Models\Order;
use Livewire\Component;

class PlantList extends Component
{
    use WithPagination;
    public $deleteConfirmId;

    protected $listeners = ['deleteConfirm' => 'deleteConfirm'];

    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.admin.plants.plant-list', [
            'plants' => Plant::select('plants.*')
                            ->addSelect(['ordered_qty'=> 
                                Order::selectRaw('SUM(quantity)')->whereColumn('plant_id','plants.id')
                                ->where(function($query){
                                    $query->whereNull('expired_at')->orWhere('is_completed','1');
                                })                
                            ])
                            ->orderBy('id', 'DESC')->paginate(8)
        ])->layout('layouts.admin', ['title' => 'Plant']);
    }
    public function deleteConfirm()
    {
        // dd($this->deleteConfirm);

        Plant::destroy($this->deleteConfirmId);
    }

    public function deleteAttempt($id)
    {
        $this->deleteConfirmId = $id;
    }
}