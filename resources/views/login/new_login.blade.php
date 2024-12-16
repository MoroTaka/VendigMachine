@extends('layouts.layout')

@section('title','ユーザー新規登録画面')



@section('content')

<div class='loginScreen'>
<h1>ユーザー新規登録画面</h1>


  <form action="{{route('newAccountAdd')}}" id='newAccount' method='post'>
      @csrf
      <div id="loginWrite">
      <input type="password" name="password" placeholder="パスワード">
    
      <input type="email" name="email" placeholder="アドレス">
      </div> 

      
  </form>
      <div id="loginBtn">  
        <div id="newBtn" class='btn'>
        <input type="submit" value="新規登録" form='newAccount'>
        </div>
        <div id="login" class='btn'>
        <a href="{{route('getLogin')}}"><button>戻る</button></a>
        </div>  
      </div>    
</div>

@endsection