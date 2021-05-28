<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerPostPolicies();
    }

    public function registerPostPolicies()
    {
        Gate::before(function($user, $ability) {
            
            if(isAdmin($user->role_id))
            {     
                return true;
            }
        });

        //For mosque_committee
        Gate::define('mosque_committee_view', function ($user) {
            return $user->hasAccess(['mosque_committee_view']);
        });

        Gate::define('mosque_committee_add', function ($user) {
            return $user->hasAccess(['mosque_committee_add']);
        });

        Gate::define('mosque_committee_edit', function ($user) {
            return $user->hasAccess(['mosque_committee_edit']);
        });

        Gate::define('mosque_committee_delete', function ($user) {
            return $user->hasAccess(['mosque_committee_delete']);
        });

        Gate::define('mosque_committee_owndata', function ($user) {
            return $user->hasAccess(['mosque_committee_owndata']);
        });

        //For quran_teachers
        Gate::define('quran_teachers_view', function ($user) {
            return $user->hasAccess(['quran_teachers_view']);
        });

        Gate::define('quran_teachers_add', function ($user) {
            return $user->hasAccess(['quran_teachers_add']);
        });

        Gate::define('quran_teachers_edit', function ($user) {
            return $user->hasAccess(['quran_teachers_edit']);
        });

        Gate::define('quran_teachers_delete', function ($user) {
            return $user->hasAccess(['quran_teachers_view']);
        });

        Gate::define('quran_teachers_owndata', function ($user) {
            return $user->hasAccess(['quran_teachers_owndata']);
        });

        //For hafiz Module Policy (Define by Me)
        Gate::define('hafiz_view', function ($user) {
            return $user->hasAccess(['hafiz_view']);
        });

        Gate::define('hafiz_add', function ($user) {
            return $user->hasAccess(['hafiz_add']);
        });

        Gate::define('hafiz_edit', function ($user) {
            return $user->hasAccess(['hafiz_edit']);
        });

        Gate::define('hafiz_delete', function ($user) {
            return $user->hasAccess(['hafiz_delete']);
        });

        Gate::define('hafiz_owndata', function ($user) {
            return $user->hasAccess(['hafiz_owndata']);
        });


        //For appointment Module Policy (Define by Me)
        Gate::define('appointment_view', function ($user) {
            return $user->hasAccess(['appointment_view']);
        });
        Gate::define('appointment_add', function ($user) {
            return $user->hasAccess(['appointment_add']);
        });
        Gate::define('appointment_edit', function ($user) {
            return $user->hasAccess(['appointment_edit']);
        });
        Gate::define('appointment_delete', function ($user) {
            return $user->hasAccess(['appointment_delete']);
        });
        Gate::define('appointment_owndata', function ($user) {
            return $user->hasAccess(['appointment_owndata']);
        });


        //For Dashboard Module Policy (Define by Me)
        Gate::define('dashboard_view', function ($user) {
            return $user->hasAccess(['dashboard_view']);
        });
        Gate::define('dashboard_owndata', function ($user) {
            return $user->hasAccess(['dashboard_owndata']);
        });
        

        //For Reports Module Policy (Define by Me)
        Gate::define('report_view', function ($user) {
            return $user->hasAccess(['report_view']);
        });
        Gate::define('report_add', function ($user) {
            return $user->hasAccess(['report_add']);
        });
        Gate::define('report_edit', function ($user) {
            return $user->hasAccess(['report_edit']);
        });
        Gate::define('report_delete', function ($user) {
            return $user->hasAccess(['report_delete']);
        });
        Gate::define('report_owndata', function ($user) {
            return $user->hasAccess(['report_owndata']);
        });
    }
}
