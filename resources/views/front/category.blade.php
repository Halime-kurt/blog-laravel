@extends('front.layouts.master')
@section('title',$category->name. ' Kategorisi  | '.count($articles). ' yazı bulundu')
@section('content')
   <div class="container">
   <div class="row ">

       <div class="col-md-6 mx-auto ">
           @include('front.widgets.articlelist')
       </div>
       <div class="col-md-3 ">
           @include('front.widgets.categoryWidget')</div>
<h1>hello</h1>
   </div>
   </div>
@endsection
