<?php

namespace App\Console\Commands;

use App\ShortUrl;
use App\Composers\ComposerLinkConfig;
use Illuminate\Console\Command;

class ReplicateUrlScripts extends Command
{
    protected $shortUrl;
    protected $composerLinkConfig;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'urls:replicate-url-scripts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy from configuration scritps to all urls';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->shortUrl = new ShortUrl;
        $this->composerLinkConfig = new ComposerLinkConfig();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
     public function handle()
     {
        $composerLinkConfig = $this->composerLinkConfig->getKeyValues();

        \DB::transaction(function () use ($composerLinkConfig) {
            $this->shortUrl
            ->get()
            ->map(function($row) use($composerLinkConfig){

                $row->script_header = $composerLinkConfig["SCRIPT_HEADER"];
                $row->script_body   = $composerLinkConfig["SCRIPT_BODY"];
                $row->save();

                return $row;
            });
        });

    }
}
