<header class="bg-black flex justify-around items-center">
    <section class="w-14 h-14 object-cover flex items-center">
        <img src="{{ asset('images/logo.jpg') }}" alt="logo" class="w-14 h-14 object-cover rounded-full">
        <h1 class="text-white animate-pulse">Ron Shop</h1>
    </section>
    <nav>
        <ul class="text-white flex items-center space-x-2">
            <li>
                <a href="/"
                    class="hover:bg-white hover:text-black p-3 rounded 
                    {{ request()->is('/') ? 'bg-white text-black' : '' }}">
                    Trang chủ
                </a>
            </li>
            <li>
                @php
                    $id = request('id') ?? 0;
                @endphp
                <a href="/products"class="hover:bg-white hover:text-black p-3 rounded
                {{ request()->is('/products') || $id != 0 ? 'bg-white text-black' : '' }}">
                    Sản phẩm
                </a>
            </li>
            <li>
                <a href="/news"class="hover:bg-white hover:text-black p-3 rounded
                {{ request()->is('/news') ? 'bg-white text-black' : '' }}">
                    Tin mới
                </a>
            </li>
            <li>
                <a href="/about-us"class="hover:bg-white hover:text-black p-3 rounded
                {{ request()->is('/about-us') ? 'bg-white text-black' : '' }}">
                    Về chúng tôi
                </a>
            </li>
            <li>
                <a href={{ Auth::check() ? '/my-cart' : '/auth/login' }}
                    class="flex items-center space-x-1 hover:bg-white hover:text-black p-3 rounded
                {{ request()->is('/my-cart') ? 'bg-white text-black' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                    <span>Giỏ hàng</span>
                </a>
            </li>
            @if (Auth::check())
                <style>
                    .dropdown {
                        position: relative;
                        display: inline-block;
                    }

                    .dropbtn {
                        color: #fff;
                        padding: 10px;
                        font-size: 16px;
                        border: none;
                        cursor: pointer;
                    }

                    .dropdown-content {
                        display: none;
                        position: absolute;
                        background-color: #f9f9f9;
                        min-width: 160px;
                        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
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
                </style>
                <li class="dropdown">
                    <button class="dropbtn rounded bg-blue-600">
                        <a href="/profile" class="flex items-center space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            <span>{{ Auth::user()->last_name }}</span>
                        </a>
                    </button>
                    <div class="dropdown-content rounded">
                        <a href="/auth/logout" class="rounded">Đăng xuất</a>
                        <a href="#" class="rounded">Mục 2</a>
                        <a href="#" class="rounded">Mục 3</a>
                    </div>
                </li>
            @else
                <li>
                    <a href="/auth/login"class="hover:bg-white hover:text-black p-3 rounded
                {{ request()->is('/auth/login') ? 'bg-white text-black' : '' }}">
                        Đăng nhập
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</header>
