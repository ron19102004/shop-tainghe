@extends('layouts.app')
@section('title', 'Ron Shop')
@section('main')
    <section class="p-3 space-y-5">
        <div class="md:flex md:space-x-5">
            <div class="md:flex-1">
                <div class="flex flex-col justify-center items-center relative">
                    <div id="wrap-imgs" class="lg:w-[30rem] lg:h-[30rem] h-96 w-96 ">
                        <?php
                        $index = 0;
                        foreach ($product->imagesProduct as $image) {
                            $class = $index == 0 ? 'image-' . $index : 'hidden image-' . $index;
                            echo '<img src="' . asset($image->image) . '" alt="' . $image->name . '" class="min-w-full min-h-full object-cover rounded ' . $class . '" id = "image-' . $index . '">';
                            $index += 1;
                        }
                        echo '<input type="numbber" id="length-images" hidden value="' . $index . '">';
                        ?>
                    </div>
                    <div
                        class="flex md:flex-col md:absolute  md:left-0 md:space-x-0 space-x-5 md:space-y-5 h-full overflow-y-auto">
                        <?php
                        $index = 0;
                        foreach ($product->imagesProduct as $image) {
                            $class = $index == 0 ? 'border-2' : 'opacity-40';
                            echo '<div id = "div-image-small-' . $index . '" class="">';
                            echo '<img src="' . asset($image->image) . '" alt="' . $image->name . '" class="xl:w-28 xl:h-28 lg:w-20 lg:h-20 w-16 h-16 object-cover bg-transparent rounded-full p-2 ' . $class . '"  id = "image-small-' . $index . '">';
                            echo '</div>';
                            $index += 1;
                        }
                        ?>
                    </div>
                </div>
                <script>
                    $(() => {
                        const time = 3000;
                        const lengthImages = $('#length-images').val() - 1;
                        var index = 0;
                        let slide = setInterval(() => {
                            $(`#image-${index+1}`).removeClass("hidden");
                            $(`#image-${index}`).addClass("hidden");
                            $(`#image-small-${index+1}`).addClass("border-2");
                            $(`#image-small-${index+1}`).removeClass("opacity-40");
                            $(`#image-small-${index}`).addClass("opacity-40");
                            $(`#image-small-${index}`).removeClass("border-2");
                            index++;
                            if (index > lengthImages) {
                                $(`#image-0`).removeClass("hidden");
                                $(`#image-${lengthImages}`).addClass("hidden");
                                $(`#image-small-0`).addClass("border-2");
                                $(`#image-small-0`).removeClass("opacity-40");
                                $(`#image-small-${lengthImages}`).addClass("opacity-40");
                                $(`#image-small-${lengthImages}`).removeClass("border-2");
                                index = 0;
                            }
                        }, time);
                        $('#wrap-imgs').mouseover(() => {
                            clearInterval(slide)
                        })
                        $('#wrap-imgs').mouseout(() => {
                            slide = setInterval(() => {
                                $(`#image-${index+1}`).removeClass("hidden");
                                $(`#image-${index}`).addClass("hidden");
                                $(`#image-small-${index+1}`).addClass("border-2");
                                $(`#image-small-${index+1}`).removeClass("opacity-40");
                                $(`#image-small-${index}`).addClass("opacity-40");
                                $(`#image-small-${index}`).removeClass("border-2");
                                index++;
                                if (index > lengthImages) {
                                    $(`#image-0`).removeClass("hidden");
                                    $(`#image-${lengthImages}`).addClass("hidden");
                                    $(`#image-small-0`).addClass("border-2");
                                    $(`#image-small-0`).removeClass("opacity-40");
                                    $(`#image-small-${lengthImages}`).addClass("opacity-40");
                                    $(`#image-small-${lengthImages}`).removeClass("border-2");
                                    index = 0;
                                }
                            }, time);
                        })
                        for (let i = 0; i <= lengthImages; i++) {
                            $(`#div-image-small-${i}`).mouseover(() => {
                                clearInterval(slide)
                                if (index !== i) {
                                    $(`#image-${i}`).removeClass("hidden");
                                    $(`#image-${index}`).addClass("hidden");
                                    $(`#image-small-${i}`).addClass("border-2");
                                    $(`#image-small-${i}`).removeClass("opacity-40");
                                    $(`#image-small-${index}`).addClass("opacity-40");
                                    $(`#image-small-${index}`).removeClass("border-2");
                                    index = i
                                }
                            })
                            $(`#div-image-small-${i}`).mouseout(() => {
                                slide = setInterval(() => {
                                    $(`#image-${index+1}`).removeClass("hidden");
                                    $(`#image-${index}`).addClass("hidden");
                                    $(`#image-small-${index+1}`).addClass("border-2");
                                    $(`#image-small-${index+1}`).removeClass("opacity-40");
                                    $(`#image-small-${index}`).addClass("opacity-40");
                                    $(`#image-small-${index}`).removeClass("border-2");
                                    index++;
                                    if (index > lengthImages) {
                                        $(`#image-0`).removeClass("hidden");
                                        $(`#image-${lengthImages}`).addClass("hidden");
                                        $(`#image-small-0`).addClass("border-2");
                                        $(`#image-small-0`).removeClass("opacity-40");
                                        $(`#image-small-${lengthImages}`).addClass("opacity-40");
                                        $(`#image-small-${lengthImages}`).removeClass("border-2");
                                        index = 0;
                                    }
                                }, time);
                            })
                        }
                    })
                </script>
            </div>
            <div class="md:basis-2/5 bg-slate-200 space-y-5 p-5">
                <div class="flex flex-col justify-between md:h-full">
                    <div class="space-y-5">
                        <div class="">
                            <span class="font-1 font-bold text-blue-900">Danh mục: {{ $product->category->name }}</span>
                            <h1 class="line-clamp-5 text-ellipsis font-2 text-4xl lg:text-5xl xl:text-6xl">
                                {{ $product->name }}</h1>
                            <div class="flex items-center mt-2.5 mb-5">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                    @php
                                        $numberOfIterations_ = 5; // Số lần lặp
                                    @endphp
                                    @foreach (range(1, $numberOfIterations_) as $iteration)
                                        @if (round($product->starRate) >= $iteration)
                                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                        @endif
                                    @endforeach
                                </div>
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{ $product->starRate }}</span>
                            </div>
                        </div>

                        <div class="space-y-5">
                            <!-- Product Color -->
                            <div class="">
                                <span class="font-1 font-bold">Màu sắc</span>
                                <div class="flex space-x-3 items-center">
                                    @foreach ($product->colorsProduct as $colorProduct)
                                        <div class="flex space-x-2 items-center">
                                            <input type="radio" name="color" value="{{ $colorProduct->color->id }}"
                                                style="background-color: {{ $colorProduct->color->value }}"
                                                class="ring-1 size-9" onclick="selectColor({{ $colorProduct->color->id }})">
                                            <label for="color" id="color-{{ $colorProduct->color->id }}" class="text-sm">
                                                {{ $colorProduct->color->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <script>
                                        let colorId = 0;
                                        const selectColor = (value) => {
                                            const class$ = 'font-2'
                                            $(() => {
                                                if (colorId + '' !== value + '') {
                                                    $(`#color-${colorId}`).removeClass(class$)
                                                    $(`#color-${value}`).addClass(class$)
                                                    colorId = value;
                                                }
                                            })

                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Pricing -->
                    <div class="flex items-center space-x-5 font-3">
                        <span class="formatted-price font-3 text-3xl">{{ $product->price }}.000VNĐ</span>
                        <button type="button"
                            class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 flex items-center space-x-1">
                            <div class="relative">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
                                <span class="absolute -right-1 -top-2.5">+</span>
                            </div>
                            <span class="uppercase">Thêm giỏ hàng</span>
                        </button>
                        <button type="button"
                            class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 flex items-center space-x-1">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                            </div>
                            <span class="uppercase"> mua ngay</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:flex md:space-x-5">
            <div class="font-1 flex-1 max-h-screen overflow-y-auto">
                <h1 class="font-3 text-2xl">Mô tả</h1>
                <p class="font-2">{!! $product->description !!}</p>
            </div>
            <div class="md:basis-2/5 space-y-5">
                <h1 class="font-3 text-2xl">Sản phẩm khác</h1>
                <ul class="flex flex-col space-y-5">
                    @foreach ($products_new as $product_new)
                        <div
                            class="flex flex-col items-center bg-white border border-gray-200 rounded-2xl shadow md:flex-row w-full hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <img class="object-cover w-full h-96 md:h-full md:w-48 rounded-2xl p-2"
                                src="{{ asset($product_new->imagesProduct[0]->image) }}"
                                alt="{{ asset($product_new->imagesProduct[0]->image) }}">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <div>
                                    <a href="/products/id={{ $product_new->id }}"
                                        class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white line-clamp-2 text-ellipsis">
                                        {{ $product_new->name }}</a>
                                    <div class="flex items-center mt-2.5 mb-5">
                                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                            @php
                                                $numberOfIterations = 5; // Số lần lặp
                                            @endphp
                                            @foreach (range(1, $numberOfIterations) as $iteration)
                                                @if (round($product_new->starRate) >= $iteration)
                                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                @else
                                                    <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                @endif
                                            @endforeach
                                        </div>
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{ $product_new->starRate }}</span>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <p class=" font-normal text-gray-700 dark:text-white font-3 text-xl formatted-price">
                                        {{ $product_new->price }}.000VNĐ</p>
                                    <button type="button"
                                        class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-xs px-2 py-1 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 flex items-center space-x-1">
                                        <div class="relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                            </svg>
                                            <span class="absolute -right-1 -top-2.5">+</span>
                                        </div>
                                        <span class="uppercase">Thêm giỏ hàng</span>
                                    </button>
                                    <a type="button" href="/products/id={{ $product_new->id }}"
                                        class="py-1 px-2  text-xs font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 flex items-center space-x-1">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                            </svg>
                                        </div>
                                        <span class="uppercase">chi tiết</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var priceElements = document.querySelectorAll('.formatted-price');
        priceElements.forEach(function(element) {
            var price = parseFloat(element.innerText.replace(/[^\d]/g, '')); // Lấy giá trị số từ chuỗi
            var formattedPrice = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            }).format(price);
            element.innerText = formattedPrice;
        });
    });
</script>
