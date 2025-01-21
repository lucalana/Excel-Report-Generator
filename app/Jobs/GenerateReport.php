<?php

namespace App\Jobs;

use App\Exports\UsersExport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Maatwebsite\Excel\Facades\Excel;

class GenerateReport implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $startDate,
        public string $endDate,
    ){}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $filename = 'usersreport-'. now()->timestamp .'.xlsx';
        Excel::store(new UsersExport($this->startDate, $this->endDate), $filename);
    }
}
