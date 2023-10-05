@extends('main')

@section('content')
    <div class="bg0 m-t-23 p-b-140 p-t-80">
        <div class="container">
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                   <h1>Sản phẩm yêu thích của bạn </h1>
                </div>

                <div class="flex-w flex-c-m m-tb-10">
    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
        Search
    </div>
</div>

<!-- Search product -->
<div class="dis-none panel-search w-full p-t-10 p-b-15">
    <div class="bor8 dis-flex p-l-15">
    <form action="{{ route('search.index') }}" method="GET">
    <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm...">
    <button type="submit"></button>
</form>

    </div>
</div>

                <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10">
                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Sort By
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a href="{{ request()->url() }}" class="filter-link stext-106 trans-04">
                                        Default
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="{{ request()->fullUrlWithQuery(['price' => 'asc']) }}" class="filter-link stext-106 trans-04">
                                        Price: Low to High
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="{{ request()->fullUrlWithQuery(['price' => 'desc']) }}" class="filter-link stext-106 trans-04">
                                        Price: High to Low
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col2 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Price
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                        All
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $0.00 - $50.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $50.00 - $100.00
                                    </a>
                                </li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
            <div class="row isotope-grid">
    @forelse ($favorites as $item)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">
                    @if (is_a($item, 'App\Models\Product'))
                        <img src="{{ asset('template/product/' . $item->thumb) }}" alt="{{ $item->name }}">
                    @elseif (is_array($item) && array_key_exists('thumb', $item))
                        <img src="{{ asset('template/product/' . $item['thumb']) }}" alt="{{ $item['name'] }}">
                    @endif
                    @if (is_a($item, 'App\Models\Product'))
                        <div class="remove-favorite-icon">
                        <a href="{{ route('favorite.remove', ['id' => $item->id]) }}">
                                <i class="">x</i>
                            </a>
                        </div>
                    @endif
                </div>
                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l">
                        @if (is_a($item, 'App\Models\Product'))
                            <a href="{{ url('/san-pham', [$item->id, Str::slug($item->name)]) }}"
                                class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{ $item->name }}
                            </a>
                            <span class="stext-105 cl2">
                                {!! \App\Helpers\Helper::price($item->price) !!}
                            </span>
                        @elseif (is_array($item) && array_key_exists('name', $item) && array_key_exists('price', $item))
                            <a href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{ $item['name'] }}
                            </a>
                            <span class="stext-105 cl2">
                                {!! \App\Helpers\Helper::price($item['price']) !!}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <p class="text-center">Không có sản phẩm yêu thích nào.</p>
        </div>
    @endforelse
</div>




<style>
    .remove-favorite-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 1; /* Đảm bảo biểu tượng xóa ở trên hình ảnh */
}

.remove-favorite-icon a {
    color: #ff0000; /* Màu của biểu tượng xóa (ví dụ: màu đỏ) */
    font-size: 20px; /* Kích thước biểu tượng xóa */
    text-decoration: none;
}
</style>
<style>
 /* Định dạng danh sách sản phẩm */
 .row.isotope-grid {
     display: flex;
     flex-wrap: wrap;
     margin: -15px;
 }

 .col-sm-6.col-md-4.col-lg-3.p-b-35.isotope-item {
     padding: 15px;
     display: flex;
     flex-direction: column;
     justify-content: space-between; /* Align content evenly */
 }

 /* Thiết lập khung hình cho sản phẩm */
 .block2 {
     border: 1px solid #ddd;
     padding: 20px;
     text-align: center;
     background-color: #fff;
     transition: transform 0.3s;
     margin-bottom: 20px; /* Add margin to separate the blocks */
 }

 .block2:hover {
     transform: translateY(-5px);
     box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
 }

 /* Thiết lập hình ảnh sản phẩm */
 .block2-pic img {
     max-width: 100%;
     height: auto;
 }

/* Định dạng khung cho biểu tượng trái tim */
.heart-icon {
 width: 25px; /* Độ rộng */
 height: 25px; /* Chiều cao */
 border: 2px solid #e65540; /* Độ đậm và màu sắc của khung */
 display: inline-block; /* Để biểu tượng và khung hiển thị trên cùng dòng */
 text-align: center; /* Căn giữa nội dung trong khung */
 line-height: 20px; /* Để căn giữa theo chiều dọc */
 border-radius: 4px; /* Để tạo thành hình vuông */
}



 /* Thiết lập tiêu đề sản phẩm */
 .block2-txt .js-name-b2 {
     text-align: center;
     font-size: 16px;
     font-weight: 600;
     color: #333;
     text-decoration: none;
     display: block;
     margin-bottom: 10px;
     transition: color 0.3s;
 }

 .block2-txt .js-name-b2:hover {
     color: #ff6f61;
 }

 /* Thiết lập giá sản phẩm */
 .stext-105.cl2 {
     font-size: 18px;
     color: #e65540;
     font-weight: 600;
     text-align: center;
 }

 /* Định dạng tiêu đề và giá sản phẩm trên màn hình nhỏ */
 @media (max-width: 768px) {
     .block2-txt-child1 {
         text-align: center;
     }

     .stext-105.cl2 {
         font-size: 18px;
         text-align: center;
     }
 }
 </style>



