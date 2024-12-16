@extends('layouts.layout')

@section('title','商品新規登録画面')



@section('content')
<div class='Content_All' >
    <h1 class='Midashi'>商品新規登録画面</h1>

    <div id='All'>

        <form action="{{route('product.store')}}" method="post" id='FormStore'>
            @csrf
        <table id='ProductContent'>
            <tr>
                <th>商品名<span class='asterisk'>✳︎</span></th>
                <td><input type="text" name='product_name' required class="kisai_basho"></td>
            </tr>
            <tr>
                <th>メーカ名<span class='asterisk'>✳︎</span></th>
                <td >
                    <div id='ProductSelect'>
                <select class="kisai_basho" name='company_name'>
                    <option value="" selected></option>
                    @foreach($category as $category)
                        <option value="{{$category->id}}" >{{$category->company_name}}</option>
                    @endforeach
                </select>
                </div>
                </td>
            </tr>
            <tr>
                <th>価格<span class='asterisk'>✳︎</span></th>
                <td><input type="text" name='price' required class="kisai_basho"></td>
            </tr>
            <tr>
                <th>在庫数<span class='asterisk'>✳︎</span></th>
                <td><input type="text" name='stock' required class="kisai_basho"></td>
            </tr>
            <tr>
                <th>コメント</th>
                <td><textarea  id='CommentSpace' name='comment'></textarea>
            </tr>
            <tr id='ProductContentImg'>
                <th>商品画像</th>
                <td>
                    <label for="ImgFile" id='ImgFileBtn'>
                        ファイルを選択
                    <input type="file" id='ImgFile' name='product_img' accept="image/*">
                    </label>
                </td>
            </tr>
            

        </table>


        </form>

        <div class='Product_Btn'>      
                <input type="submit" value="新規登録" class="Product_Btn_Edit" form="FormStore">

                <a href="{{route('index')}}"><button class="Product_Btn_Return">戻る</button></a>
         </div>

    </div>
</div>
    
@endsection