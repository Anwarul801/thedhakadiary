<?php

use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\AuthSettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MarqueController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PhotoGalleryController;
use App\Http\Controllers\Admin\PollController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageGalleryController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
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

Route::get('/set-publishing-dates/{password}', function () {
    $posts = Post::all();
    foreach ($posts as $post) {
        $post->updating_date = $post->updated_at->format('Y-m-d\TH:i');
        $post->save();
    }
    return 'All publishing_date fields have been updated successfully!';
});

Route::get('/', [FrontendController::class, 'index_page'])->name('index_page');
Route::get('/change_lang', [FrontendController::class, 'change_lang'])->name('change_lang');
Route::get('/contact_us', [FrontendController::class, 'contact_us'])->name('contact_us');
Route::post('/submit_message', [FrontendController::class, 'submit_message'])->name('submit_message');
Route::get('/photos', [FrontendController::class, 'photos'])->name('photos');
Route::get('/photo_details/{id}/{slug?}', [FrontendController::class, 'photo_details'])->name('photo_details');
Route::get('/videos', [FrontendController::class, 'videos'])->name('videos');
Route::get('/author/news/{id}/{name?}', [FrontendController::class, 'author_news'])->name('author_news');
Route::get('/news/{id}/{slug?}', [FrontendController::class, 'news_details'])->name('news_details');
Route::get('/news/videos/{id}/{slug?}', [FrontendController::class, 'video_details'])->name('video_details');
Route::get('/pages/{id}/{slug?}', [FrontendController::class, 'page_view'])->name('page_view');
Route::get('/category/{slug}', [FrontendController::class, 'category_view'])->name('category_view');
Route::get('/search/', [FrontendController::class, 'search'])->name('search');
Route::get('/archive/', [FrontendController::class, 'archive'])->name('archive');
Route::get('/generate_photo_cut/{id}', [PostController::class, 'generate_photo_cut'])->name('generate_photo_cut');
Route::get('/print_news/{id}', [FrontendController::class, 'printNews'])->name('print_news');
Route::get('/print_all_news', [FrontendController::class, 'print_all_news'])->name('post.print_all');
Route::get('/last_published/', [FrontendController::class, 'last_published'])->name('last_published');
Route::get('/most_read', [FrontendController::class, 'most_read'])->name('most_read');
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/post', PostController::class)->middleware('author');
Route::resource('/image_gallery', ImageGalleryController::class)->middleware('author');
Route::post('/tinymce/upload', [\App\Http\Controllers\Admin\MediaController::class, 'tinymceUpload'])->name('tinymce.upload')->middleware('author');
Route::middleware('admin')->group(function (){
Route::resource('/user', UserController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/page', PageController::class);
Route::resource('/media', MediaController::class);
Route::resource('/photo_gallery', PhotoGalleryController::class);
Route::resource('/type', TypeController::class);
Route::resource('/author', AuthorController::class);
Route::resource('/poll', PollController::class);
Route::resource('/options', OptionController::class);
Route::resource('/menu', MenuController::class);
//Route::resource('/ad', AdController::class);
Route::resource('/contact_message', ContactMessageController::class);
Route::get('image_gallery_status_change', [ImageGalleryController::class, 'table_status_change'])->name('image_gallery_status_change');
Route::get('/status_change/', [PostController::class, 'status_change'])->name('status_change');

Route::delete('/contact-messages/bulk-delete', [ContactMessageController::class, 'bulkDelete'])->name('contact_message.bulk_delete');
Route::delete('/contact-messages/all-delete', [ContactMessageController::class, 'allDelete'])->name('contact_message.all_delete');

Route::get('/marque', [FrontendController::class, 'marque'])->name('marque');
Route::get('/category_status_change', [CategoryController::class, 'category_status_change'])->name('category_status_change');


});

Route::resource('/auth_setting', AuthSettingController::class);

Route::post('/vote/{id}', [PollController::class, 'poll_update'])->name('vote');
