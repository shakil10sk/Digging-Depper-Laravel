<?php

use App\Jobs\SendTestMailJob;
use App\Mail\SendMarkDownMail;
use App\Mail\SendTestMail;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test',function () {
    // dd(app());
    return "shakil";
});

// collection

Route::get('/collection',function () {

    // $collect = collect([100,1,2,2,3,4,5,6,7,8,9,10]); // generally call collection
    // $collect = collect([1,1,2,2,3,4,5,6,7,8,9,10]); // generally call collection madian
    // $collect = new Collection([1,2,3,4,5,6,7,8]); // object call collection.
    // $collect = Illuminate\Support\Collection::make([1,2,3,4,5,6,7,8]); //namespace call collection

    // dd($collect);
    // dd($collect->get(0));
    // dd($collect->all());
    // dd($collect->sum());
    // dd($collect->count());
    // dd($collect->sum() / $collect->count());
    // dd($collect->average());
    // dd($collect->avg());
    // dd($collect->chunk(3)); 
    // $collect->dump();
    // $collect->dd();
    // return $collect->duplicates();
    // return $collect->shuffle();
    // return $collect->min();
    // return $collect->max();
    // return $collect->mode();
    // return $collect->median(); //middle value count and division as like 4+5 / 2 = 4.5
    // return $collect->implode(",");
    // return $collect->join(","," and "); // er maddhoma last er 2 ta value 9,10 er moddhe 2nd apram add kroe diba like 9 and 10
    // return $collect->toArray(); 
    // return $collect->tojson(); 

    // $collect->transform(function($value){ //main array / collection ka change kore dai
    //     return $value * 2;
    // });

    // map
    // $newcollection = $collect->map(function($value){  // change ka new array te convert kore
    //     return $value * 2;
    // });

    // filter
    // $newcollection = $collect->filter(function($value){  // change ka new array te convert kore
    //     return $value > 2;
    // });

    // Reject
    // $newcollection = $collect->reject(function($value){  // change ka new array te convert kore
    //     return $value > 2;
    // });

    // Push
    // $newcollection = $collect->push(105); //push aray on existing array on last of array 
    // $newcollection = $collect->prepend(105); //push aray on existing array on first of array 
    // $newcollection = $collect->pop(); //Pop array remove the last value of array
    // $newcollection = $collect->shift(); //shift is useing for  remove the first value of array
    //  $collect->pull(5); //shift is useing for  remove the first value of array

    // dd($collect);


    // lazy Collection

    // $lazy_collection = Post::cursor();
    // $lazy_collection = Post::cursor()->remember();
    // $lazy_collection = Post::all();
    // dd($lazy_collection);

    // foreach($lazy_collection->take(10) as $value) {
    //     echo $value->description;
    //     echo "<br>";
    // }
    // echo "<br>";
    // echo "<br>";
    // echo "<br>";
    // echo "<br>";

    // foreach($lazy_collection->take(10) as $value) {
    //     echo $value->description;
    //     echo "<br>";
    // }


    Collection::macro('toUpper', function () {
        return $this->map(function ($value) {
            return Str::upper($value);
        });
    });

     
    $collection = collect(['first', 'second']);
    
    $upper = $collection->toUpper();

    dd($upper);

});

// contracts

// Route::get('/contrcts',function(){
//     Cache::put('name',"shakil hossain");
//     dd(Cache::get('name'));
// });

Route::get('/contrcts',function(Illuminate\Contracts\Cache\Factory $cache){
    $cache->put('name',"shakil hossains");
    dd($cache->get('name'));
});


Route::get('/mail',function(){
    $data = ['name' => "Testing for Mail sending Process"];
    
    //without view
    // Mail::send([],[],function($msg){
    //     $msg->to("shakil550sh@gmail.com","Advanced Laravel User") //address and reciver name
    //             ->subject("Advanced laravel Learning")
    //             ->setBody("HI,This is Working Fine");
    //     // $msg->from("shakilh039@gmail.com"); //we can add from column
    // });

    // Mail::send('email',$data,function($msg){
    //     $msg->to("shakil550sh@gmail.com","Advanced Laravel User")
    //             ->subject("Advanced laravel Learning");
    // });

    // Mail::to('shakil550sh@gmail.com','new test user')
    //             ->send(new SendTestMail());
    
    Mail::to('shakil550sh@gmail.com','new test user')
                ->send(new SendMarkDownMail());

    echo "Mail Sent Successfully";
});

Route::get('/queue',function(){

    dispatch(function(){
        Mail::to('shakil550sh@gmail.com','new test user')
                ->send(new SendMarkDownMail());
    })->delay(now()->addseconds(5));

    // dispatch(new SendTestMailJob())->delay(now()->addseconds(5));

    
    // SendTestMailJob::dispatch()->delay(now()->addseconds(5));


    // $user = User::findOrFail(2);
    // SendTestMailJob::dispatch($user)->delay(now()->addseconds(5));
    echo 'Mail sent';

});