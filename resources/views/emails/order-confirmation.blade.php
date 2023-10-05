<p>Xin chào {{ $customer->name }},</p>
<p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi.</p>
<p>Thông tin giỏ hàng của bạn:</p>

@foreach ($cartItems as $cartItem)
    <p>{{ $cartItem['product']->name }} - Số lượng: {{ $cartItem['quantity'] }} - Giá: {{ $cartItem['price'] }}</p>
@endforeach

<p>Tổng tiền: {{ $cartTotal }}</p>

<p>Cảm ơn bạn đã mua hàng!</p>

