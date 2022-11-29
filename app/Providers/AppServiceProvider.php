<?php

namespace App\Providers;

use Blade;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('filemanager',function() {
            return new \App\Helpers\FileManager;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Blade::directive('version', function($path) {
            try {
                $version = date("dmYHis", filemtime(public_path(str_replace("'","",$path))));
            } catch (\Throwable $th) {
                $ospath = (PHP_OS === 'WINNT') ? str_ireplace("/", "\\", $path) : $path;
                throw new \Exception(sprintf('Verifique o caminho do arquivo %s, e tente novamente.', public_path(str_replace("'","",$ospath))));
            }
            return sprintf('%s?v=%s', "<?php echo asset({$path}) ?>", $version);
        });

        if (! app()->environment('production')) {
            Mail::alwaysTo(env('MAIL_DEFAULT', 'tecnlogia@centralfarma.com.br'));
        }
    }
}
