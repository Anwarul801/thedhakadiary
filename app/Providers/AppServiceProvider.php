<?php

namespace App\Providers;

use App\Models\Ad;
use App\Models\Marque;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Poll;
use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::composer('*', function ($view) {
            //        ad
            $ads = Ad::where([
                ['status', 'Active'],
            ])->get();
            $sorbosesh = Post::orderBy('id', 'DESC')->where([[checkPost()],['latest_news', 1]])->take(6)->get();
            $breaking_news = Post::select('title', 'slug', 'id')->where('breaking_news', 1)->orderBy('id','DESC')->take(10)->get();
            $menu = Menu::with('category', 'page')->orderBy('order', 'asc')->get();
            $pages = Page::where('deletable', 0)->get();
            $view->with('breaking_news', $breaking_news)
                ->with('menu_header', $menu)
                ->with('sorbosesh', $sorbosesh)
                ->with('pages', $pages)
                ->with('ads', $ads);
        });
        View::composer('layouts.partials.vote', function ($view) {
            $poll = Poll::orderBy('id', 'desc')->first();
            $view->with('poll', $poll);
        });
    }
}
