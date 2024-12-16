@extends('layouts.layout')

@section('title','商品情報詳細画面')



@section('content')
<div class='Content_All' >
    <h1 class='Midashi'>商品情報詳細画像</h1>

    <div id='All'>

        <table id='ProductContent'>
            <tr>
                <th>ID</th>
                <td>{{$items->id}}.</td>
            </tr>
            <tr>
                <th>商品画像</th>
                <td ><div id='ImgSpace'>{{$items->img_path}}画像</div></td>
            </tr>
            <tr>
                <th>商品名</th>
                <td>{{$items->product_name}}</td>
            </tr>
            <tr>
                <th>メーカー</th>
                <td>{{$items->Company->company_name}}</td>
            </tr>
            <tr>
                <th>価格</th>
                <td>￥{{$items->price}}</td>
            </tr>
            <tr>
                <th>在庫数</th>
                <td>{{$items->stock}}</td>
            </tr>
            <tr>
                <th>コメント</th>
                <td ><div id='CommentSpace'>{{$items->comment}}</div></td>
            </tr>
        </table>

        <div class='Product_Btn'>
                <form action="{{route('product.edit', ['id' => $items->id])}}">
                    <input type="submit" value="編集" class="Product_Btn_Edit">
                </form>
                <a href="{{route('index')}}"><button class="Product_Btn_Return">戻る</button></a>
        </div>

    </div>
</div>
    
@endsection