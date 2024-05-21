<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\NpsLink;
use App\Utils\MaisChatApiUtil;

class MaisChatWhatsappSendMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $nps;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(NpsLink $nps)
    {
        $this->nps = $nps;
        // Default queue name
        $this->onQueue('mais_chat');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $maisChatApiUtil = new MaisChatApiUtil;

        $response = $maisChatApiUtil
        ->sendTemplateMetaCloud([
            "uuid"              => $this->nps->uuid,
            "pacient_whatsapp"  => $this->nps->config_number,
            "prescriber_url"    => route("nps.show", ["uuid" => $this->nps->uuid]),
            "pacient_name"      => $this->nps->client_name,
            "prescriber_name"   => $this->nps->client_representant,
            "prescription"      => "Testando NPS",
        ]);

        if($response["status"]){
            $this->nps->response = json_encode($response, true);
            $this->nps->save();
        }
    }
}
