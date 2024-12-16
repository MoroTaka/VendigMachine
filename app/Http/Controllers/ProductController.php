<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    public function newAccount(Request $request) {

        return view('login.new_login');

    }

    public function newAccountAdd(Request $request) {

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/');

    }
    



    public function index(Request $request) {
    
        $items =Product::Paginate(6);
        $category=Company::all();
        $keyword = $request->input('keyword');
        $categoryword = $request->input('categori');
        $viewGo =['items' => $items, 'category' => $category ,'keyword' => $keyword ,'categoryword' => $categoryword];
       return view('itiran.itiran', $viewGo);
    }

    public function search(Request $request) {

        $category=Company::all();

        $keyword = $request->input('keyword');
        $categoryword = $request->input('categori');

        $items =Product::KeyWord($request->keyword)->Category($request->categori)->Paginate(6);
        

        $viewGo =['items' => $items, 'category' => $category ,'keyword' => $keyword, 'categoryword' => $categoryword];
        return view('itiran.itiran', $viewGo);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        $items =Product::all();
        $category = Company::all();
        $viewGo =['items' => $items, 'category' => $category];
        return view('add.add', $viewGo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $product = new Product;
        $product->product_name = $request->product_name;
        $product->company_id = $request->company_name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->comment =$request->comment;
        $product->img_path = $request->product_img;
        $product->save();
        return redirect('/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
      $items = Product::find($id);
      return view('detail.detail', ['items'=>$items]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
       $category = Company::all();
       $items = Product::find($id);
       $viewGo =['items' => $items, 'category' => $category];
       return view('edit.edit', $viewGo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ) {
        $items = Product::where('id', '=', $request -> id);
        $items -> update([
            'product_name' => $request -> product_name,
            'company_id' => $request -> company_name,
            'price' => $request -> price,
            'stock' => $request -> stock,
            'comment' => $request -> comment,
            'img_path' => $request -> product_img,
        ]);
        return redirect()->route('product.edit' , ['id' => $request -> id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect('/index');
    }
}
