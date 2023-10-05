@extends('admin.main')

@section('content')
    <form action="{{ route('admin.customers.update', ['id' => $customer->id]) }}" method="POST">
        <div class="customer mt-3">
            <div class="form-group">
                <label for="name">Tên khách hàng:</label>
                <input type="text" name="name" value="{{ $customer->name }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="text" name="phone" value="{{ $customer->phone }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" name="address" value="{{ $customer->address }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" value="{{ $customer->email }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="content">Ghi chú:</label>
                <textarea name="content" class="form-control">{{ $customer->content }}</textarea>
            </div>
        </div>

        <!-- Thông tin đơn hàng -->
        <div class="carts">
            <table class="table">
                <thead>
                    <tr>
                        <th class="column-1">Hình Ảnh</th>
                        <th class="column-2">Sản Phẩm</th>
                        <th class="column-3">Giá Thành</th>
                        <th class="column-4">Số lượng</th>
                        <th class="column-5">Tổng Cộng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carts as $cart)
                        <tr>
                            <td class="column-1">
                                <div class="how-itemcart1">
                                    <img src="{{  asset('template/product/'.$cart->product->thumb) }}" alt="IMG" style="width: 100px">
                                </div>
                            </td>
                            <td class="column-2">{{ $cart->product->name }}</td>
                            <td class="column-3">
                                <input type="number" name="price_{{ $cart->id }}" value="{{ $cart->price }}" class="form-control">
                            </td>
                            <td class="column-4">
                                <input type="number" name="pty_{{ $cart->id }}" value="{{ $cart->pty }}" class="form-control">
                            </td>
                            <td class="column-5">
                                {{ number_format($cart->price * $cart->pty, 0, '', '.') }}
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3"></td>
                        <td class="text-right">Tổng Tiền</td>
                        <td>
                            @php
                                $total = 0;
                                foreach ($carts as $cart) {
                                    $total += $cart->price * $cart->pty;
                                }
                            @endphp
                            {{ number_format($total, 0, '', '.') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Cập Nhật Khách Hàng</button>
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
