<?php

namespace App\Providers;

use Native\Laravel\Contracts\ProvidesPhpIni;
use Native\Laravel\Facades\Window;

class NativeAppServiceProvider implements ProvidesPhpIni
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        Window::open()
            ->webPreferences([
                'allowFileAccessFromFileUrls' => true,
                'allowRunningInsecureContent' => true,
                'webSecurity'                 => false,
                'disablewebsecurity'          => true,
            ])
            ->width(1800)
            ->height(850)
            ->titleBarHidden();
    }


    /**
     * Return an array of php.ini directives to be set.
     */
    public function phpIni(): array
    {
        return [
            'upload_max_filesize' => '32M',
            'post_max_size'       => '32M',
        ];
    }
}
