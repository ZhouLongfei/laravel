<?php



Route::any('test',function()
{	
	
	App::make('Pusher')->trigger('demoChannel','PostWasPublished',['title'=>'My Great New Post']);
	return 'Done';

});



Route::get('chat','ChatController@getRoom');
Route::post('chat', 'ChatController@getIndex');
Route::any('chat/message', 'ChatController@postMessage');
Route::get('chatEnter/{channelName}','ChatController@checkUser');
Route::post('chatEnter/{channelName}','ChatController@checkUserPost');

Auth::routes();

Route::get('/', 'HomeController@index');
Route::post('/','HomeController@create');

