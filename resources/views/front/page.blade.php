@extends('front.layouts.master')
@section('title',$page->title)
@section('bg',$page->image)
@section('content')
    <article>
        <div class="container">
            <div class="row ">

                <div class="col-md-10 col-lg-8 mx-auto">
                    {!! $page->content !!}
                </div>

            </div>
        </div>

    </article>


@endsection


