<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Area;
use App\Post;
use App\User;
use App\Message;
use Hash;
use Auth;
use App\Topic;
use App\FAQ;
use App\SiteConfig;
use Storage;
use Str;
use App\Person;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    /*--------------------------------------------------------------
        Home Page
    --------------------------------------------------------------*/
    public function showHome()
    {
        return view('admin/panel_home');
    }

    public function modifyHome()
    {
        notify()->success('Datos guardados con exito.');
        return redirect()->back();
    }

    /*--------------------------------------------------------------
        About Us Page
    --------------------------------------------------------------*/
    public function showAboutUs()
    {
        return view('admin/panel_about_us');
    }
    
    public function modifyAboutUs()
    {
        notify()->success('Datos guardados con exito.');
        return redirect()->back();
    }

    /*--------------------------------------------------------------
        Contact Page
    --------------------------------------------------------------*/
    public function showContact()
    {
        return view('admin/panel_contact');
    }

    public function modifyContact()
    {
        notify()->success('Datos guardados con exito.');
        return redirect()->back();
    }

    /*--------------------------------------------------------------
        Topics Page
    --------------------------------------------------------------*/
    public function showTopics()
    {
        $topics = Topic::all();
        return view(
            'admin/panel_topics',
            ['topics' => $topics]
        );
    }

    public function createTopic(Request $data)
    {
        $this->validate($data, [
            'topic_name' => ['required', 'string', 'max:100'],
        ]);

        DB::table('topics')->insert(
            ['topic_name' => $data->topic_name]
        );
        
        return redirect()->back()->with('success', 'Tema guardado con éxito.');
    }

    public function updateTopic(Request $data, $id)
    {
        $this->validate($data, [
            'topic_name' => ['required', 'string', 'max:100'],
        ]);
        DB::table('topics')
            ->where('topic_id', $id)
            ->update(['topic_name' => $data->topic_name]);
        
        return redirect()->back()->with('success', 'Tema actualizado con éxito.');
    }

    public function deleteTopic($id)
    {
        $faqs = DB::table('faqs')
            ->where('faqs.topic_id', $id)
            ->get();
        if (count($faqs) == 0) {
            DB::table('topics')->where('topic_id', '=', $id)->delete();
            return redirect()->back()->with('success', 'Tema eliminado con éxito!');
        }
        else {
            return redirect()->back()->with('error', 'No se puede eliminar, hay preguntas que tienen este tema asignado.');   
        }
    }


    /*--------------------------------------------------------------
        Areas Page
    --------------------------------------------------------------*/
    public function showAreas()
    {
        $areas = Area::all();
        return view(
            'admin/panel_areas',
            ['areas' => $areas]
        );
    }

    public function createArea(Request $data)
    {
        $this->validate($data, [
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string'],
        ]);

        DB::table('areas')->insert(
            ['title' => $data->title, 'description' => $data->description]
        );
        
        return redirect()->back()->with('success', 'Área guardada con éxito.');
    }

    public function showModifyArea($id)
    {
        $faq = Area::where('area_id', $id)->limit(1)->get();
        return view('admin/panel_modify_area',[
            'area' => $faq->first()
            ]);
    }

    public function updateArea(Request $data, $id)
    {
        $this->validate($data, [
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string'],
        ]);
        DB::table('areas')
            ->where('area_id', $id)
            ->update(['title' => $data->title, 'description' => $data->description]);
        
        return redirect()->back()->with('success', 'Área actualizada con éxito.');
    }

    public function deleteArea($id)
    {
        DB::table('areas')->where('area_id', '=', $id)->delete();
        return redirect()->back()->with('success', 'Área eliminada con éxito.');
    }

    /*--------------------------------------------------------------
        FAQ Page
    --------------------------------------------------------------*/
    public function showFaqs()
    {
        return view(
            'admin/panel_faqs',[
                'faqs' => FAQ::allWithTopics(),
                'topics' => Topic::all(),
            ]);
    }

    public function createFaq(Request $data)
    {
        $this->validate($data, [
            'question' => ['required', 'string', 'max:200'],
            'answer' => ['required', 'string'],
            'topic_id' => ['required'],
        ]);

        if(isset($data->in_home)) {
            if ($data->in_home <> 0 and $data->in_home <> 1)
                abort(404);
            $in_home = 1;
        }
        else {
            $in_home = 0;
        }

        DB::table('faqs')->insert([
            'question' => $data->question,
            'answer' => $data->answer,
            'in_home' => $in_home,
            'topic_id' => $data->topic_id
        ]);
        
        return redirect()->back()->with('success', 'Pregunta frecuente guardada con éxito.');
    }

    public function showModifyFaq($id)
    {
        $faq = FAQ::where('faq_id', $id)->limit(1)->get();
        return view('admin/panel_modify_faq',[
            'faq' => $faq->first(),
            'topics' => Topic::all(),
            ]);
    }

    public function updateFaq(Request $data, $id)
    {
        $this->validate($data, [
            'question' => ['required', 'string', 'max:200'],
            'answer' => ['required', 'string'],
            'topic_id' => ['required'],
        ]);

        if(isset($data->in_home)) {
            if ($data->in_home <> 0 and $data->in_home <> 1)
                abort(404);
            $in_home = 1;
        }
        else {
            $in_home = 0;
        }
        
        DB::table('faqs')
            ->where('faq_id', $id)
            ->update([
                'question' => $data->question,
                'answer' => $data->answer,
                'in_home' => $in_home,
                'topic_id' => $data->topic_id
            ]);
        
        return redirect()->back()->with('success', 'Pregunta frecuente actualizada con éxito.');
    }

    public function deleteFaq($id)
    {
        DB::table('faqs')->where('faq_id', '=', $id)->delete();
        return redirect()->back()->with('success', 'Pregunta frecuente eliminada con éxito.');
    }

    /*--------------------------------------------------------------
        Posts
    --------------------------------------------------------------*/
    public function showNewPost()
    {
        return view('admin/panel_new_post');
    }
    
    public function showModifyPost($id)
    {
        $post = Post::where('post_id', $id)->limit(1)->get();
        return view(
                'admin/panel_modify_post',
                ['post' => $post->first()]
            );
    }

    public function showPosts()
    {
        //->format('Y-m-d');
        $posts = DB::table('posts')->select('post_id', 'title', 'date')->orderByRaw('post_id DESC')->get();
        return view(
            'admin/panel_posts',
            ['posts' => $posts]
        );
    }
    
    public function createPost(Request $data)
    {
        $this->validate($data, [
            'area' => ['required', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:100'],
            'date' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string'],
        ]);
        DB::table('posts')->insert(
            ['area' => $data->area, 'title' => $data->title, 'description' => $data->description, 'date' => $data->date]
        );   
        return redirect()->back()->with('success', 'Noticia creada con éxito.');
    }
    
    public function updatePost(Request $data, $id)
    {
        $this->validate($data, [
            'area' => ['required', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string'],
        ]);
        DB::table('posts')
            ->where('post_id', $id)
            ->update(['area' => $data->area, 'title' => $data->title, 'description' => $data->description]);

        return redirect()->back()->with('success', 'Noticia actualizada con éxito.');
    }

    public function deletePost($id)
    {
        DB::table('posts')->where('post_id', '=', $id)->delete();
        return redirect()->back()->with('success', 'Noticia eliminada con éxito.');
    }

    /*--------------------------------------------------------------
        Messages
    --------------------------------------------------------------*/
    public function showMessages()
    {
        $messages = Message::orderBy('created_at', 'DESC')->get();
        return view('admin/panel_messages',[
            'messages' => $messages,
        ]);
    }
    
    public function showMessage($id)
    {
        $message = Message::where('messages.id', '=', $id)->get()->first();
        return view('admin/panel_message',[
            'message' => $message,
        ]);
    }

    public function readMessage($id)
    {   
        $message = Message::where('messages.id', '=', $id)->get()->first();
        if($message->is_read == 1) {
            $message->is_read = 0;
            $txt= ' no ';
        }
        else {
            $message->is_read = 1;
            $txt= '';
        }
        $message->save();

        return redirect()->back()->with('success', 'Mensaje marcado como'.$txt.' leído.');
    }

    public function deleteMessage($id)
    {
        DB::table('messages')->where('id', '=', $id)->delete();
        return redirect()->back()->with('success', 'Mensaje eliminado con éxito.');
    }
    
    /*--------------------------------------------------------------
        Profile
    --------------------------------------------------------------*/   
    public function showProfile()
    {
        return view('admin/panel_profile');
    }
    
    public function updateProfile(Request $data)
    {   
        $this->validate($data, [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100',],
        ]);
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['name' => $data->name, 'email' => $data->email]);
        
        return redirect()->back()->with('success', 'Perfil guardado');
    }
    
    public function updatePassword(Request $data)
    {
        $this->validate($data, [
            'new_password' => ['required', 'string'],
            'new_password' => ['required', 'string'],
            'new_password_repeat' => ['required', 'string'],
        ]);
        $user = User::where('id', Auth::user()->id)->limit(1)->get();
        //Contraseña erronea
        if (!(Hash::check($data->password, $user->first()->password))){
            return redirect()->back()->with('error', 'Ingresaste mal tu contraseña actual.');
        }
        //Contraseñas no coinciden
        else if ($data->new_password <> $data->new_password_repeat) {
            return redirect()->back()->with('error', 'Las nuevas contraseñas no coinciden.');
        }
        else {
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(['password' => Hash::make($data->new_password)]);
            return redirect()->back()->with('success', 'Contraseña actualizada con éxito.');
        }
    }

    /*--------------------------------------------------------------
        Users
    --------------------------------------------------------------*/
    public function showUsers()
    {
        $users = User::all();
        return view(
            'admin/panel_users',
            ['users' => $users]
        );
    }

    public function createUser(Request $data) {
        $this->validate($data, [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string'],
            'password_repeat' => 'required',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => 1,
        ]);

        return redirect()->back()->with('success', 'Nuevo usuario creado.');
    }


    /*--------------------------------------------------------------
        Site Info
    --------------------------------------------------------------*/
    public function showInfo(){
        $site_config = DB::table('site_configs')->where('id', 1)->get()->first();
        return view(
            'admin/panel_info',
            ['site_config' => $site_config]
        );
    }

    public function updateInfo(Request $request){
        $site_config = SiteConfig::all()->where('id', 1)->first();
        
        //Chequear que se haya enviado
        if(isset($request->home)) {
            $this->validate($request, [
                'home' => 'file|image|mimes:jpeg,png,gif,jpg',
            ]);
            
            //Eliminar actual
            Storage::delete(SiteConfig::IMAGES_PATH.$site_config->home_img);
            
            //Store nueva
            $main = $request->file('home');
            $fileName = Str::random().time().'.'.$main->getClientOriginalExtension(); // Generate a file name with extension
            $path = $main->storeAs(SiteConfig::IMAGES_PATH, $fileName);

            //Almacenar nueva en base
            $site_config->home_img = substr($path, 13);
        }

        //Chequear que se haya enviado
        if(isset($request->contact)) {
            $this->validate($request, [
                'contact' => 'file|image|mimes:jpeg,png,gif,jpg',
            ]);
            
            //Eliminar actual
            Storage::delete(SiteConfig::IMAGES_PATH.$site_config->contact_img);
            
            //Store nueva
            $main = $request->file('contact');
            $fileName = Str::random().time().'.'.$main->getClientOriginalExtension(); // Generate a file name with extension
            $path = $main->storeAs(SiteConfig::IMAGES_PATH, $fileName);

            //Almacenar nueva en base
            $site_config->contact_img = substr($path, 13);
        }

        //Chequear que se haya enviado
        if(isset($request->news)) {
            $this->validate($request, [
                'news' => 'file|image|mimes:jpeg,png,gif,jpg',
            ]);
            
            //Eliminar actual
            Storage::delete(SiteConfig::IMAGES_PATH.$site_config->news_img);
            
            //Store nueva
            $main = $request->file('news');
            $fileName = Str::random().time().'.'.$main->getClientOriginalExtension(); // Generate a file name with extension
            $path = $main->storeAs(SiteConfig::IMAGES_PATH, $fileName);

            //Almacenar nueva en base
            $site_config->news_img = substr($path, 13);
        }

        //Chequear que se haya enviado
        if(isset($request->faqs)) {
            $this->validate($request, [
                'faqs' => 'file|image|mimes:jpeg,png,gif,jpg',
            ]);
            
            //Eliminar actual
            Storage::delete(SiteConfig::IMAGES_PATH.$site_config->faqs_img);
            
            //Store nueva
            $main = $request->file('faqs');
            $fileName = Str::random().time().'.'.$main->getClientOriginalExtension(); // Generate a file name with extension
            $path = $main->storeAs(SiteConfig::IMAGES_PATH, $fileName);

            //Almacenar nueva en base
            $site_config->faqs_img = substr($path, 13);
        }

        //Chequear que se haya enviado
        if(isset($request->about_us)) {
            $this->validate($request, [
                'about_us' => 'file|image|mimes:jpeg,png,gif,jpg',
            ]);
            
            //Eliminar actual
            Storage::delete(SiteConfig::IMAGES_PATH.$site_config->about_us_img);
            
            //Store nueva
            $main = $request->file('about_us');
            $fileName = Str::random().time().'.'.$main->getClientOriginalExtension(); // Generate a file name with extension
            $path = $main->storeAs(SiteConfig::IMAGES_PATH, $fileName);

            //Almacenar nueva en base
            $site_config->about_us_img = substr($path, 13);
        }

        $site_config->save();

        return redirect()->back()->with('success', 'Información guardada.');
    }

    /*--------------------------------------------------------------
        People
    --------------------------------------------------------------*/
    public function showPeople(){
        $people = Person::all();
        return view(
            'admin/panel_people',
            ['people' => $people]
        );
    }

    /*--------------------------------------------------------------
        Edit person
    --------------------------------------------------------------*/
    public function showEditPerson($id){
        $person = Person::all()->where('id', $id)->first();
        return view(
            'admin/panel_person_edit',
            ['person' => $person]
        );
    }

    /*--------------------------------------------------------------
        Update person
    --------------------------------------------------------------*/
    public function updatePerson($id, Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'title' => 'required|string',
            'collegue' => 'required|string',
            'admissions' => 'required|string',
        ]);
        
        $person = Person::all()->where('id', $id)->first();
        
        //Chequear que se haya enviado
        if(isset($request->image)) {
            $this->validate($request, [
                'image' => 'file|image|mimes:jpeg,png,gif,jpg',
            ]);
            
            //Eliminar actual
            Storage::delete(Person::IMAGES_PATH.'/'.$person->img);
            
            //Store nueva
            $main = $request->file('image');
            $fileName = Str::random().time().'.'.$main->getClientOriginalExtension(); // Generate a file name with extension
            $path = $main->storeAs(Person::IMAGES_PATH, $fileName);
            //Almacenar nueva en base
            $person->img = substr($path, 14);
        }

        $person->name = $request->name;
        $person->title = $request->title;
        $person->collegue = $request->collegue;
        $person->admissions = $request->admissions;

        $person->save();

        return redirect()->back()->with('success', 'Información guardada.');
    }
}
