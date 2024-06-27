@extends('client.index')
@section('content')
<div class="row">
    <div id="content" class="col-lg-8 col-md-6 col-sm-12 col-xs-12" style="direction: rtl;margin-top:40px;height:700px;overflow-y:scroll">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">پست ها</a></li>
                </ol>
            </nav>
            <div class="container col-12 justify-content-around">
                <div class="row">
                    <style>
                        .card{
                            margin:15px 10px;
                        }
                    </style>
                    @forelse ($posts_share as $post)
                    <div class="card" class=" col-lg-3 col-md-6 col-sm-12 col-xs-12" style="width: 18rem;">
                        <img src="{{$post->img}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{{mb_substr(strip_tags($post->body),0,50,'utf-8')}}</p>
                           
                            <a href="{{Route('post.show',$post->id)}}" class="btn btn-primary">بیشتر</a>
                        </div>
                    </div>
                    @empty
                        <h1 class="text-muted">Posti nabod</h1>
                    @endforelse
                </div>
            </div>
           
        </div>
    </div>
    @include('client.sidebar')
</div>
@endsection