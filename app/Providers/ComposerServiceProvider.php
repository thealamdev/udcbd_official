<?php

namespace App\Providers;

use App\Domains\Announcement\Services\AnnouncementService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Domains\Auth\Models\User;

/**
 * Class ComposerServiceProvider.
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @param  AnnouncementService  $announcementService
     */
    public function boot(AnnouncementService $announcementService)
    {

        View::composer('*', function ($view) {
            $view->with('logged_in_user', auth()->user());
        });

        View::composer('*', function ($view) {
            $balance_users = User::query()->with('balance')->where('id', auth()->user()?->id)->first();
            $view->with('balance_users', $balance_users);
        });

        View::composer(['frontend.index', 'frontend.layouts.app'], function ($view) use ($announcementService) {
            $view->with('announcements', $announcementService->getForFrontend());
        });

        View::composer(['backend.layouts.app'], function ($view) use ($announcementService) {
            $view->with('announcements', $announcementService->getForBackend());
        });
    }
}
