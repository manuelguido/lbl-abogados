<?php
/*--------------------------------------------------------------
    Public
--------------------------------------------------------------*/
Route::get('/', 'PublicController@showHome');
Route::get('/contacto', 'PublicController@showContact');
Route::get('/noticias', 'PublicController@showNews');
Route::get('/noticia/{id}', 'PublicController@showNew');
Route::get('/sobre_nosotros', 'PublicController@showAboutUs');
Route::get('/faqs', 'PublicController@showFaqs');
Route::get('/faq/{id}', 'PublicController@showFaq');
Route::post('/new_message', 'PublicController@newMessage');

/*--------------------------------------------------------------
    Auth
--------------------------------------------------------------*/
Auth::routes([
    'verify' => true,
    'register' => false
    ]);
/*--------------------------------------------------------------
    Admin
--------------------------------------------------------------*/
//Home
Route::get('/home', 'AdminController@showMessages');
Route::prefix('admin')->group(function() {
    //Home
    Route::get('/', 'AdminController@showMessages');

    //Posts
    Route::get('/messages', 'AdminController@showMessages');
    Route::get('/read_message/{id}', 'AdminController@readMessage');
    Route::get('/delete_message/{id}', 'AdminController@deleteMessage');
    
    //Topics
    Route::get('/topics', 'AdminController@showTopics');
    Route::post('/create_topic', 'AdminController@createTopic');
    Route::post('/update_topic/{id}', 'AdminController@updateTopic');
    Route::get('/delete_topic/{id}', 'AdminController@deleteTopic');

    //Areas
    Route::get('/areas', 'AdminController@showAreas');
    Route::get('/modify_area/{id}', 'AdminController@showModifyArea');
    Route::post('/create_area', 'AdminController@createArea');
    Route::post('/update_area/{id}', 'AdminController@updateArea');
    Route::get('/delete_area/{id}', 'AdminController@deleteArea');

    //Faqs
    Route::get('/faqs', 'AdminController@showFaqs');
    Route::get('/modify_faq/{id}', 'AdminController@showModifyFaq');
    Route::post('/create_faq', 'AdminController@createFaq');
    Route::post('/update_faq/{id}', 'AdminController@updateFaq');
    Route::get('/delete_faq/{id}', 'AdminController@deleteFaq');

    //Posts
    Route::get('/posts', 'AdminController@showPosts');
    Route::get('/new_post', 'AdminController@showNewPost');
    Route::get('/modify_post/{id}', 'AdminController@showModifyPost');
    Route::post('/create_post', 'AdminController@createPost');
    Route::post('/update_post/{id}', 'AdminController@updatePost');
    Route::get('/delete_post/{id}', 'AdminController@deletePost');

    //Site config
    Route::get('/info', 'AdminController@showInfo')->name('info');
    Route::post('/info/update', 'AdminController@updateInfo')->name('info_save');

    //People
    Route::get('/people', 'AdminController@showPeople')->name('people');
    //Route::get('/person/new', 'AdminController@showNewPerson');
    //Route::get('/person/create', 'AdminController@createPerson');
    Route::get('/person/edit/{id}', 'AdminController@showEditPerson');    
    Route::post('/person/update/{id}', 'AdminController@updatePerson');
    Route::post('/person/delete/{id}', 'AdminController@deletePerson');
    
    //Profile
    Route::get('/profile', 'AdminController@showProfile');
    Route::post('/update_profile', 'AdminController@updateProfile');
    Route::post('/update_password', 'AdminController@updatePassword');
    
    //Users
    Route::get('/users', 'AdminController@showUsers');
    Route::post('/createUser', 'AdminController@createUser');
});