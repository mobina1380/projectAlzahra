<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\listController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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
//

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
    Route::get('login', [CustomAuthController::class, 'index'])->name('login');
    Route::post('login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
    Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
    Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
    Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

    Route::get('/xx', [IndexController::class, "index"]);
    Route::post('/getReq', [IndexController::class, "getReq"])->name("submit");
    Route::post('/submitTag', [IndexController::class, "submitTag"])->name("submitTag");
    Route::post('/Summarization', [IndexController::class, "Summarization"])->name("Summarization");
    Route::post('/Classification', [IndexController::class, "Classification"])->name("Classification");
    Route::get('display-user', [UserController::class, 'index']);
    Route::get('/facet', [HomeController::class, 'facetsearch'])->name('facet');
    Route::get('/', [HomeController::class, 'home'])->name('homePage');
    Route::get('/autocomplete', [HomeController::class, 'autocomplete'])->name('autoComplete');
    Route::get('/privacy', [ViewController::class, 'privacy'])->name('privacy');
    Route::get('/searchreasult', [HomeController::class, 'search'])->name('search');
    Route::get('/questionview/{id}/{subject?}', [HomeController::class, 'getById'])->name('search2');
    Route::get('/tagresult/{tag}', [HomeController::class, 'tags'])->name('GetAllTags');
    Route::get('/tagresult/{tag}', [HomeController::class, 'tags'])->name('GetAllTags');
    Route::get('/Treeclassification/{cat}', [HomeController::class, 'Treeclassification'])->name('Treeclassification');
    Route::get('/test', [HomeController::class, 'getById'])->name('test1');
    Route::get('/tags', [HomeController::class, 'elasticsearchGetSimularityTags'])->name('tags');
    Route::get('/category/{cat}', [HomeController::class, 'getByCategory'])->name('cats');
    Route::get('/newquestion', [ViewController::class, 'newquestion'])->name('newquestion');
    Route::get('/questionOthersite', [ViewController::class, 'questionOthersite'])->name('questionOthersite');
    Route::get('/aboutus', [ViewController::class, 'aboutus'])->name('aboutus');
    Route::get('/signin', [ViewController::class, 'signin'])->name('rtlsignin');
    Route::get('/signup', [ViewController::class, 'signup'])->name('signup');
    Route::get('/showActivity/{id}', [HomeController::class, 'showActivity'])->name('showActivity');
    Route::get('/marja/{link}/{persianname}/{string}/{marjaname?}', [HomeController::class, 'dyscriptlinks'])->name('dyscriptlinks');
    Route::get('/semantic_search', [ViewController::class, 'AnswerSearch'])->name('semantic_search');
    Route::get('/question_similarity', [ViewController::class, 'SimilarQuestion'])->name('question_similarity');
    Route::get('/spell_correction', [ViewController::class, 'ErrorCorrection'])->name('spell_correction');
    Route::get('/recommended_question', [ViewController::class, 'Recommended'])->name('recommended_question');
    Route::get('/question_tagging', [ViewController::class, 'KeywordExtraction'])->name('question_tagging');
    Route::get('/question_simplification', [ViewController::class, 'QuestionTextSummary'])->name('question_simplification');
    Route::get('/question_classification', [ViewController::class, 'Classification'])->name('question_classification');
    Route::get('/open_domain_qa', [ViewController::class, 'KnowledgeBased'])->name('open_domain_qa');
    Route::get('services/service{id}', function ($id) {
        return view('rtl.componentServices.service'.$id);
    })->where('id', '[1-8]')->name('service');

});


//Route::get('/sitemap', [SitemapController::class, 'getAllQu']);
//Route::get('/sitemap', [SitemapController::class, 'createIdAr']);
//Route::get('/sitemap', function (){
//    return view('sitemap');
//});
Route::post('insert-comment/{id}', [HomeController::class, 'insertComment'])->name('insert_comment');
Route::post('insert-article/{id}', [listController::class, 'insertComment'])->name('insert-article');
Route::delete('delete-article/{id}', [listController::class, 'deleteArticle'])->name('delete-article');
Route::post('edit-article/{id}', [listController::class, 'editArticle'])->name('edit-article');

Route::get('/sitemap.xml', function (){
    return response(file_get_contents(resource_path('sitemap.xml')));
});

Route::get('/sitemap/sitemapFa.xml', function (){
    return response(file_get_contents(resource_path('../public/sitemap/ID-ar.xml')));

});
Route::get('/sitemap/sitemapEn.xml', function (){
    return response(file_get_contents(resource_path('../public/sitemap/ID-en.xml')));

});
Route::get('/sitemap/sitemapAr.xml', function (){
    return response(file_get_contents(resource_path('../public/sitemap/ID-ar.xml')));

});
Route::get('/sitemap/sitemapAz.xml', function (){
    return response(file_get_contents(resource_path('../public/sitemap/ID-az.xml')));

});
Route::get('/sitemap/sitemapDe.xml', function (){
    return response(file_get_contents(resource_path('../public/sitemap/ID-de.xml')));

});
Route::get('/sitemap/sitemapBn.xml', function (){
    return response(file_get_contents(resource_path('../public/sitemap/ID-bn.xml')));

});
Route::get('/sitemap/sitemapEs.xml', function (){
    return response(file_get_contents(resource_path('../public/sitemap/ID-es.xml')));

});

Route::get('/author/{id}', [HomeController::class, 'author'])->name('author');
Route::get('/author2/{id}', [HomeController::class, 'author2'])->name('author2');

Route::get('/aboutus',function (){
    return redirect('/fa/aboutus');
});
//Route::get('/news', [HomeController::class, 'news']);

Route::get('/', [UserController::class, 'index']);
Route::resource('events', CrudController::class);
Route::resource('news', NewsController::class);
Route::resource('lists', listController::class);
Route::get('/app',function () {
    return view('auth.app');
})->name('dkd');


Route::get('/test',function () {
    return view('rtl.layouts.test');
});
Route::get('/listCollege',function () {
    return view('Colleges.listCollege');
})->name('listCollege');

Route::get('/dashbord',function () {
    return view('dashbord');
});



Route::fallback(function () {
    return view('errors.404');
})->name('404');


Route::get('locale/{lange}', [LocalizationController::class, 'setLang']);
Route::fallback(function () {
    return view('errors.404');
})->name('404');







