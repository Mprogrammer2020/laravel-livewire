<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

class UserCreateEdit extends Component
{
    public $user;
    public $name;
    public $email;
    public $street;
    public $house_number;
    public $address;
    public $zip_code;
    public $city;
    public $country;
    public $state;
    public $harvest_progress;
    public $edit = false;


    public function mount($user_id = null)
    {
        if ($user_id) {
            $this->user = User::findOrFail($user_id);
            $this->edit = true;
            $this->fill($this->user);
        }
    }

    public function saveOrUpdate()
    {
        if ($this->edit) {
            $validatedData = $this->validate([
                'name' => 'required',
                'email' => 'required',
                "street" => "nullable",
                "house_number" => "nullable",
                "address" => "nullable",
                "zip_code" => "nullable",
                "city" => "nullable",
                "country" => "nullable",
                'state' => "nullable",
                'harvest_progress' => "nullable",
                // 'image' => 'image|max:1024', // 1MB Max
            ]);
        } else {
            $validatedData = $this->validate([
                'name' => 'required',
                'email' => 'required',
                "street" => "nullable",
                "house_number" => "nullable",
                "address" => "nullable",
                "zip_code" => "nullable",
                "city" => "nullable",
                "country" => "nullable",
                'state' => "nullable",
                'harvest_progress' => "nullable",
            ]);
            $this->user = new User;
        }
        if ($this->user && $this->user->email != $validatedData['email'] && $this->user->role_name == 'USER') {
            $userExistByEmail = User::role('USER')->whereEmail($validatedData['email'])->first();
            if ($userExistByEmail) {
                // dd($userExistByEmail);
                $this->addError('email', 'Email is already been taken');
                return;
            }
        }

        $this->user->fill($validatedData)->save();

        if ($this->edit)
            $this->dispatchBrowserEvent('toastr', ['type' => "success", 'msg' => "User successfully updated"]);
        else {
            $this->reset();
            $this->dispatchBrowserEvent('toastr', ['type' => "success", 'msg' => "User successfully added"]);
        }
        return redirect()->route('user.list', ['role' => 'USER']);
    }

    public function render()
    {
        return view('livewire.admin.users.user-create-edit')->layout('layouts.admin', ['title' => 'User']);
    }
}
