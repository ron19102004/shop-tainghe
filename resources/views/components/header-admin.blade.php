<header class="bg-black flex justify-around items-center">
    <section class="w-14 h-14 object-cover flex items-center">
        <img src="{{ asset('images/logo.jpg') }}" alt="logo" class="w-14 h-14 object-cover rounded-full">
        <h1 class="text-white animate-pulse">Ron Shop</h1>
    </section>
    <nav>
        <ul class="text-white flex items-center space-x-2">
            <li>
                <a href="/admin"
                    class="hover:bg-white hover:text-black p-3 rounded 
                    {{ request()->is('admin') ? 'bg-white text-black' : '' }}">
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="/admin/products"class="hover:bg-white hover:text-black p-3 rounded
                {{ request()->is('admin/products') ? 'bg-white text-black' : '' }}">
                    Sản phẩm
                </a>
            </li>
            <li>
                <a href="/admin/news"class="hover:bg-white hover:text-black p-3 rounded
                {{ request()->is('admin/news') ? 'bg-white text-black' : '' }}">
                    Tin mới
                </a>
            </li>
            <li>
                <a href="/admin/about-us"class="hover:bg-white hover:text-black p-3 rounded
                {{ request()->is('admin/about-us') ? 'bg-white text-black' : '' }}">
                    Về chúng tôi
                </a>
            </li>
            <li>
                <a href="/auth/logout"class="hover:bg-white hover:text-black p-3 rounded">
                    Đăng xuất
                </a>
            </li>
        </ul>
    </nav>
</header>
