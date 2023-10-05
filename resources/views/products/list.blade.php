    <div class="row isotope-grid">
 
    @foreach($products as $key => $product)
 
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{ asset('template/product/' . $product->thumb) }}" alt="{{ $product->name }}">
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html"
                               class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
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