<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('/', function (BreadcrumbTrail $trail) {
    $trail->push('Blogs', route('allblogs'));
});

Breadcrumbs::for('single', function (BreadcrumbTrail $trail, $single_page) {
    $trail->parent('/');
    $trail->push($single_page, route('showblog', $single_page));
});


Breadcrumbs::for('blog', function (BreadcrumbTrail $trail, $blog) {
    $trail->parent('/');
    $trail->push($blog, route('showblog', $blog));
});



