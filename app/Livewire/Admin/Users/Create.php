<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Builders\Pages\CreatePage;
use App\Livewire\Builders\Breadcrumb;
use App\Models\User;
use App\Services\UserService;

class Create extends CreatePage
{
    function pageOnSuccessRedirect()
    {
        return fn($user) => $user ? route('admin.users.edit', ['user' => $user->id]) : route('admin.users.index');
    }

    function pageModelPolicyClass()
    {
        return \App\Policies\UserPolicy::class;
    }

    function pageModelServiceClass()
    {
        return UserService::class;
    }

    function pageModelClass()
    {
        return User::class;
    }

    function pageBreadcrumb()
    {
        return (new Breadcrumb)
            ->addItem(__('common/words.users'), 'people-fill', route('admin.users.index'))
            ->addItem(__('common/words.create') . ' ' . strtolower(__('common/words.user')), 'person-fill-add', route('admin.users.create'));
    }

    function pageTitle()
    {
        return __('common/words.create') . ' ' . strtolower(__('common/words.user'));
    }

    function pageIcon()
    {
        return 'person-fill-add';
    }

    function pageView()
    {
        return 'admin.users.create';
    }

    function pageLayout()
    {
        return 'admin.layouts.layout1';
    }
}
