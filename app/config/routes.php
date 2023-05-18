<?php
    $urlRoutes = [
        '' => 'home/index',
        'admin' => 'admin/admin/index',
        'admin/dashboard' => 'admin/admin/index',
        'admin/register' => 'admin/admin/register',
        'admin/login' => 'admin/admin/login',

        // status 
        'admin/status' => 'admin/status/index',
        'admin/status/create' => 'admin/status/create',
        'admin/status/change' => 'admin/status/change',
        'admin/status/delete' => 'admin/status/delete',

        // product
        'admin/products' => 'admin/product/products',
        'admin/product' => 'admin/product/open',
        'admin/product/create' => 'admin/product/create',
        'admin/products/change' => 'admin/product/change',
        'admin/products/delete' => 'admin/product/delete',
        'admin/products/update' => 'admin/product/update',

    ];
    
?>