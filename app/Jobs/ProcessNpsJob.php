<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\NpsLink;
use App\Jobs\MaisChatWhatsappSendMessageJob;
use App\Jobs\TakeBlipWhatsappSendMessageJob;

class ProcessNpsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $nps;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->nps = NpsLink::find($id);

        // Default queue name
        $this->onQueue('nps');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->nps){
            switch ($this->nps->config_gateway) {
                case 'MaisChat':
                    MaisChatWhatsappSendMessageJob::dispatch($this->nps);
                    break;

                default://TakeBlip
                    TakeBlipWhatsappSendMessageJob::dispatch($this->nps);
                    break;
            }
        }
    }
}
