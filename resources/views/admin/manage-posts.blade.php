@extends('admin.index')
@section('content')
<div class="row" style="margin-top: 40px;">
    <div id="content" class="col-lg-8 col-md-6 col-sm-12 col-xs-12 pull-left">
        <div class="container">
            <div class="row col-12">
                <div class="col-4 justify-content-start">
                    <button class="btn btn-danger">حذف</button>
                </div>
                <div class="col-8 justify-content-start">
                    <a class="btn btn-success w-" href="{{Route('admin.post.create')}}">افزودن پست</a>
                </div>
            </div>
            <div class="row" style="margin-top: 20px;direction:rtl">
                <form action="" method="post">
                    <table class="table strip-table">
                        <thead>
                            <th>شماره پست</th>
                            <th>عنوان</th>
                            <th>نام کاربر</th>
                            <th>تصویر</th>
                            <th>بدنه</th>
                            <th>ویرایش</th>
                            <th>انتخاب</th>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{auth()->user()->name}}</td>
                                <td><img src="{{$post->img}}" style="width:40px;height:20px"></td>
                                <td>
                                    {{mb_substr(strip_tags($post->body),0,50)}}
                                </td>
                                <td><a href="{{Route('admin.post.edit',$post->id)}}">ویرایش</a></td>
                                <td><input type="checkbox" name="ids[]" value="{{$post->id}}"></input></td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </form>
            </div>
        </div>
    </div>
    @include('admin.sidebar')
</div>
@endsection