<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
    <title>Đăng ký</title>
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
            <form action="/auth/register" method="post" class="space-y-3">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div>
                        <label for="first_name" class="font-semibold text-sm flex items-center space-x-1">
                            <span>Họ đệm</span>
                        </label>
                        <input type="text" name="first_name" id="first_name" placeholder="Trần Ngọc Anh"
                            class="w-[100%] rounded outline-none h-10" required>
                    </div>
                    <div>
                        <label for="last_name" class="font-semibold text-sm flex items-center space-x-1">
                            <span>Tên</span>
                        </label>
                        <input type="text" name="last_name" id="last_name" placeholder="Dũng"
                            class="w-[100%] rounded outline-none h-10" required>
                    </div>
                    <div>
                        <label for="email" class="font-semibold text-sm flex items-center space-x-1">
                            <span>Email</span>
                        </label>
                        <input type="email" name="email" id="email" placeholder="ron19102004@gmail.com"
                            class="w-[100%] rounded outline-none h-10" required>
                    </div>
                    <div>
                        <label for="phone" class="font-semibold text-sm flex items-center space-x-1">
                            <span>Số điện thoại</span>
                        </label>
                        <input type="tel" name="phone" id="phone" placeholder="0392477615"
                            class="w-[100%] rounded outline-none h-10" required>
                    </div>
                    <div>
                        <label for="password"class="font-semibold text-sm flex items-center space-x-1">
                            <span>
                                Mật khẩu
                            </span>
                        </label>
                        <input type="password" name="password" id="password" placeholder="********"
                            class="w-[100%] rounded outline-none h-10" required>
                    </div>
                    <div>
                        <label for="re-password"class="font-semibold text-sm flex items-center space-x-1">
                            <span>
                                Mật khẩu vừa nhập
                            </span>
                            <span id="check"></span>
                        </label>
                        <input type="password" name="re-password" id="re-password" placeholder="********"
                            class="w-[100%] rounded outline-none h-10" required>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center" id="gr-btn">
                    <button type="button"
                        class="w-full h-10 bg-blue-500 hover:bg-blue-600 text-white rounded text-sm">Đăng
                        ký</button>
                </div>
                <div>
                    <p>Bạn đã có tài khoản?
                        <a href="/auth/login" class="hover:underline text-red-500 hover:text-red-600">
                            Đăng nhập ngay
                        </a>
                    </p>
                </div>
            </form>
        </section>

    </main>
</body>
<script>
    $(() => {
        $('#re-password').change(() => {
            const rePass = $('#re-password').val();
            const pass = $('#password').val();
            console.log(rePass, pass);
            if (pass === rePass) {
                $('#gr-btn').html(`
                <button type="submit"
                        class="w-full h-10 bg-blue-500 hover:bg-blue-600 text-white rounded text-sm">
                        Đăng ký
                </button>
            `);
                $('#check').html(`
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            `)
            } else {
                $('#gr-btn').html(`
                <button class="w-full h-10 bg-blue-500 hover:bg-blue-600 text-white rounded text-sm">
                        Đăng ký
                </button>
            `);
                $('#check').html(`
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            `);
            }
        })
    })
</script>

</html>
