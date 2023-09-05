@extends('front.layouts.master')
@section('title','Anasayfa')
@section('content')

    <div class="container">
        <div class="row ">
            <div class="col-md-6 mx-auto ">
                @include('front.widgets.articlelist')
            </div>
            <div class="col-md-3 ">@include('front.widgets.categoryWidget')</div>
        </div>
    </div>

@endsection
