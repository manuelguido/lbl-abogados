<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Topic;
use App\FAQ;
use App\Person;
use App\Message;

class PublicController extends Controller
{
    public function showHome()
    {
        return view('home',[
            'news' => DB::table('posts')->orderByRaw('date DESC')->limit(4)->get(),
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
            'time' => 'required|integer',
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'string',
            'message' => 'required|string',
        ]);
        if(($data->time < 1)or(!isset($data->time)))
        {
            dd($data->time);
            return redirect()->back();
        }
        else
        {
            $message = new Message;
            $message->name = $data->name;
            $message->email = $data->email;
            $message->phone = $data->phone;
            $message->message = $data->message;
            $message->is_read = 0;
            $message->save();
            return redirect()->back()->with('success', 'Mensaje enviado');
        }
    }
}
