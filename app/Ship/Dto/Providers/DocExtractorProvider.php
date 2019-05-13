<?php

namespace App\Ship\Dto\Providers;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;

/**
 * Class DtoProvider
 * @package App\Ship\Dto\Providers
 */
class DocExtractorProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(PhpDocExtractor::class, function ($app) {
            return new PhpDocExtractor();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            PhpDocExtractor::class
        ];
    }
}