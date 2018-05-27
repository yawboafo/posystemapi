<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'category/create',
        'organizationCategory/create',
        'organizationCategory/update',
        'organizationCategory/delete',

        'organization/create',
        'organization/update',
        'organization/delete',

        'category/create',
        'category/update',
        'category/delete',
        'category/get',


        'product/create',
        'product/update',
        'product/delete',
        'product/get',

        'user/create',
        'user/update',
        'user/delete',
        'getAllOrganizationUsers'
    ];
}
