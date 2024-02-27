<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\NpsLink;
use App\Utils\TakeBlipApiUtil;

class TakeBlipWhatsappSendMessageJob implements ShouldQueue
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
        $this->onQueue('take_blip');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $takeBlipApiUtil = new TakeBlipApiUtil;

        $response = $takeBlipApiUtil
        ->messages([
            "id" => $this->nps->uuid,
            "to" => $this->nps->config_number . "@wa.gw.msging.net",
            "type" => "application/json",
            "content" => [
                "type" => "template",
                "template" => [
                    "name" => "npsv6",
                    "language" => ["code" => "pt_BR", "policy" => "deterministic"],
                    "components" => [
                        [
                            "type" => "button",
                            "sub_type" => "url",
                            "index" => 0,
                            "parameters" => [["type" => "text", "text" => $this->nps->uuid]],
                        ],
                    ],
                ],
            ],
        ]);

        $this->nps->response = json_encode([
            "status" => $response->getStatusCode(),
            "message" => $response->getReasonPhrase(),
            "dispatched_at" => now()->format("d/m/Y H:i"),
        ], true);

        $this->nps->save();
    }
}
