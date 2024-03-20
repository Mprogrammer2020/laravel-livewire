<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TransferToMasterWallet implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        for ($i = 1; $i < 21; $i++) {
            self::dispatch(function () {
                \Illuminate\Support\Facades\Artisan::call('transfer:masterWallet', ['id' => $i]);
                echo date('Y-m-d H:i:s') . "\n<br/>";
            });
        }
    }

}
