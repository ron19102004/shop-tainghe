@extends('layouts.app')
@section('title', 'RON-SHOP')
@section('main')
    <section class="space-y-3">
        <h1 class="uppercase font-bold text-3xl text-center">top bán chạy</h1>
        <ul class="px-36 grid gap-3 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-between">
            @foreach ($products as $product)
                <li class="">
                    <div
                        class="w-full h-full flex flex-col justify-between items-center bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-3">
                        <div class="w-full h-full">
                            <a href="/products/id={{$product->id}}">
                                <img src="{{ count($product->imagesProduct) > 0 ? asset($product->imagesProduct[0]->image) : '' }}"
                                    alt="{{ $product->name }}" class="rounded-lg object-cover  transition-all min-w-full min-h-full" />
                            </a>
                        </div>
                        <div class="px-5 pb-5">
                            <a href="/products/id={{$product->id}}">
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                    {{ $product->name }}</h5>
                            </a>
                            <div class="flex items-center mt-2.5 mb-5">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                    @php
                                        $numberOfIterations = 5; // Số lần lặp
                                    @endphp
                                    @foreach (range(1, $numberOfIterations) as $iteration)
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
                                    class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{$product->starRate}}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span
                                    class="formatted-price text-3xl font-bold text-gray-900 dark:text-white">{{ $product->price }}.000
                                    VNĐ</span>
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
                                <a href="/add-my-cart/{{$product->id}}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                    to cart</a>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
@endsection
