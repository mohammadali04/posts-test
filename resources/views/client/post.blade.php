@extends('client.index')
@section('content')
<style>
    .row{
        margin:40px;
    }
</style>
<div class="row">
    <div id="content" class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
        <div class="container">
            <div class="row">
            <nav aria-label="breadcrumb" class="bg-info" style="text-align: right;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
                    <li class="breadcrumb-item"><a href="{{Route('post.index')}}">پست ها</a></li>
                </ol>
            </nav>
            </div>
            <div class="row">
                <img src="{{$post->img}}" alt="" style="width:200px;height:200px">
            </div>
            <div class="row">
            {{strip_tags($post->body)}}
            </div>
        </div>
    </div>
    @include('client.sidebar')
</div>

@endsection