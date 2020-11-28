<?php
use App\Http\Middleware\CheckRedirect;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::prefix('sarkar')->group(function () {

	Route::resource('/users','admin\AdminController');

    Route::get('/', function () {
        return redirect()->route('showAdminLoginForm');
    });

    Route::get('/login', 'admin\AdminController@showAdminLoginForm')->name('showAdminLoginForm');
    Route::post('/login', 'admin\AdminController@AdminLogin')->name('AdminLogin');

    Route::get('/logout', 'admin\AdminController@AdminLogout')->name('AdminLogout');

    Route::get('/dashboard', 'admin\AdminController@dashboard')->name('Admin.dashboard');

    Route::get('/change-password', 'admin\AdminController@changePassword')->name('admin.changepassword');
    Route::put('/change-password', 'admin\AdminController@updatePassword')->name('admin.updatepassword');

    Route::post('/forgotten-password', 'admin\AdminController@forgottenPassword')->name('admin.forgottenpassword');
    Route::get('/reset-password', 'admin\AdminController@resetPassword')->name('admin.passwordreset');

    Route::resource('categories','admin\CategoryController');
    Route::resource('sub-categories','admin\SubCategoryController');

    Route::post('/sub-categories.list','admin\SubCategoryController@list')->name('subcategorylist');

    Route::resource('blog-categories','admin\BlogCategoryController');
    Route::resource('blogs','admin\BlogController');
    Route::post('blogs/upload-img','admin\BlogController@uploadImg')->name('blogs.uploadImg');

    Route::resource('pages','admin\PageController');
    Route::post('pages/upload-img','admin\PageController@uploadImg')->name('pages.uploadImg');

    Route::resource('enquiries','admin\EnquiryController');
    Route::post('enquiries/reply','admin\EnquiryController@reply')->name('enquiries.reply');
    Route::post('enquiries/update-status','admin\EnquiryController@updateStatus')->name('enquiries.updateStatus');

    Route::resource('redirections','admin\RedirectionController');


    Route::resource('products','admin\ProductController');
    Route::get('/productSequenceExist/{sequence}/{id}', 'admin\ProductController@productSequenceExist')->name('productSequenceExist');
    Route::resource('user-rights','admin\UserRightController');
    Route::resource('events','admin\EventController');
    Route::post('events/upload-img','admin\EventController@uploadImg')->name('events.uploadImg');
    Route::get('events/orders/{id}', 'admin\EventController@order')->name('events.order');

    Route::get('/customers', 'admin\CustomerController@index')->name('customer.index');
    Route::get('/customer/orders', 'admin\CustomerController@order')->name('customer.order');
    Route::get('/customer/order-details/{id}', 'admin\CustomerController@orderDetail')->name('customer.orderDetail');


    Route::get('/homepage', 'admin\ProductController@homepage')->name('homepage');
    Route::post('/saveHomepageFurnitureSection', 'admin\ProductController@saveHomepageFurnitureSection')->name('saveHomepageFurnitureSection');
    Route::post('/saveHomepageFurnitureSection', 'admin\ProductController@saveHomepageFurnitureSection')->name('saveHomepageFurnitureSection');
    Route::post('/saveHomepageConsumablesSection', 'admin\ProductController@saveHomepageConsumablesSection')->name('saveHomepageConsumablesSection');
    Route::post('/saveHomepageElectricalsSection', 'admin\ProductController@saveHomepageElectricalsSection')->name('saveHomepageElectricalsSection');

    Route::resource('brands','admin\BrandController');

});

Route::group(['middleware' => [CheckRedirect::class]], function () {

    Route::get('/', 'HomeController@home')->name('home');

    Route::get('/product/search/{searchQuery}', 'ProductController@productSearch')->name('products.search');


    Route::get('/send/email', 'HomeController@mail');
    Route::get('/cart', 'CartController@list')->name('cart');
    Route::delete('/cart-item-delete/{product_id}', 'CartController@cartItemDelete')->name('cartItemDelete');

    Route::post('/addTocart', 'ProductController@addTocart')->name('addTocart');
    Route::get('/getCookie', 'ProductController@getCookie')->name('getCookie');

    Route::get('/checkout', 'OrderController@checkout')->name('checkout');
    Route::get('/pincode', 'OrderController@pincode')->name('pincode');
    Route::post('/saveCheckout', 'OrderController@saveCheckout')->name('saveCheckout');
    Route::get('/thanks', 'OrderController@thanks')->name('orders.thanks');

    Route::get('/my-account', 'UserController@profile')->name('users.profile');
    Route::post('/my-account', 'UserController@changePassword')->name('users.changePassword');

    Route::get('/my-orders', 'OrderController@list')->name('orders.list');
    Route::get('/my-order/{order}', 'OrderController@show')->name('orders.show');
    Route::get('/downloadPDF/{id}','OrderController@downloadPDF')->name('orders.downloadPDF');

    Route::get('/write-review/{product_id}/{order_row_id}', 'ReviewController@feedback')->name('write-review');
    Route::post('/saveReview', 'ReviewController@saveReview')->name('saveReview');

    Route::get('/academy', 'EventController@academy')->name('event.academy');
    Route::get('/academy-details/{id}', 'EventController@academyDetails')->name('event.academyDetails');
    Route::post('/academy-buy/{id}', 'EventController@academyBuy')->name('event.academyBuy');

    Route::get('/care', 'EnquiryController@care')->name('enquiry.care');
    Route::get('/plus', 'EnquiryController@plus')->name('enquiry.plus');
    Route::get('/xpress', 'EnquiryController@xpress')->name('enquiry.xpress');
    Route::post('/storeEnquiry', 'EnquiryController@store')->name('enquiry.store');
    Route::post('/complaint-search','EnquiryController@complaintSearch')->name('enquiry.complaintSearch');

    Route::get('/blogs', 'BlogController@list')->name('blogs.list');
    Route::get('/blog/{slug}', 'BlogController@view')->name('blogs.view');
    Route::get('/advanceBlogSearch/{search}', 'BlogController@advanceBlogSearch')->name('advanceBlogSearch');
    Route::get('/brands','BrandController@list')->name('brand.list');
    Route::get('/v/{page}', 'HomeController@page')->name('{page}');
   // Route::get('/{name}/b','BrandController@detail')->name('brand.detail');
    Route::get('/brands/{slug}','BrandController@detail')->name('brand.detail');
    Route::get('/advanceSearch/{search}', 'HomeController@advanceSearch')->name('advanceSearch');

    Route::get('/{category}', 'ProductController@categoryList')->name('products.category-list');
    Route::get('/{category}/{subcategory}', 'ProductController@list')->name('products.list');
    Route::get('/{category}/{subcategory}/{product}', 'ProductController@productDetail')->name('products.product-detail');
});







