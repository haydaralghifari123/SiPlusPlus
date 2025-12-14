<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Master\Category;
use App\Models\Config\WebConfig;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // 🔒 Pastikan aplikasi sudah runtime, bukan composer
        if (app()->runningInConsole()) {
            return;
        }

        View::composer('*', function ($view) {

            if (Schema::hasTable('categories')) {
                $view->with('global_category', Category::all());
            }

            if (Schema::hasTable('web_configs')) {
                $view->with([
                    'app_name' => WebConfig::where('name', 'app_name')->value('value') ?? '-',
                    'app_logo' => WebConfig::where('name', 'app_logo')->value('file_path') ?? '-',
                ]);
            }
        });
    }
}
