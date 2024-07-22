<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Kredit;
use Carbon\Carbon;

class UpdateKreditStatus extends Command
{
    protected $signature = 'kredit:update-status';
    protected $description = 'Update kredit status to Lunas if the due date is passed';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $today = Carbon::now();
        $kredit= Kredit::where('akhir_kredit', '<', $today)
                        ->where('status', 'Belum Lunas')
                        ->update(['status' => 'Lunas']);

        $this->info('Kredit status updated successfully');
    }
}
