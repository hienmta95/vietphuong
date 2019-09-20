<?php

namespace Modules\Frontend\Providers;

use App\Hethongphanphoi;
use App\Loaiquanhecodong;
use App\Loaisanpham;
use App\Loaitintuc;
use App\Sanpham;
use App\Tintuc;
use App\Menu;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class FrontendServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $menu = Menu::with(['childs' => function($q) { 
                $q->with(['childs' => function($q) {
                    $q->orderBy('order', 'asc'); 
                } ])
                ->orderBy('order', 'asc'); 
            
            } ])
            ->whereRaw('parent_id is NULL')->orderBy('order', 'asc')->get()->toArray();

        $info = User::where('id', '1')->first();

        $tintucnoibat = Tintuc::with(['image'])->where('loaitintuc_id', '!=', '3')
            ->orderBy('id', 'desc')->limit(3)->get()->toArray();

        $sanphamnoibat = Sanpham::with(['image'])
            ->orderBy('id', 'desc')->limit(3)->get()->toArray();

        $weblienket = Tintuc::selectRaw('link, title')
            ->where('loaitintuc_id', '3')
            ->orderBy('id', 'desc')->get()->toArray();

        $menu_quanhecodong = Loaiquanhecodong::with(['quanhecodong' => function($q) {
            $q->with(['image'])->orderBy('id', 'desc')->limit(5)->get();
        }])->orderBy('id', 'desc')->get()->toArray();

        $menu_loaisanpham = Loaisanpham::with(['sanpham' => function($q) {
            $q->with(['image'])->orderBy('id', 'desc')->limit(5)->get();
        }])->orderBy('id', 'desc')->get()->toArray();

        $menu_loaitintuc = Loaitintuc::with(['tintuc' => function($q) {
            $q->with(['image'])->orderBy('id', 'desc')->limit(5)->get();
        }])->orderBy('id', 'desc')->get()->toArray();

        $menu_hethongphanphoi = Hethongphanphoi::orderBy('id', 'desc')->get()->toArray();

        view()->share('menu', $menu);
        view()->share('info', $info);
        view()->share('weblienket', $weblienket);
        view()->share('tintucnoibat', $tintucnoibat);
        view()->share('sanphamnoibat', $sanphamnoibat);
        view()->share('menu_quanhecodong', $menu_quanhecodong);
        view()->share('menu_loaisanpham', $menu_loaisanpham);
        view()->share('menu_loaitintuc', $menu_loaitintuc);
        view()->share('menu_hethongphanphoi', $menu_hethongphanphoi);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('frontend.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'frontend'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/frontend');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/frontend';
        }, \Config::get('view.paths')), [$sourcePath]), 'frontend');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/frontend');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'frontend');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'frontend');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
