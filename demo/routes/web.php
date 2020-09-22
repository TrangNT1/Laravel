<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
Route::get('/hello', function () {
    echo "hello";
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'chucvu'], function () {
    Route::get('index', 'QuanTriAdmin\ChucVu\ChucVuController@index')->name('QuanTriAdmin.chucvu.chucvu.index');
    Route::get('/del/{id}', 'QuanTriAdmin\ChucVu\ChucVuController@destroy')->name('QuanTriAdmin.chucvu.chucvu.destroy');
    Route::get('/edit/{id}', 'QuanTriAdmin\ChucVu\ChucVuController@edit')->name('QuanTriAdmin.chucvu.chucvu.edit');
    Route::post('/update/{id}', 'QuanTriAdmin\ChucVu\ChucVuController@update')->name('QuanTriAdmin.chucvu.chucvu.update');
    Route::get('/create', 'QuanTriAdmin\ChucVu\ChucVuController@create')->name('QuanTriAdmin.chucvu.chucvu.create');
    Route::post('/add', 'QuanTriAdmin\ChucVu\ChucVuController@store')->name('QuanTriAdmin.chucvu.chucvu.add');
});

Route::group(['prefix' => 'phongban'], function () {
    Route::get('index', 'QuanTriAdmin\PhongBan\PhongBanController@index')->name('QuanTriAdmin.phongban.phongban.index');
    Route::get('/create', 'QuanTriAdmin\PhongBan\PhongBanController@create')->name('QuanTriAdmin.phongban.phongban.create');
    Route::post('/add', 'QuanTriAdmin\PhongBan\PhongBanController@store')->name('QuanTriAdmin.phongban.phongban.add');
    Route::get('/edit/{id}', 'QuanTriAdmin\PhongBan\PhongBanController@edit')->name('QuanTriAdmin.phongban.phongban.edit');
    Route::post('/update/{id}', 'QuanTriAdmin\PhongBan\PhongBanController@update')->name('QuanTriAdmin.phongban.phongban.update');
    Route::get('/del/{id}', 'QuanTriAdmin\PhongBan\PhongBanController@destroy')->name('QuanTriAdmin.phongban.phongban.destroy');
});

//viết 3 router get bất kì có tính toán (tính tổng từ 1-n,giải phương trình bậc 2, tính cạnh huyền của tam giác vuông)
// Route::get('/update/{id}/{ten}', function ($id,$ten) {
//     echo "hiển thị form đăng nhập";
// })->where(['id'=>'[0-9]+','ten'=>'[a-Za-Z0-9]+'])=>name("hienthidangnhap");

// Route::get('/bloblo', function () {
//     return view("blabla", ['id' => 1, 'ten' => 'abc']);
// });

// Route::post('/bleble', function () {
//     return view("bleble");
// })->name("submitdenday");



Route::get('/manhinhthemmoi', function () {

    echo "Day la man hinh them moi";
    $userArr = DB::table("users")->get();
    //lay toan bo du lieu trong table
    // foreach($userArr as $item){
    //     echo $item->name;

    // }

    //lay du lieu dong dau tien
    $userArr = DB::table("users")->first();

    //lay where
    $userArr = DB::table("users")
        ->where("email", "=", "Tn7787604@gmail.com")
        ->where("id", "=", "1")
        ->get();
    // dd($userArr);
    // phan dieu kien < > <> = like &&

    //lay du lieu theo cot(dug lay cau hinh, check quyen)
    $name = DB::table("users")
        ->where("email", "=", "Tn7787604@gmail.com")
        ->where("id", "=", "1")
        ->value("name");
    // lay du lieu theo id
    $users = DB::table("users")
        ->find(1);
    // lay mot mang theo cot
    $userIdArr = DB::table("users")
        ->pluck("id");
    // dd($userIdArr);

    // lay mot mang theo cot co key va value
    $userIdNameArr = DB::table("users")
        ->pluck("name", "id"); // value/key
    dd($userIdNameArr);
})
    //->middleware("ghilog")
    // ->middleware("authencation")
    ->name("kiemtra");;


Route::post('/luudulieu', function () {
    echo "khong co quyen";
})->name("khongcoquyen");

//Viết màn hình cập nhật user (phân vào chức danh và phòng ban)

Route::get('/user/list', function () {

    $userArr = DB::table("users")->get();

    $cnArr = DB::table("chucnangs")
        ->pluck("name", "id");

    $pbArr = DB::table("phongbans")
        ->pluck("name", "id");

    return view("listuser", ['users' => $userArr, "chucnangs" => $cnArr, "phongbans" => $pbArr]);
});
Route::get('/user/update/{id}', function ($id) {

    $userArr = DB::table("users")->find($id);

    $cnArr = DB::table("chucnangs")
        ->pluck("name", "id");

    $pbArr = DB::table("phongbans")
        ->pluck("name", "id");

    return view("capnhatuser", ['users' => $userArr, "chucnangs" => $cnArr, "phongbans" => $pbArr]);
})->name('user.update');

Route::post('/user/save', function (Request $request) {

    $dt = User::find($request->id);
    $dt->name = $request->name;
    $dt->phongbanid = $request->phongbanid;
    $dt->chucnangid = $request->chucnangid;
    $dt->save();
    return redirect('/user/list');
})->name('user.save');
