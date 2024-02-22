<?php

use App\Http\Controllers\Admin\AdminCredentialController;
use App\Http\Controllers\Admin\AttributesController;
use App\Http\Controllers\Admin\AttributesGroupController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RatingController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\TermAndPolicyController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AdminCredentialController::class, "index"])->name('admin.login');
Route::post('login', [AdminCredentialController::class, 'login'])->name('admin.auth');
Route::post('/logout', [AdminCredentialController::class, 'logout'])->name('admin.logout');

Route::get('dashboard', [DashboardController::class, "dashboard"])->name('admin.dashboard');

Route::resource('banner', BannerController::class);
Route::resource('blogs', BlogController::class);

Route::resource('category', CategoryController::class);
Route::resource('brand', BrandController::class);

Route::resource('attributegroups', AttributesGroupController::class);

Route::post('attribute', [AttributesController::class, "AttributesController"])->name('filterattributegroup')
;

Route::resource('attributes', AttributesController::class);
Route::resource('pages', TermAndPolicyController::class);

Route::resource('product', ProductController::class);
Route::resource('faqs', FaqController::class);
Route::resource('coupon', CouponController::class);

Route::resource('rating', RatingController::class);
Route::post('rating/{id}', [RatingController::class, 'changestatus'])->name('changestatus')->middleware("admin");

Route::get('productimage/{product}', [ProductController::class, 'imagecreate'])->name('myimage')->middleware("admin");
Route::post('productimage/{product_id}', [ProductController::class, 'productImage'])->name('productImage')->middleware("admin");
Route::delete('productimage/{img}', [ProductController::class, 'deleteImage'])->name('deleteImage')->middleware("admin");

Route::get('order', [OrderController::class, 'getorder'])->name('getorder')->middleware("admin");
Route::get('order/details/{details}', [OrderController::class, 'orderdetails'])->name('order.details')->middleware("admin");
Route::delete('orderdelete/{orderdelete}', [OrderController::class, 'deleteorderdetails'])->name('order.destroy')->middleware("admin");

Route::post('orderstatus/{orderstatus}', [OrderController::class, 'change_status'])->name('order.changestatus')->middleware("admin");

Route::get('salesreport', [ReportController::class, 'salesreport'])->name('salesreport')->middleware("admin");
Route::get('searchsales', [ReportController::class, 'searchsales'])->name('searchsales')->middleware("admin");

Route::get('productreport', [ReportController::class, 'productreport'])->name('productreport')->middleware("admin");
// Route::get('searchsales', [ReportController::class, 'searchsales'])->name('searchsales')->middleware("admin");

Route::get('download-csv', [ReportController::class, 'downloadCSV'])->name('admin.downloadCSV')->middleware('admin');

Route::get('/invoice/{orderid}', [ReportController::class, 'invoice'])->name('invoice');

Route::get('/setting', [TermAndPolicyController::class, 'setting'])->name('admin.setting');
Route::post('/settingdetails', [TermAndPolicyController::class, 'settingdetails'])->name('settingdetails');
Route::post('/deliverycharge', [TermAndPolicyController::class, 'deliverycharge'])->name('deliverycharge');

Route::get('/export-sales-report-csv', [ReportController::class, 'exportSalesReportCsv'])->name('report.csv');
Route::get('/export-sales-report-pdf', [ReportController::class, 'exportSalesReportPdf'])->name('report.pdf');
// Route::get('dashboard', [DashboardController::class, 'singleproductreport'])->name('singleproductreport')->middleware("admin");
Route::get('dashboards', [DashboardController::class, 'singleproductreport'])->name('singleproductreport')->middleware("admin");

Route::get('/generate-invoice/{orderId}', [InvoiceController::class, 'generateInvoicePdf'])->name('generate.invoice');
