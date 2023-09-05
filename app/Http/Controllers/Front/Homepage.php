<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Config;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Models\Page;
use App\Models\Models\Contact;
use Illuminate\Support\Facades\Mail;

class Homepage extends Controller
{
    public function __construct()
    {
        if (Config::find(1)->active==0)
        {
            return redirect()->to('site-bakimda')->send();
        }
        view()->share('pages', Page::where('status',1)->orderBy('created_at', 'DESC')->get());
        view()->share('categories', Category::where('status',1)->inRandomOrder()->get());
    }

    public function index()
    {
        $data['articles'] = Article::with('getCategory')->where('status', 1)->whereHas('getCategory', function ($query) {
$query->where('status',1);
            })->orderBy('created_at', 'DESC')->paginate(10);

        $data['articles']->withPath(url('yazılar/sayfa'));
        /*$data['categories'] = Category::inRandomOrder()->get();
        $data['pages'] = Page::orderBy('order', 'ASC')->get();*/
        return view('front.homepage', $data);
    }

    public function single($category, $slug)
    {
        $category = Category::whereSlug($category)->first() ?? abort(403, 'Böyle bir kategori bulunamadı');
        $article = Article::whereSlug($slug)->whereCategoryId($category->id)->first() ?? abort(403, 'Böyle bir yazı bulunamadı');
        $article->increment('hit');
        $data['article'] = $article;
        $data['categories'] = Category::inRandomOrder()->get();
        return view('front.single', $data);
    }

    public function category($slug)
    {
        $category = Category::whereSlug($slug)->first() ?? abort(403, 'Böyle bir kategori yok :(');
        $data['category'] = $category;
        $data['articles'] = Article::where('category_id', $category->id)->where('status',1)->orderBy('created_at', 'DESC')->paginate(1);
        $data['categories'] = Category::inRandomOrder()->get();
        return view('front.category', $data);
    }

    public function page($slug)
    {
        $page = Page::whereSlug($slug)->first() ?? abort(403, 'Böyle bir sayfa bulunamadı');
        $data['page'] = $page;
        $data['pages'] = Page::orderBy('order', 'ASC')->get();
        return view('front.page', $data);
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function contactpost(Request $request)
    {
        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'topic' => 'required',
            'message' => 'required|min:10',
        ];
        $validate = Validator::make($request->post(), $rules);
        if ($validate->fails()) {
            return redirect()->route('contact')->withErrors($validate)->withInput();
        }
        Mail::raw(' Mesajı Gönderen : '.$request->name.'
                         Mesajı Gönderen Mail : '.$request->email.'
                         Mesajın Konusu : '.$request->topic.'
                         Mesaj : '.$request->message.'
                         Mesajın Gönderilme Tarihi : '.now().' ',function ($message) use($request){
           $message->from('iletisim@blogg.com','Blog Sitesi');
           $message->to('halimehh89@gmail.com');
           $message->subject($request->name. ' mesajın varr🔔');
        });

/*
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->topic = $request->topic;
        $contact->message = $request->message;
        $contact->save();*/
        return redirect()->route('contact')->with('success', 'Mesajın bize iletildi 🙈');
    }
}
