<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AffiliateCommission as AffiliateCommissions;
use App\Models\AdminConfiguration;
use Exception;

class AffiliateCommission extends Component {

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $commission_value;
    public $commissionPercentage;

    public function render() {
        $affiliateCommissions = AffiliateCommissions::orderBy('created_at', 'DESC')->paginate(15);
        $this->commissionPercentage = AdminConfiguration::where('key_name', 'commission_percentage')->first()->value;
        return view('livewire.admin.affiliate-commission',
                                ['affiliateCommissions' => $affiliateCommissions])
                        ->layout('layouts.admin', ['title' => 'Affiliate Commissions']);
        ;
    }

    /**
     * update the commission value for admin
     */
    public function updateCommissionValue() {
        try {
            $validatedData = $this->validate([
                'commission_value' => 'required|gt:0.1|lte:100'
            ]);
            if ($validatedData['commission_value'] > 0 && $validatedData['commission_value'] <= 100) {
                AdminConfiguration::where('key_name', 'commission_percentage')->update(['value' => $validatedData['commission_value']]);
                $this->dispatchBrowserEvent('toastr', ['type' => "success", 'msg' => 'Successful']);
                $this->dispatchBrowserEvent('valueUpdated', ['commission_value' => $validatedData['commission_value']]);
            } else {
                $this->dispatchBrowserEvent('toastr', ['type' => "error", 'msg' => "Please fill valid percentage value"]);
            }
        } catch (Exception $ex) {
            $this->dispatchBrowserEvent('toastr', ['type' => "error", 'msg' => $ex->getMessage()]);
        }
    }

}
