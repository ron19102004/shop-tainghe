<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
    <title>Đăng nhập</title>
</head>

<body>
    <main class="min-w-screen min-h-screen flex flex-col justify-center items-center bg-black">
        <section class="bg-white p-24 rounded">
            @if ($errors->any())
                <section class="rounded space-y-3">
                    @foreach ($errors->all() as $error)
                        <script>
                            $(() => {
                                $.toast({
                                    heading: 'Error',
                                    text: '{{ $error }}',
                                    showHideTransition: 'fade',
                                    icon: 'error',
                                    position: 'top-right'
                                })
                            })
                        </script>
                    @endforeach
                </section>
            @endif
            <h1 class="text-center text-3xl font-bold">RON SHOP</h1>
            <form action="/auth/login" method="post" class="space-y-3">
                @csrf
                <div>
                    <label for="email" class="font-semibold text-sm flex items-center space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                        <span>Email</span>
                    </label>
                    <input type="email" name="email" id="email" placeholder="ron19102004@gmail.com"
                        class="w-[100%] rounded outline-none h-10" required>
                </div>
                <div>
                    <label for="password"class="font-semibold text-sm flex items-center space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span>
                            Mật khẩu
                        </span>
                    </label>
                    <input type="password" name="password" id="password" placeholder="********"
                        class="w-[100%] rounded outline-none h-10" required>
                </div>
                <div class="flex flex-col justify-center items-center">
                    <button type="submit"
                        class="w-full h-10 bg-blue-500 hover:bg-blue-600 text-white rounded text-sm">Đăng
                        nhập</button>
                </div>
                <div>
                    <p>Bạn chưa có tài khoản?
                        <a href="/auth/register" class="hover:underline text-red-500 hover:text-red-600">
                            Đăng ký ngay
                        </a>
                    </p>
                </div>
            </form>
        </section>

    </main>
</body>

</html>
