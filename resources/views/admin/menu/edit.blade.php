@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">

            <div class="form-group">
                <label for="menu">Tên Danh Mục</label>
                <input type="text" name="name" value="{{ $menu->name }}" class="form-control"  placeholder="Nhập tên danh mục">
            </div>

  
            <div class="form-group">
                <label for="menu">Ảnh Sản Phẩm</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">
                <a href="{{ asset('template/menu/'. $menu->thumb)}}" target="_blank">
            <img src="{{ asset('template/menu/'. $menu->thumb)}}" width="100px">
        </a>
    </div>
    <input type="hidden" name="thumb" value="{{ asset('template/menu/'. $menu->thumb)}}" id="thumb">
            </div>


     


            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active"
                           name="active" {{ $menu->active == 1 ? 'checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active"
                           name="active" {{ $menu->active == 0 ? 'checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Danh Mục</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
<script>
    // Xem trước ảnh khi chọn tệp ảnh
    function previewImage(input, previewElement) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(previewElement).attr('src', e.target.result);
                $(previewElement).css('display', 'block');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Khi trang web được tải, kiểm tra nếu đã có ảnh và hiển thị nó
    $(document).ready(function () {
        var existingThumb = $('#thumb').val();
        var thumbnailPreview = $('#thumbnail-preview');

        if (existingThumb) {
            $(thumbnailPreview).html('<a href="' + existingThumb + '" target="_blank"><img src="' + existingThumb + '" width="100px"></a>');
            $(thumbnailPreview).css('display', 'block');
        }
    });

</script>

    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
