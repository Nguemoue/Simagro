<?php
if(!function_exists("adminUser")){
    function adminUser(): \App\Models\Administrateur|\Illuminate\Contracts\Auth\Authenticatable|null
    {
        return adminAuth()->user();
    }
}

if(!function_exists("clientUser")){
    function clientUser(): \App\Domains\Services\Model\Client|\Illuminate\Contracts\Auth\Authenticatable|null
    {
        return clientAuth()->user();
    }
}

if(!function_exists("clientAuth")){
    function clientAuth(): \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Auth\Factory
    {
        return auth("web");
    }
}

if(!function_exists("adminAuth")){
    function adminAuth(): \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Auth\Factory
    {
        return auth("admin");
    }
}


