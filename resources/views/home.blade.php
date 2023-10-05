@extends('main')

@section('content')
    <!-- Slider -->
    
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">

                @foreach($sliders as $slider)
                <div class="item-slick1" style="background-image: url('{{ asset('template/slider/'. $slider->thumb)}}'); background-size: cover; width: 10px; height: 600px;">
                        <div class="container h-full">
                            <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                                <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-101 cl2 respon2">
                                
                            </span>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                    <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                        
                                    </h2>
                                </div>

                          
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


   


    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl8">
                    Danh sách 
                </h3>
            </div>


                        @foreach ($menus as $menu)
            <div class="flex-w flex-sb-m p-b-52" style="position: relative;">
                <!-- Thêm dải ngăn cách với màu và chiều cao tùy chọn -->
                <div style="position: absolute; background-color: black; width: 100%; height: 2px; top: 50%; transform: translateY(-50%);"></div>

                <div class="" style="font-size: 30px; color: black; z-index: 1; position: relative;">
                    {{ $menu->name }}
                </div>
            </div>


                <div class="row isotope-grid">
                    @foreach ($menu->products as $product)
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="{{ asset('template/product/' . $product->thumb) }}" alt="{{ $product->name }}">
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l">
                                        <a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            {{ $product->name }}
                                        </a>

                                        <span class="stext-105 cl2">
                                            {!! \App\Helpers\Helper::price($product->price) !!}
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach         
            </div>


      
        </div>
    </section>
@endsection
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
            font-size: 16px;
            text-align: center;
        }
    }
    </style>