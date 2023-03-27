<?php

use App\LinkConfiguration;
use Illuminate\Database\Seeder;

class LinkConfigurationSeeder extends Seeder
{
    protected $linkConfiguration;

    public function __construct()
    {
        $this->linkConfiguration = new LinkConfiguration;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->linkConfiguration
        ->insert(
            [
                [
                    'key'           => 'REDIRECT_TIMEOUT',
                    'value'         => '2500',
                    'description'   => 'Tempo padrão de espera para redirecionamento dos links',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
                [
                    'key'           => 'SCRIPT_HEADER',
                    'value'         => "<!-- Google Tag Manager -->
                    <script>
                      (function(w, d, s, l, i) {
                        w[l] = w[l] || [];
                        w[l].push({
                          'gtm.start': new Date().getTime(),
                          event: 'gtm.js'
                        });
                        var f = d.getElementsByTagName(s)[0],
                          j = d.createElement(s),
                          dl = l != 'dataLayer' ? '&l=' + l : '';
                        j.async = true;
                        j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                        f.parentNode.insertBefore(j, f);
                      })(window, document, 'script', 'dataLayer', 'GTM-PSXLZNQ');
                    </script>
                    <!-- End Google Tag Manager -->",
                    'description'   => 'Script padrão para o cabeçalho do link de redirecionamento',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
                [
                    'key'           => 'SCRIPT_BODY',
                    'value'         => '<!-- Google Tag Manager (noscript) -->
                    <noscript>
                      <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PSXLZNQ" height="0" width="0" style="display:none;visibility:hidden"></iframe>
                    </noscript>
                    <!-- End Google Tag Manager (noscript) -->',
                    'description'   => 'Script padrão para o cabeçalho do link de redirecionamento',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
            ]
        );
    }
}
