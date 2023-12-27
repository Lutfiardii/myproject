<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/user/login', 'UserController@login')->name('login');
Route::post('/user/login/store', 'UserController@loginpost');
// Route::get('/user/register', 'UserController@register')->name('register');
Route::post('/user/register/store', 'UserController@registerstore');
Route::get('/logout', 'UserController@logout')->middleware('customer');

//edit profile user
Route::get('/profile/edit/{id}', 'UserController@profileedit');
Route::post('/profile/update/{id}', 'UserController@profileupdate');

// userP
Route::group(
    ['namespace' => 'user'],
    function () {
        Route::get('/', 'HomePageController@index');
        // product
        Route::get('/product', 'HomePageController@product');
        Route::get('/detail/product/{id}', 'HomePageController@detailproduct');
        Route::get('/categories/{id}','HomePageController@category');
        Route::get('/contact/{id}', 'HomePageController@contact');
        Route::get('/value/{id}', 'HomePageController@attributeValue');
        Route::get('/search', 'HomePageController@search')->name('search');
        Route::post('/cart/delete/{id}', 'HomePageController@delete')->name('cart.delete');


    Route::group(['middleware' => ['customer'] ], function() {
            Route::get('/cart/{id}', 'HomePageController@keranjang');
            Route::get('/profile/{id}', 'HomePageController@profile')->name('profile');
            Route::post('/cart/store/{id}', 'HomePageController@cartstore');
        });
    }
);

//login admin
Route::get('/admin/login', 'AdminController@login')->name('login');
Route::post('/admin/proseslogin', 'AdminController@loginpost');

    Route::group(['middleware' => ['admin'] ], function() {
        //logout admin
        Route::get('/admin/logout', 'AdminController@logout');
        //halaman dashboard
        Route::get('/admin/dashboard', 'AdminController@index');

        //administrator
        Route::get('/admin/administrator', 'AdminController@administrator');
        Route::get('/admin/administrator/create', 'AdminController@administratorcreate');
        Route::post('/admin/administrator/store', 'AdminController@administratorstore');
        Route::get('/admin/administrator/edit/{id}','AdminController@administratoredit');
        Route::post('/admin/administrator/update/{id}','AdminController@administratorupdate');
        Route::get('/admin/administrator/delete/{id}','AdminController@destroy');

        //attribute
        Route::get('/admin/attributes', 'aAttributeController@attribute');
        Route::get('/admin/attributes/create','aAttributeController@attributecreate');
        Route::post('/admin/attributes/store','aAttributeController@attributestore');
        Route::get('/admin/attributes/edit/{id}','aAttributeController@attributeedit');
        Route::post('/admin/attributes/update/{id}','aAttributeController@attributeupdate');
        Route::get('/admin/attributes/delete/{id}','aAttributeController@destroy');

        //attribute-value
        Route::get('/admin/attributeValues/{id}','aAttributeValueController@indexvalue');
        Route::get('/admin/attributeValues/create/{id}','aAttributeValueController@valuecreate');
        Route::post('/admin/attributeValues/store/{id}','aAttributeValueController@valuestore');
        Route::get('/admin/attributeValues/edit/{id}/{value_id}','aAttributeValueController@valueedit')->name('valueedit');
        Route::post('/admin/attributeValues/update/{id}','aAttributeValueController@valueupdate')->name('valueupdate');
        Route::get('/admin/attributeValues/delete/{id}','aAttributeValueController@destroy')->name('valuedelete');

        //Category
        Route::get('/admin/categories', 'aCategoryController@category');
        Route::get('/admin/categories/create','aCategoryController@categorycreate');
        Route::post('/admin/categories/store','aCategoryController@categorytore');
        Route::get('/admin/categories/edit/{id}','aCategoryController@categoryedit');
        Route::post('/admin/categories/update/{id}','aCategoryController@categoryupdate');
        Route::get('/admin/categories/delete/{id}','aCategoryController@destroy');

        //Brand
        Route::get('/admin/brands', 'aBrandController@brand');
        Route::get('/admin/brands/create','aBrandController@brandcreate');
        Route::post('/admin/brands/store','aBrandController@brandtore');
        Route::get('/admin/brands/edit/{id}','aBrandController@brandedit');
        Route::post('/admin/brands/update/{id}','aBrandController@brandupdate');
        Route::get('/admin/brands/delete/{id}','aBrandController@destroy');

        //product
        Route::get('/admin/products', 'aProductController@product');
        Route::get('/admin/products/create','aProductController@productcreate');
        Route::post('/admin/products/store','aProductController@productstore');
        Route::get('/admin/products/edit/{id}','aProductController@productedit');
        Route::post('/admin/products/update/{id}','aProductController@productupdate');
        Route::get('/admin/products/delete/{id}','aProductController@destroy');
        Route::match(['get','post'],'/admin/product/categories', 'aProductController@productcategory');

        //Contact
        Route::get('/admin/contacts', 'aContactController@contact');
        Route::get('/admin/contacts/create','aContactController@contactcreate');
        Route::post('/admin/contacts/store','aContactController@contacttore');
        Route::get('/admin/contacts/edit/{id}','aContactController@contactedit');
        Route::post('/admin/contacts/update/{id}','aContactController@contactupdate');
        Route::get('/admin/contacts/delete/{id}','aContactController@destroy');

        //customer
        Route::get('/admin/customers', 'aCustomerController@customer');
    }
    );
