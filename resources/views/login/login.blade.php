@extends('layouts.layout')

@section('title','ユーザログイン画面')



@section('content')

<div class=loginScreen>
    <h1>ユーザログイン画面</h1>


        <form action="{{route('postLogin')}}" method='post' id='Login'>
            @csrf
            <div id="loginWrite">
            <input type="password" name="password" placeholder="パスワード">
        
            <input type="email" name="email" placeholder="アドレス">
            </div> 

            
        </form>
        <div id="loginBtn">  
                    <div id=newBtn class='btn'>
                    <a href="{{route('newAccount')}}"><button type="button">新規登録</button></a>
                    </div>

                    <div id="login" class='btn'>
                    <input  type="submit" value="ログイン"  form='Login'>
                    </div>
           
        </div>    
        
</div>

@endsection