@extends('front.layouts.master')
@section('title',$article->title)
@section('bg',$article->image)
@section('content')
    <article>
        <div class="container">
            <div class="row ">

                <div class="col-md-6 mx-auto ">
                    {!!$article->content!!}
                    <br/><br/>
                    <span class="text-danger"> Okunma sayısı: <b>{{$article->hit}}</b></span>
                </div>
                <div class="col-md-3 ">
                    @include('front.widgets.categoryWidget')</div>
            </div>
        </div>

    </article>

@endsection
