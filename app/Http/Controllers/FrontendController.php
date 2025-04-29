<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\Marque;
use App\Models\Page;
use App\Models\Post;
use App\Models\Section;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index_page(Request $request)
    {
        $data['header_posts'] = Section::findOrFail(1)->posts()->where(checkPost())->orderBy('order', 'DESC')->take(4)->get();

        $data['category_jatio'] = Category::findOrFail(1);
        $data['category_motamot'] = Category::findOrFail(2);
        $data['category_rajniti'] = Category::findOrFail(3);
        $data['category_saradesh'] = Category::findOrFail(4);
        $data['category_digital'] = Category::findOrFail(5);
        $data['category_antorjatik'] = Category::findOrFail(6);
        $data['category_binodon'] = Category::findOrFail(7);
        $data['category_khela'] = Category::findOrFail(8);
        $data['category_orthoniti'] = Category::findOrFail(9);
        $data['category_corporate'] = Category::findOrFail(10);
        $data['category_campus'] = Category::findOrFail(11);
        $data['category_dhormo'] = Category::findOrFail(12);
        $data['category_sahitto'] = Category::findOrFail(13);
        $data['category_feature'] = Category::findOrFail(14);
        $data['category_tottho'] = Category::findOrFail(15);
        $data['category_lifestyle'] = Category::findOrFail(16);
        $data['category_sastho'] = Category::findOrFail(17);
        $data['category_probash'] = Category::findOrFail(18);
        $data['category_netdonia'] = Category::findOrFail(21);
        $data['category_cakri'] = Category::findOrFail(22);
        $data['category_tour'] = Category::findOrFail(23);
        $data['category_book_review'] = Category::findOrFail(24);
        $data['category_adalat'] = Category::findOrFail(19);
        $data['category_rajdhani'] = Category::findOrFail(25);
        $data['national_post'] = $data['category_jatio']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(5)->get();
        $data['opinion_post'] = $data['category_motamot']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(6)->get();
        $data['international_post'] = $data['category_antorjatik']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(3)->get();
        $data['sports_post'] = $data['category_khela']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(2)->get();
        $data['economy_post'] = $data['category_orthoniti']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(8)->get();
        $data['corporate_post'] = $data['category_corporate']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(2)->get();
        $data['campus_post'] = $data['category_campus']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(2)->get();
        $data['religion_post'] = $data['category_dhormo']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(2)->get();
        $data['book_review_post'] = $data['category_book_review']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(2)->get();
        $data['politics_post'] = $data['category_rajniti']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(5)->get();
        $data['saradesh_post'] = $data['category_saradesh']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(3)->get();
        $data['digital_post'] = $data['category_digital']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(4)->get();
        $data['rajdhani_post'] = $data['category_rajdhani']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(4)->get();
        $data['entertainment_post'] = $data['category_binodon']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(5)->get();
        $data['literature_post'] = $data['category_sahitto']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(4)->get();
        $data['feature_post'] = $data['category_feature']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(4)->get();
        $data['it_post'] = $data['category_tottho']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(4)->get();
        $data['lifestyle_post'] = $data['category_lifestyle']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(4)->get();
        $data['sastho_post'] = $data['category_sastho']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(4)->get();
        $data['probash_post'] = $data['category_probash']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(4)->get();
        $data['adalat_post'] = $data['category_adalat']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(4)->get();
        $data['netdonia_post'] = $data['category_netdonia']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(5)->get();
        $data['cakri_post'] = $data['category_cakri']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(5)->get();
        $data['tour_post'] = $data['category_tour']->posts()->where(checkPost())->orderBy('order', 'DESC')->take(3)->get();

//        if($request->ajax()){
//           $view = view('layouts.partials.home_extra', $data)->render();
//            return response()->json([
//                'home_extra' => $view
//            ]);
//        }
        if (Marque::doesntExist()){
            Marque::create(['type' => 'Active']);
        }
        $data['marque'] = Marque::first();
        return view('frontend.homePage.index', $data);
    }
    public function news_details(Request $request, $id)
    {

        $data['breaking_news'] = Post::where('breaking_news', 1)->orderBy('id','DESC')->take(5)->get();
        $data['news'] = Post::where('id', $id)->firstOrFail();
        if ($request->type != 'admin'){ 
            $data['news']->hit = $data['news']->hit + 1;
            $data['news']->save();
        }
        return view('frontend.news_details.news_details', $data)->withShortcodes();
    }

    public function category_view($slug)
    {
        $data['category'] = Category::where('slug', $slug)->firstOrFail();
        $data['posts'] = $data['category']->posts()->where(checkPost())->orderBy('order', 'DESC')->paginate(12);
        return view('frontend.category_view', $data);
    }

    public function page_view($id)
    {
        $page = Page::findOrFail($id);
        if ($page->status == "Active"){
            return view('frontend.page', compact('page'))->withShortcodes();
        }
        return back();
    }

    public function search(Request $request)
    {
        $posts = Post::where(checkPost())
                ->where('title', 'like', "%" . $request->search . "%")
                ->orWhere('tags', 'like', "%" . $request->search . "%")
                ->paginate(12);

        return view('frontend.search', compact('posts'));
    }

    public function archive(Request $request)
    {
        $posts = Post::where(checkPost())
                ->where('created_at','like', "%" . $request->date . "%")
                ->paginate(16);

        return view('frontend.archive', compact('posts', 'request'));
    }


    public function last_published(Request $request)
    {
        $posts = Post::where([[checkPost()],['latest_news', 1]])->orderBy('id','DESC')->take(12)->get();;
        return view('frontend.last_published', compact('posts'));
    }

    public function printNews($id)
    {
        $news = Post::findOrFail($id);
        return view('frontend.print_news', compact('news'))->withShortcodes();
    }


    public function marque(Request $request)
    {
            $type = 'Active';
            if ($request->type == 'Active'){
                $type = 'In-Active';
            }else{
                $type = 'Active';
            }
            $marque = Marque::findOrFail(1);
            $marque->type = $type;
            $marque->save();
            Toastr::Success('Breaking News Bar ' . $type . ' Successfully', "Success");
            return back();
    }


    public function print_all_news()
    {
        $data['posts'] = Post::all();
        return view('frontend.print_news_all', $data);
    }
}
