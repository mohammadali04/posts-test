@extends('admin.index')
@section('content')
<div class="row">
    <div id="content" class="col-lg-8 col-md-6 col-sm-12 col-xs-12" style="direction: rtl;">
        <form action="{{Route('admin.post.update',$post->id)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">عنوان</label>
                <input type="text" name="title" value="{{$post->title}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">(بر اساس دقیقه)تایم انتشار</label>
                <input type="text" name="time" class="form-control" value="{{$post->time}}">
            </div>
            <div class="form-group">
                <label for="exampleTextarea1">تصویر</label>
                <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> انتخاب کنید
                    </a>
                </span>
                <input id="thumbnail" class="form-control" type="text" name="img"
                    class="form-control @error('img') is-invalid @enderror" value="{{$post->img}}">
            </div>
            <div class="form-group">
                <label for="exampleTextarea1">توضیحات</label>
                <textarea id="summernote" type="text" class="form-control" name="body">{{$post->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">ارسال</button>
        </form>
    </div>
        @include('admin.sidebar')
</div>
@endsection