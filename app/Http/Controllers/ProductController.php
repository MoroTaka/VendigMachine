<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // ログイン　//
    public function getLogin(Request $request) {

        return view('login.login');

    }

    public function postLogin(Request $request) {

        $email = $request->email;
        $password = $request->password;

        if(Auth::attempt(['email' => $email, 'password' => $password])){

            return redirect('/index');

        }else {

            return redirect('/');

        }

    }

    // 新規登録ログイン　//
    public function newAccount(Request $request) {

        return view('login.new_login');

    }

    public function newAccountAdd(Request $request) {



        try {
               DB::beginTransaction();

                $user = new User();
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->save();

               DB::commit();

        } catch (\Exception $e) {

               DB::rollback();

        }

        return redirect('/');

    }
    


    //　一覧表示画面　　//
    public function index(Request $request) {

        
        
        $objectPro = new Product;
        $items = $objectPro->getProDate();
        $category = $objectPro->getComDate();

        $keyword = $request->input('keyword');
        $categoryword = $request->input('categori');
        
       return view('itiran.itiran', compact('items','category','keyword','categoryword'));
    }
     
    //　検索 //
    public function search(Request $request) {

        $objectPro = new Product;
        $category = $objectPro->getComDate(); 
        $items = $objectPro->getSarDate($request->keyword, $request->categori); 

        $keyword = $request->input('keyword');
        $categoryword = $request->input('categori');
        
        return view('itiran.itiran', compact('items','category','keyword','categoryword'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 新規作成画面　//
    public function create(Request $request) {

        $objectPro = new Product;
        $items = $objectPro->getProDate();
        $category = $objectPro->getComDate();

        return view('add.add', compact('items','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     // 新規作成項目追加 //
    public function store(Request $request) {


        
        try {

            DB::beginTransaction();

                $product = new Product;
                $product->product_name = $request->product_name;
                $product->company_id = $request->company_name;
                $product->price = $request->price;
                $product->stock = $request->stock;
                $product->comment =$request->comment;
                $product->img_path = $request->product_img;
                $product->save();
        
            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
        }

             return redirect('/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // 詳細画面 //
    public function show($id) {

      $objectPro = new Product;
      $items = $objectPro->getFinDate($id);

      return view('detail.detail', compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // 編集画面 //
    public function edit($id) {

       $objectPro = new Product;
       $category = $objectPro->getComDate();
       $items = $objectPro->getFinDate($id);


       return view('edit.edit', compact('items','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // 更新 //
    public function update(Request $request ) {

        $objectPro = new Product;
        $items = $objectPro->getFinDate($request -> id);


        try {

            DB::beginTransaction();

                $items -> update([
                    'product_name' => $request -> product_name,
                    'company_id' => $request -> company_name,
                    'price' => $request -> price,
                    'stock' => $request -> stock,
                    'comment' => $request -> comment,
                    'img_path' => $request -> product_img,

                ]);
                
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('product.edit' , ['id' => $request -> id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // 削除 //
    public function destroy($id) {
        
        $objectPro = new Product;
        $items = $objectPro->getFinDate($id);

        try {

            DB::beginTransaction();

                $items->delete();
                
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
        }

        return redirect('/index');
    }
}
