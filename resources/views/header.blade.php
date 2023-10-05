<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="#" class="logo">
                    <img src="/template/images/icons/logo-02.png" alt="IMG-LOGO" style="width: 150px; height: auto;">
                </a>


                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu"><a href="/">Trang Chủ</a> </li>
                        <div class="dropdown">
                            <button class="dropbtn">Thể loại</button>
                            <div class="dropdown-content">
                                @foreach ($menus as $menu)
                                    <a href="/danh-muc/{{ $menu->id }}-{{ \Str::slug($menu->name, '-') }}.html">
                                        {{ $menu->name }}</a>
                                @endforeach
                            </div>
                        </div>

                        <li ><a href="/">Ưu đãi </a> </li>
                
                        
                        <li>
                            <a href="/contacts">Liên Hệ</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">

                
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="icon-header-item user-icon" onclick="window.location.href = 'admin/users/signup'">
                            <i class="zmdi zmdi-account"></i>
                        </div>
                    </div>
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
    data-notify="{{ !is_null(Session::get('favorites')) ? count(Session::get('favorites')) : 0 }}">
    <a href="{{ route('favorites.index') }}">
        <i class="fa fa-heart" aria-hidden="true"></i>
    </a>
</div>


    <!-- Kiểm tra giá trị của biến favorites bằng dd() -->
</div>







                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                         data-notify="{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>

                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="index.html"><img src="/template/images/icons/sach-01.png" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li class="active-menu"><a href="/">Trang Chủ</a> </li>


            <li>
                <a href="contact.html">Liên Hệ</a>
            </li>

        </ul>
    </div>

<!-- Modal Search -->
<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
    <div class="container-search-header">
        <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
            <img src="/template/images/icons/icon-close2.png" alt="CLOSE">
        </button>

        <form class="wrap-search-header flex-w p-l-15" action="{{ route('search.index') }}" method="GET">
            <button class="flex-c-m trans-04">
                <i class="zmdi zmdi-search"></i>
            </button>
            <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm...">
            <!-- Thêm input tìm kiếm ở đây -->
        </form>
    </div>
</div>
 
<style>
    // Ví dụ sử dụng jQuery
$(document).ready(function() {
    $('.js-show-favorites').on('click', function() {
        // Hiển thị danh sách yêu thích ở đây
        // Đảm bảo rằng bạn hiển thị nó một cách phù hợp, có thể sử dụng CSS để thay đổi thuộc tính display của danh sách.
        $('.favorites-list').toggleClass('active');
    });
});
</style>

    <style>
    /* CSS cơ bản cho menu thả xuống */
.dropdown {
    position: relative;
    display: inline-block;
}

.dropbtn {
    color: black;
    padding: 10px;
    border: none;
    cursor: pointer;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #ccc;
}
</style>
</header>
