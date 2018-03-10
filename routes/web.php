<?php

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


/* Normal routes*/
Route::get('/', 'UsersCtrl@index')->name('index');
Route::get('category/{ad_slug}', 'UsersCtrl@show')->name('category/{ad_slug}')->where('ad_slug', '[\w\d\-\_]+');
Route::get('/ad/{ad_slug}', 'UsersCtrl@render')->name('ad')->where('ad_slug', '[\w\d\-\_]+');
Route::get('/newest-to-oldest', 'UsersCtrl@newest')->name('/newest-to-oldest');
Route::get('/oldest-to-newest', 'UsersCtrl@oldest')->name('/oldest-to-newest');
Route::get('/get-in-touch', 'UsersCtrl@getInTouch')->name('/get-in-touch');
Route::get('/users-guideline', 'UsersCtrl@UsersGuideline')->name('/users-guideline');
Route::get('/for-business', 'UsersCtrl@business')->name('/for-business');
Route::get('/featured', 'UsersCtrl@featured')->name('/featured');
Route::get('/who-we-are', 'UsersCtrl@WhoWeAre')->name('/who-we-are');
Route::get('/terms-of-use', 'UsersCtrl@terms')->name('/terms-of-use');
/* End of Normal routes */

/*Search Bar Route*/
Route::post('search', ['as' => 'search', 'uses' => 'UsersCtrl@search']);
Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'UsersCtrl@autocomplete'));
/************************************************************************************************************/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* middleware*/
Route::group(['middleware' => ['auth']], function () {

//Ressource controllers
Route::resource('PostYourAd', 'PostYourAdCtrl');
Route::resource('addCategory', 'CategoryCtrl');
Route::resource('editInfo', 'EditInfoCtrl');
Route::resource('about', 'AboutCtrl');
Route::resource('service', 'ServicesCtrl');
Route::resource('social-media', 'SocialMediaCtrl');
Route::resource('feedback', 'CommentCtrl');


//Normal controllers
Route::get('post-your-ad', 'PostYourAdCtrl@index')->name('post-your-ad');
Route::get('my-ads', 'PostYourAdCtrl@myAds')->name('my-ads');
Route::get('change-status', 'PostYourAdCtrl@changeStatus')->name('change-status');
Route::get('edit-profile', 'PostYourAdCtrl@editProfile')->name('edit-profile');
Route::get('about', 'PostYourAdCtrl@About')->name('about');
Route::get('services', 'PostYourAdCtrl@Services')->name('services');
Route::get('add-category', 'PostYourAdCtrl@addCategory')->name('add-category');
Route::get('contact', 'PostYourAdCtrl@Contact')->name('contact');
Route::get('/{ad_slug}/open', 'PostYourAdCtrl@show')->name('/PostYourAd/{ad_slug}/');


});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
