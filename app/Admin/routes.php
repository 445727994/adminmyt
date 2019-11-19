<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
	'prefix' => config('admin.route.prefix'),
	'namespace' => config('admin.route.namespace'),
	'middleware' => config('admin.route.middleware'),
], function (Router $router) {

	$router->get('/', 'HomeController@index')->name('admin.home');
	$router->resource('market-cates', MarketCateController::class);
	$router->resource('markets', MarketController::class);
	$router->resource('markets-list', MarketListController::class);
	$router->resource('market-users', MarketUserController::class);
	$router->resource('frees', FreeController::class);
	$router->resource('coupons', CouponController::class);
	$router->resource('free-settings', FreeSettingController::class);
	$router->resource('markets-school', MarketsSchoolContorller::class);
});
