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
    public function change_lang()
    {
        $locale = session('locale') === 'en' ? 'bn' : 'en';
        session(['locale' => $locale]);
        return back();
    }
    public function index_page(Request $request)
    {
       $data['header_posts'] = Section::findOrFail(1)->posts()
            ->select(
                'posts.id',
                'posts.order',
                'posts.title',
                'posts.slug',
                'posts.subtitle',
                'posts.media_id',
                'posts.publishing_date',
            )
            ->where([[checkPost()],['language', isEnglish()?'en':'bn']])->orderBy('order', 'DESC')->take(6)->get();

        $data['categories'] = Category::where('status', 'active')
            ->whereHas('posts', function ($query) {
                $query->where([[checkPost()],['language', isEnglish()?'en':'bn'],['video_id', null]]); // Filter posts as per your checkPost() logic
            })
            ->get();
        $data['categories'] = $data['categories']->map(function ($category) {
            $category->posts = $category->posts()
                ->select(
                    'posts.id',
                    'posts.title',
                    'posts.slug',
                    'posts.media_id',
                    'posts.publishing_date',
                )
                ->where([[checkPost()],['language', isEnglish()?'en':'bn'],['video_id', null]])->take(4)->get();
            return $category;
        });

        $data['videos'] = Post::where('video_id', '!=', null)
            ->where([[checkPost()],['language', isEnglish()?'en':'bn']])
            ->orderBy('order', 'DESC')
            ->take(4)
            ->get();


        return view('frontend.homePage.index', $data);
    }
    public function news_details(Request $request, $id)
    {
        $data['news'] = Post::where('id', $id)->firstOrFail();

        if ($request->type != 'admin') {
            $data['news']->increment('hit');
        }

        // Related post নেয়ার লজিক
        $categories = $data['news']->categories()->inRandomOrder()->get();

        $related = collect();

        foreach ($categories as $category) {
            $posts = $category->posts()
                ->select('posts.id', 'posts.slug', 'posts.title')
                ->where('posts.id', '!=', $data['news']->id)
                ->where([[checkPost()], ['posts.language', isEnglish() ? 'en' : 'bn']])
                ->latest()
                ->take(5)
                ->get();

            if ($posts->isNotEmpty()) {
                $related = $posts;
                break;
            }
        }

        $data['related_post'] = $related;

        return view('frontend.news_details.news_details', $data)->withShortcodes();
    }


    public function videos()
    {
        $data['videos'] = Post::select(
            'posts.id',
            'posts.title',
            'posts.slug',
            'posts.media_id',
            'posts.video_duration',
        )->where('video_id', '!=', null)
            ->where([[checkPost()], ['language', isEnglish() ? 'en' : 'bn']])
            ->orderBy('order', 'DESC')
            ->paginate(20);
        return view('frontend.videos', $data);
    }
    public function video_details(Request $request, $id)
    {
        $data['news'] = Post::where('id', $id)->firstOrFail();
        if ($request->type != 'admin') {
            $data['news']->increment('hit');
        }
        $data['latest_videos'] = Post::where([[checkPost()], ['video_id', '!=', null], ['language', isEnglish() ? 'en' : 'bn'], ['id', '!=', $id]])
            ->select(
                'posts.id',
                'posts.title',
                'posts.slug',
                'posts.media_id',
                'posts.video_duration',
            )
            ->orderBy('id', 'DESC')
            ->take(4)
            ->get();
        return view('frontend.news_details.video_details', $data)->withShortcodes();
    }


    public function category_view($slug)
    {
        $data['category'] = Category::where('slug', $slug)->firstOrFail();
        $data['posts'] = $data['category']->posts()
            ->select(
                'posts.id',
                'posts.title',
                'posts.slug',
                'posts.media_id',
                'posts.publishing_date',
                'posts.created_at',
                'posts.updated_at'
            )
            ->where([[checkPost()], ['language', isEnglish()?'en':'bn']])
            ->orderBy('order', 'DESC')
            ->paginate(20);
        $data['last_post'] = $data['category']->posts()
            ->select(
                'posts.created_at',
                'posts.updated_at'
            )
            ->where([[checkPost()], ['language', isEnglish() ? 'en' : 'bn']])
            ->orderBy('id', 'DESC')
            ->first();
        return view('frontend.category_view', $data);
    }

    public function page_view($id)
    {
        $page = Page::findOrFail($id);
        if ($page->status == "Active"){
            if ($page->id == 1){
                return view('frontend.about_us', compact('page'))->withShortcodes();
            }
            return view('frontend.page', compact('page'))->withShortcodes();
        }
        return back();
    }

    public function search(Request $request)
    {
        $posts = Post::where(checkPost())
            ->select(
                'posts.id',
                'posts.title',
                'posts.slug',
                'posts.media_id',
                'posts.publishing_date',
            )
                ->where([['title', 'like', "%" . $request->search . "%"], ['language', isEnglish() ? 'en' : 'bn'], [checkPost()]])
                ->orWhere([['tags', 'like', "%" . $request->search . "%"], ['language', isEnglish() ? 'en' : 'bn'], [checkPost()]])
                ->paginate(20);

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
        $posts = Post::where([[checkPost()],['latest_news', 1]])->orderBy('id','DESC')->take(12)->get();
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
