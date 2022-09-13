<?php

namespace App\Http\Controllers;

use App\Models\AcType;
use App\Models\AppSlider;
use Illuminate\Http\Request;

/** models */
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\AcTitle;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $services = Service::where('status', true)->latest()->limit(3)->get();
        $blogs = Blog::where('status', true)->latest()->limit(3)->get();
        $sliders = AppSlider::where('status', true)->latest()->get();
        $testimonials = Testimonial::where('status', true)->latest()->get();
        $actypes = AcType::where('status', true)->get();



        $data = compact('services', 'blogs', 'sliders', 'testimonials', 'actypes');

        return view('home')->with($data);
    }


    /**
     * 
     * =============   Show News Page    ===============
     * 
     */
    public function showNewsPage()
    {
        $blogs = Blog::where('status', true)->latest()->paginate(20);

        $data = compact('blogs');

        return view('news')->with($data);
    }



    /**
     * 
     * =============   Show Blog details    ===============
     * 
     */
    public function showPost(Request $request)
    {
        $key = $request->key;

        if($blog = Blog::with('comments')->find($key))
        {
            $recentPosts = Blog::where('id', '!=', $key)->latest()->limit(3)->get();
            $categories = Category::latest()->limit(5)->get();

            $data = compact('blog', 'recentPosts', 'categories');

            return view('blog-details')->with($data);
        }
        return redirect()->back();
        
    }



    /**
     * 
     * =============   Show details    ===============
     * 
     */
    public function showDetails(Request $request)
    {
        $key = $request->key;

        $row = AcTitle::with('actype')->find($key);

        return view('details')->with(compact('row'));       
    }
    
    
    
    
    /**
     * 
     * =============   Show Account details    ===============
     * 
     */
    public function showAcDetails(Request $request)
    {
        $key = $request->key;

        $blog = AcType::where('slug', $key)->first();
        
        $subtitle = $key;
        $recentPosts = Blog::where('id', '!=', $key)->latest()->limit(3)->get();
        $categories = Category::latest()->limit(5)->get();
        
        $data = compact('blog', 'subtitle', 'recentPosts', 'categories');

        return view('details2')->with($data);       
    }




    /**
     * 
     * =============   Show account opening    ===============
     * 
     */
    public function showAccountItems()
    {
        $data = AcType::where('ac_title_id', 4)->get();

        return view('ac-opening-details')->with(['data' => $data]);
    }



    /**
     * 
     * =============   Show Blog by category    ===============
     * 
     */
    public function showPostByCategory(Request $request)
    {
        $cat = $request->category;
        
        if($cat = Category::where('slug', $cat)->first())
        {
            $subtitle = $cat->category_name;
            $blogs = Blog::with('comments')->where('category_id', $cat->id)->latest()->paginate();
            $data = compact('blogs', 'subtitle');

            return view('news')->with($data);            
        }

        return redirect()->back();
        
        
    }




    /**
     * 
     * =============   store blog comment    ===============
     * 
     */
    public function storeComment(Request $request)
    {
        $key    = $request->key;
        $name   = $request->name;
        $email  = $request->email;
        $comment= $request->message;

        Comment::create([
            'blog_id'       =>      $key,
            'name'          =>      $name,
            'email'         =>      $email,
            'comment'       =>      $comment,
        ]);

        return redirect()->back()->with('success', 'Commented Successfully');
    }




    /**
     * 
     * =============   Serach Item    ===============
     * 
     */
    public function searchItem(Request $request)
    {
        $keyword = strtolower(trim($request->keyword));
        

        $blogs = Blog::where('title', 'LIKE', "%{$keyword}%")
                    ->orWhere('content', 'LIKE', "%{$keyword}%")
                    ->paginate(10);

        $services = Service::where('title', 'LIKE', "%{$keyword}%")
                    ->orWhere('content', 'LIKE', "%{$keyword}%")
                    ->paginate(10);

        $subtitle = 'Search Result';

        $data = compact('blogs', 'services', 'subtitle');

        return view('news')->with($data);
    }




    /**
     * 
     * =============   Show Service    ===============
     * 
     */
    public function showService($key)
    {
        if($row = Service::find($key))
        {
            return view('service')->with(compact('row'));
        }

        return back();
    }



    /**
     * 
     * =============   Show Story    ===============
     * 
     */
    public function showStory()
    {
        $stories = Service::where('status', true)->latest()->get();

        return view('story')->with(compact('stories'));
    }
}
