@extends('admin.index')
@section('content')
<div class="row" style="margin-top: ;40px">
<div id="content" class="col-lg-8 col-md-6 col-sm-12 col-xs-12" style="direction: rtl;">
    <form action="{{Route('admin.post.store')}}" method="post">

        <div class="form-group">
            <label for="name">عنوان</label>
            <input type="name" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">تصویر</label>
            <input type="email" name="img" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">پسورد</label>
            <input type="email" name="img" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">تکرار پسورد</label>
            <input type="email" name="img" class="form-control">
        </div>
       
</div>
<button type="submit" class="btn btn-primary">ارسال</button>
</form>
</div>
</div>
@endsection