<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\ImageGallery;
use App\Models\Marque;
use App\Models\Media;
use App\Models\Page;
use App\Models\Post;
use App\Models\Section;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

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
       $data['header_posts'] = Post::where([[checkPost()],['language', isEnglish()?'en':'bn'],['header_order', '!=', null]])->get();
       $data['cat1'] = $this->getCategoryPosts(1);
       $data['cat2'] = $this->getCategoryPosts(3);
       $data['cat3'] = $this->getCategoryPosts(33);
       $data['cat4'] = $this->getCategoryPosts(11);
       $data['cat5'] = $this->getCategoryPosts(6);
       $data['cat6'] = $this->getCategoryPosts(8);
       $data['cat7'] = $this->getCategoryPosts(31);
       $data['cat8'] = $this->getCategoryPosts(19);
       $data['cat9'] = $this->getCategoryPosts(17);
       $data['cat10'] = $this->getCategoryPosts(4);
       $data['cat11'] = $this->getCategoryPosts(2);
       $data['cat12'] = $this->getCategoryPosts(28);
       $data['cat13'] = $this->getCategoryPosts(13);
       $data['cat14'] = $this->getCategoryPosts(14);
       $data['cat15'] = $this->getCategoryPosts(12);
       $data['cat16'] = $this->getCategoryPosts(9);
       $data['cat17'] = $this->getCategoryPosts(29);
       $data['cat18'] = $this->getCategoryPosts(7);
       $data['cat19'] = $this->getCategoryPosts(22);
       $data['cat20'] = $this->getCategoryPosts(16);
       $data['cat21'] = $this->getCategoryPosts(36);
        return view('frontend.homePage.index', $data);
    }

    function getCategoryPosts($categoryId)
    {
        $posts = DB::table('category_post')
            ->join('posts', 'posts.id', '=', 'category_post.post_id')
            ->leftJoin('media', 'media.id', '=', 'posts.media_id')
            ->leftJoin('users', 'users.id', '=', 'posts.author_id')
            ->where('category_post.category_id', $categoryId)
            ->whereNotNull('category_post.position')
            ->orderBy('category_post.position')
            ->select(
                'category_post.position as position',
                'posts.id',
                'posts.title',
                'posts.sub_headline',
                'posts.subtitle',
                'users.name as author_name',
                'users.designation as author_designation',
                'media.image as image',
                'media.thumbnail as thumbnail',
                'media.xs_thumbnail as xs_thumbnail'
            )
            ->get();

        $result = [];

        foreach ($posts as $post) {
            $result[$post->position] = $post;
        }

        return $result;
    }
