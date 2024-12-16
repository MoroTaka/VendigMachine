@extends('layouts.layout')

@section('title','商品情報編集画面')



@section('content')
<div class='Content_All' >
    <h1 class='Midashi'>商品情報編集画面</h1>

    <div id='All'>

        <form action="{{route('product.update',['id' => $items->id])}}" method="post" id='FormUpdate'>
            @method('put')
            @csrf
        <table id='ProductContent'>
            <tr>
                <th>ID.</th>
                <td>{{$items->id}}.</td>
            </tr>
            <tr>
                <th>商品名<span class='asterisk'>✳︎</span></th>
                <td><input type="text" name='product_name' required class="kisai_basho" value="{{$items->product_name}}"></td>
            </tr>
            <tr>
                <th>メーカ名<span class='asterisk'>✳︎</span></th>
                <td >
                <div id='ProductSelect'>
                <select class="kisai_basho" name='company_name'>
                    
                    @foreach($category as $category)
                        <option  value="{{$category->id}}" @if ($items->company_id == $category->id) selected @endif >{{$category->company_name}}</option>
                    @endforeach
                </select>
                </div>
                </td>
            </tr>
            <tr>
                <th>価格<span class='asterisk'>✳︎</span></th>
                <td><input type="text" name='price' required class="kisai_basho" value="{{$items->price}}"></td>
            </tr>
            <tr>
                <th>在庫数<span class='asterisk'>✳︎</span></th>
                <td><input type="text" name='stock' required class="kisai_basho" value="{{$items->stock}}"></td>
            </tr>
            <tr>
                <th>コメント</th>
                <td><textarea  id='CommentSpace' name='comment' value="{{$items->comment}}"></textarea>
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

        <div id='ProductBtn2'>      
                <input type="submit" value="更新" class="Product_Btn_Edit" form="FormUpdate">  

                <a href="{{route('product.show',['id' => $items->id])}}"><button class="Product_Btn_Return">戻る</button></a>
         </div>


    </div>
</div>
    
@endsection