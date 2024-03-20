<?php

namespace App\Http\Livewire\Admin\Plants;

use Livewire\Component;
use App\Models\Plant;
use Livewire\WithFileUploads;

class PlantCreateEdit extends Component
{
    use WithFileUploads;

    public $plant;
    public $name;
    public $image = "";
    public $image1 = "";
    public $image2 = "";
    public $image3 = "";
    public $image4 = "";
    public $price = 0;
    public $description;
    public $feature1;
    public $feature2;
    public $feature3;
    public $benefit1;
    public $benefit2;
    public $benefit3;
    public $earn_cash_text1;
    public $earn_cash_text2;
    public $earn_cash_text3;
    public $what_you_get_text1;
    public $what_you_get_text2;
    public $what_you_get_text3;
    public $harvest_per_year;
    public $revenue;
    public $quantity;
    public $sell_price;
    public $start_date;
    public $end_date;
    public $eth_price;
    public $edit = false;
    public $avail_qty;
    public $orderedQty = 0;
    public $thc;
    public $cbd;
    public $revenue_per_harvest;
    public $annual_return;


    public function mount($plant_id = null)
    {


        if ($plant_id) {
            $this->plant = Plant::findOrFail($plant_id);
            //get the order quantities for the plant and calculate available quantity 
            $orderedQuantity = $this->plant->orders()
                                    ->where(function($query){
                                        $query->whereNull('expired_at')->orWhere('expired_at','>',date('Y-m-d H:i:s'))->orWhere('is_completed','1');
                                    })->sum('quantity');
            $this->orderedQty = $orderedQuantity;
            $this->edit = true;
            $this->fill($this->plant);
        }
    }
    
    /**
     * clear the image from the form
     * @param type $image
     */
    public function clearImage($image){
        $this->reset($image);
    }

    public function saveOrUpdate()
    {

        if ($this->edit) {
            $validatedData = $this->validate([
                "name" => "required",
                "image" => "nullable",
                "image1" => "nullable",
                "image2" => "nullable",
                "image3" => "nullable",
                "image4" => "nullable",
                "price" => "required",
                "description" => "nullable",
                "feature1" => "required",
                "feature2" => "nullable",
                "feature3" => "nullable",
                "benefit1" => "required",
                "benefit2" => "nullable",
                "benefit3" => "nullable",
                "earn_cash_text1" => "required",
                "earn_cash_text2" => "nullable",
                "earn_cash_text3" => "nullable",
                "what_you_get_text1" => "required",
                "what_you_get_text2" => "nullable",
                "what_you_get_text3" => "nullable",
                 "harvest_per_year"  => "required",
                 "revenue"  => "required",
                 "quantity"  => "required:|gte:".$this->orderedQty,
                 "sell_price"  => "required",
                  "start_date"  => "required",
                  "end_date"  => "required",
                  "eth_price"=>"required",
                  "thc"=>"required",
                  "cbd"=>"required",
                  "revenue_per_harvest"=>"required",
                  "annual_return"=>"required",
            ]);
            //check the available quantity for the plant edit
        } else {
            $validatedData = $this->validate([
                "name" => "required",
                "image" => "required",
                "image1" => "nullable",
                "image2" => "nullable",
                "image3" => "nullable",
                "image4" => "nullable",
                "price" => "required",
                "description" => "nullable",
                "feature1" => "required",
                "feature2" => "nullable",
                "feature3" => "nullable",
                "benefit1" => "required",
                "benefit2" => "nullable",
                "benefit3" => "nullable",
                "earn_cash_text1" => "required",
                "earn_cash_text2" => "nullable",
                "earn_cash_text3" => "nullable",
                "what_you_get_text1" => "required",
                "what_you_get_text2" => "nullable",
                "what_you_get_text3" => "nullable",
                "harvest_per_year"  => "required",
                 "revenue"  => "required",
                 "quantity"  => "required",
                 "sell_price"  => "required",
                  "start_date"  => "required",
                  "end_date"  => "required",
                  "eth_price"=>"required",
                "thc"=>"required",
                  "cbd"=>"required",
                  "revenue_per_harvest"=>"required",
                  "annual_return"=>"required",
            ]);
            $this->plant = new Plant;
        }
        if (!is_string($this->image) && $this->image != "") {
            // $validatedData['image']=ImageHelper::saveImage($this->image,'upload');
            $name = md5($this->image . microtime()) . '.' . $this->image->extension();
            $validatedData['image'] = $name;
            $this->image->storeAs('uploads', $name, 'upload');
        }
        if (!is_string($this->image1) && $this->image1 != "") {
            // $validatedData['image']=ImageHelper::saveImage($this->image,'upload');
            $imagename = md5($this->image1 . microtime()) . '.' . $this->image1->extension();
            $validatedData['image1'] = $imagename;
            if ($validatedData['image1'] == $imagename) {
                $this->image1->storeAs('uploads', $imagename, 'upload');
            }
        }
        if (!is_string($this->image2) && $this->image2 != '') {
            // $validatedData['image']=ImageHelper::saveImage($this->image,'upload');
            $name2 = md5($this->image2 . microtime()) . '.' . $this->image2->extension();
            $validatedData['image2'] = $name2;
            $this->image2->storeAs('uploads', $name2, 'upload');
        }
        if (!is_string($this->image3) && $this->image3 != '') {
            // $validatedData['image']=ImageHelper::saveImage($this->image,'upload');
            $name3 = md5($this->image3 . microtime()) . '.' . $this->image3->extension();
            $validatedData['image3'] = $name3;
            $this->image3->storeAs('uploads', $name3, 'upload');
        }
        if (!is_string($this->image4) && $this->image4 != '') {
            // $validatedData['image']=ImageHelper::saveImage($this->image,'upload');
            $name4 = md5($this->image4 . microtime()) . '.' . $this->image4->extension();
            $validatedData['image4'] = $name4;
            $this->image4->storeAs('uploads', $name4, 'upload');
        }
        //dd($validatedData);
        //  if($this->image){
        //$this->image->storeAs('uploads', $name);
        // }
        $this->plant->fill($validatedData)->save();

        if ($this->edit)
            $this->dispatchBrowserEvent('toastr', ['type' => "success", 'msg' => "Strain Base successfully updated"]);
        else {
            $this->reset();
            $this->dispatchBrowserEvent('toastr', ['type' => "success", 'msg' => "Plant successfully added"]);
        }
        return redirect()->route('plant.list');
    }

    public function render()
    {
        return view('livewire.admin.plants.plant-create-edit')->layout('layouts.admin', ['title' => 'Plant']);;
    }
}