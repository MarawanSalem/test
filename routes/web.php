<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/doc1', function () {
    return "<h1>hello</h1>";
});
Route::get('/doc2/{id}/{name}', function ($id,$name) {
    return "<h1>hello this is  $id $name  </h1>";
});

Route::get('/doc1/element1/1/1', array("as" =>"marwan.home", function () {
    $url = route("marwan.home");
    return "<h1>this is $url </h1>";
}));

Route::get('/mmm/{id}','\App\Http\Controllers\mController@index');

Route::resource('resource','\App\Http\Controllers\mController');

Route::get('r1/{id}/{name}','\App\Http\Controllers\mController@editNew');


Route::get('/insert', function () {

    DB::table('dummy')->insert([
        'email' => 'email.com',
        'phone' => '0115522' ,
        'anything' => 'asacbss'

    ]);

    });

Route::get('/read', '\App\Http\Controllers\mController@read');


Route::get('/readdb', function () {
    $posts = Post::all();

    foreach($posts as $post){
        return $post->title;
    }
});

Route::get('/find', function () {
    $posts = Post::find(3);

        return $posts->title;

});

Route::get('/findcond', function () {
    $ids= [1,3];
    $posts = DB::table('posts')->where('id', $ids)->orderBy('id','desc')->get();
        return $posts;

});

Route::get('/findfail', function () {
    $posts = DB::table('posts')->findOr(5)->get();
        return $posts;

});

Route::get('/newdata', function () {
    $posts = new Post;
    $posts->title ='newtitle';
    $posts->body ='new body';
    $posts->save();
});

Route::get('/createpost', function () {

    Post::create(['title'=>'new created post' , 'body'=>'new post body']);
});

Route::get('/updatepost', function () {

    Post::where('id',1)->update(['title'=>'new updated post' , 'body'=>'update post body']);
});

Route::get('/deletepost', function () {

    $post = Post::find(1);
    $post->delete();
});

// Route::get('/deletemultipost', function () {

//     Post::destroy([3,4]);
// });
Route::get('/hashmultipost', function () {

    Post::find(8)->delete();
});
Route::get('/retmultipost', function () {

    $post = Post::withTrashed()->where('id',8)->get();
    return $post;
});

Route::get('/user/{id}/post', function ($id) {
    return User::find($id)->post;
});
Route::get('/post/{id}/user', function ($id) {
    return Post::find($id)->user->name;
});
Route::get('/posts', function () {
    $user = User::find(1);
    foreach($user->posts as $post){
        echo $post->title . '<br>';
    }
});