//    public function index_page(Request $request)
//    {
//       $data['header_posts'] = Post::where([[checkPost()],['language', isEnglish()?'en':'bn'],['header_order', '!=', null]])->get();
//
//        $data['categories'] = Category::where('status', 'active')
//            ->whereHas('posts', function ($query) {
//                $query->where([[checkPost()],['language', isEnglish()?'en':'bn'],['video_id', null]]); // Filter posts as per your checkPost() logic
//            })->orderBy('order', 'asc')
//            ->get();
//        $data['categories'] = $data['categories']->map(function ($category) {
//            $category->posts = $category->posts()
//                ->select(
//                    'posts.id',
//                    'posts.title',
//                    'posts.slug',
//                    'posts.media_id',
//                    'posts.publishing_date',
//                )
//                ->where([[checkPost()],['language', isEnglish()?'en':'bn'],['video_id', null]])->orderBy('id', 'desc')->take(4)->get();
//            return $category;
//        });
//
//        $data['videos'] = Post::where('video_id', '!=', null)
//            ->where([[checkPost()],['language', isEnglish()?'en':'bn']])
//            ->orderBy('order', 'DESC')
//            ->take(4)
//            ->get();
//
//        $data['photos'] = ImageGallery::where('status', 'Active')->orderby('order', 'DESC')->take(5)->get();
//
//        $placementIds = [1, 2, 3, 4, 5, 6];
//        $ads = Ad::whereIn('placement_id', $placementIds)->where('status', 'Active')->get()->keyBy('placement_id');
//
//        $data['ad1'] = $ads[1] ?? null;
//        $data['ad2'] = $ads[2] ?? null;
//        $data['ad3'] = $ads[3] ?? null;
//        $data['ad4'] = $ads[4] ?? null;
//        $data['ad5'] = $ads[5] ?? null;
//        $data['ad6'] = $ads[6] ?? null;
//        return view('frontend.homePage.index', $data);
//    }


    public function contact_us()
    {
        return view('frontend.contact_us');
    }
    public function news_details(Request $request, $id)
    {

        if (auth()->check()){
            if (auth()->user()->role_id==1){
                $data['news'] = Post::where('id', $id)->firstOrFail();
            }
            if (auth()->user()->role_id==2){
                $data['news'] = Post::where([[checkPost()],['id', $id], ['language', isEnglish()?'en':'bn']])->orWhere('author_id', auth()->id())->first();
                if (!$data['news']) {
                    if (isEnglish()){
                        return redirect()->route('index_page')->with('error', 'This News is Not Available Please Read Another News');
                    }else{
                        return redirect()->route('index_page')->with('error', 'এই সংবাদটি উপলব্ধ নয় দয়া করে অন্য সংবাদ পড়ুন');
                    }
                }
            }
        }else{
            $data['news'] = Post::where([[checkPost()],['id', $id], ['language', isEnglish()?'en':'bn']])->first();
            if (!$data['news']) {
                if (isEnglish()){
                    return redirect()->route('index_page')->with('error', 'This News is Not Available Please Read Another News');
                }else{
                    return redirect()->route('index_page')->with('error', 'এই সংবাদটি উপলব্ধ নয় দয়া করে অন্য সংবাদ পড়ুন');
                }
            }
        }




        if ($data['news']->video_id != null) {
            return redirect(route('video_details', ['id' => $data['news']->id, 'slug' => $data['news']->slug]));
        }
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
        $data['ad1'] = Ad::where('placement_id', 8)->where('status', 'Active')->first();
        $data['ad2'] = Ad::where('placement_id', 9)->where('status', 'Active')->first();
        $data['ad3'] = Ad::where('placement_id', 10)->where('status', 'Active')->first();
        $data['post_categories'] = $data['news']->categories()
            ->select('categories.id', 'categories.name', 'categories.slug')
            ->get();
        return view('frontend.news_details.news_details', $data)->withShortcodes();
    }

    public function submit_message(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        $contact = new ContactMessage();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        if(isEnglish()) {
        return back()->with('success', 'Message Sent Successfully, We will contact you soon');
        }else{
            return back()->with('success', 'বার্তা সফলভাবে পাঠানো হয়েছে, আমরা শীঘ্রই আপনার সাথে যোগাযোগ করব');
        }
    }

    public function author_news($id)
    {
        $data['author'] = User::where([['id', $id], ['role_id', 2]])->firstOrFail();
        if(!$data['author']){
            Toastr::error('AuthorMiddleware Not Found', 'Error');
            return back();
        }
        $data['news'] = Post::select(
            'posts.id',
            'posts.title',
            'posts.slug',
            'posts.media_id',
            'posts.subtitle',
        )->where('author_id', $id)
            ->where([[checkPost()], ['language', isEnglish() ? 'en' : 'bn']])
            ->orderBy('order', 'DESC')
            ->paginate(8);
        $data['side_ad'] = Ad::where('placement_id', 13)->where('status', 'Active')->first();
        return view('frontend.author_news', $data);
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

    public function photos()
    {
        $data['photos'] = ImageGallery::where('status', 'Active')->orderby('order', 'DESC')->paginate(13);
        return view('frontend.photos', $data);
    }
    public function photo_details($id)
    {
        $data['photo'] = ImageGallery::with('gallery_images')->where('id', $id)->first();
        $data['side_ad'] = Ad::where('placement_id', 15)->where('status', 'Active')->first();
        return view('frontend.photo_details', $data);
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

        $data['category_top_ad'] = Ad::where('placement_id', 7)->where('status', 'Active')->first();
        return view('frontend.category_view', $data);
    }

    public function page_view($id)
    {
        $page = Page::findOrFail($id);
        $side_news = Section::findOrFail(1)->posts()
            ->select(
                'posts.id',
                'posts.order',
                'posts.title',
                'posts.slug',
                'posts.media_id',
                'posts.publishing_date',
            )
            ->where([[checkPost()],['language', isEnglish()?'en':'bn']])->orderBy('order', 'DESC')->take(3)->get();
        if ($page->status == "Active"){
            if ($page->id == 1){
                $ad1 = Ad::where('placement_id', 11)->where('status', 'Active')->first();
                $ad2 = Ad::where('placement_id', 12)->where('status', 'Active')->first();
                return view('frontend.about_us', compact('page', 'ad1', 'ad2', 'side_news'))->withShortcodes();
            }
            $side_ad = Ad::where('placement_id', 14)->where('status', 'Active')->first();
            return view('frontend.page', compact('page', 'side_ad', 'side_news'))->withShortcodes();
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
        $posts = Post::select(
            'posts.id',
            'posts.title',
            'posts.slug',
            'posts.media_id',
            'posts.publishing_date',
        )->where(checkPost())
                ->where('created_at','like', "%" . $request->date . "%")
                ->where('language', isEnglish() ? 'en' : 'bn')
                ->paginate(16);

        return view('frontend.archive', compact('posts', 'request'));
    }


    public function last_published()
    {
        $page_title = 'latest';
        $posts = Post::where([[checkPost()],['latest_news', 1], ['language', isEnglish()?'en':'bn']])->orderBy('id','DESC')->paginate(12);
        return view('frontend.last_published', compact('posts', 'page_title'));
    }

    public function most_read()
    {
        $page_title = 'most_read';
        $posts = Post::where([[checkPost()], ['language', isEnglish()?'en':'bn']])->orderBy('hit','DESC')->paginate(12);
        return view('frontend.last_published', compact('posts', 'page_title'));
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
