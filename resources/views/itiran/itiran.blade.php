@extends('layouts.layout')

@section('title','商品一覧画面')



@section('content')

    <div class="Content_All">  
        <h1 class='Midashi'>商品一覧画面</h1>
        <div>
        
            <form action="{{route('product.search')}}" method="post">
                @csrf
                <div id='ItiranSearchBox'>

                    <div id=ItiranSearch>
                    <input type="search" name="keyword" placeholder="検索キーワード" value="{{old('keyword', $keyword)}}">
                    </div>

                    <div id=ItiranSelect>
                        <select name="categori"  id='ItiranSelectItem' >
                            <option value="" selected >メーカー名</option>
                        @foreach($category as $category)
                            <option value="{{$category->id}}" @if (old ('categori', $categoryword) == $category->id) selected @endif>{{$category->company_name}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div id=ItiranBtn>
                    <input type="submit" value="検索" id='SearchBtn'>
                    </div>
                </div>
            </form>
        </div>

        <div id=section>
            <table id='ItiranTable'>
                <thead>
                    <tr id='ItiranContent'>
                        <th id='Id' class='product'>ID</th>
                        <th id='CommodityImg' class='product'>商品画像</th>
                        <th id='CommodityName'class='product'>商品名</th>
                        <th id='price'class='product'>価格</th>
                        <th id='Stock'class='product'>在庫数</th>
                        <th id='CompanyName'class='product'>メーカー名</th>
                        <th colspan='2'>
                            <form action="{{route('product.create')}}" method="get">
                                <input type="submit" value="新規登録" id='ItiranNewBtn'>
                            </form>
                        </th>

                    </tr>
                </thead>
                    <tbody>
                    @foreach($items as $item)
                    <tr id='ItiranContent'>
                        <td id='productName'>{{$item->id}}</td>
                        <td>{{$item->img_path}}商品画像</td>
                        <td>{{$item->product_name}}</td>
                        <td id=itemSprice>￥{{$item->price}}</td>
                        <td id=itemStock>{{$item->stock}}</td>
                        <td>{{$item->Company->company_name}}</td>
                        <form action="{{route('product.show', ['id' => $item->id])}}" method="get" >
                        @csrf
                        <td class='Itiran_Btns' > 
                                <input type="submit" value='詳細' id=ItiranContentBtn>
                        </td>
                        </form>
                        <form action="{{route('product.destroy', ['id' => $item->id])}}" method="post">
                                @csrf
                        <td class='Itiran_Btns'> 
                                <input type="submit" value='削除' id=ItiranDeleteBtn class = deleteBtn>
                        </td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div id='paginate'>
                {{$items->links()}} 
            </div>        
        
        </div>
    </div>


@endsection
