<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Topic;
use App\FAQ;
use App\Person;

class PublicController extends Controller
{
    public function showHome()
    {
        return view('home',[
            'news' => DB::table('posts')->orderByRaw('date DESC')->limit(8)->get(),
            'areas' => DB::table('areas')->orderByRaw('area_id DESC')->get(),
            'faqs' => FAQ::allWithTopicsOrdered(),
            'topics' => Topic::allOrdered(),
            ]);
    }

    public function showContact()
    {
        return view('contact');
    }
    
    public function showNews()
    {
        return view('news',[
            'news' => DB::table('posts')->orderByRaw('post_id DESC')->get()
        ]);
    }
    
    public function showNew($id)
    {
        $new = DB::table('posts')->where('post_id', $id)->get();
        return view('new',
            ['new' => $new->first()]);
    }

    public function showFaqs()
    {
        return view('faqs',[
            'topics' => Topic::allOrdered(),    
            'faqs' => FAQ::allWithTopicsOrdered()
        ]);
    }
    
    public function showFaq($id)
    {
        return view('faq',[
            'faq' => FAQ::getWithTopic($id)->first()
        ]);
    }

    public function showAboutUs()
    {
        return view('about_us', [
            'people' => Person::all(),
        ]);
    }

    public function newMessage(Request $data)
    {
        $this->validate($data, [
            'name' => ['required', 'string', 'max:60'],
            'email' => ['required', 'string', 'max:60'],
            'phone' => ['string', 'max:40'],
            'message' => ['required', 'string'],
        ]);
        DB::table('messages')->insert(
            ['email' => $data->email, 'phone' => $data->phone, 'name' => $data->name, 'message' => $data->message, 'is_read' => 0]
        );   
        return redirect()->back()->with('success', 'Mensaje enviado');
    }
}
