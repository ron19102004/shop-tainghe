@include('admin.product.add-product', ['categories' => $categories])
<section class="">
    <div class="overflow-auto">
        <table class="w-full max-h-screen text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        Mã sản phẩm
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Tên sản phẩm
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Tên danh mục
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Màu sắc
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Ảnh
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Giá
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Mô tả
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Đã bán
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Có sẵn
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Chức năng
                    </th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($products as $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ $product->id }}
                        </td>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $product->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $product->category_name }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col justify-center items-center space-y-2">
                                @foreach ($product->colorsProduct as $color)
                                    <span class="text-black w-full px-2 text-center py-1 font-bold" style="background-color: {{ $color->color->value }}">
                                        {{ $color->color->name }}
                                    </span>
                                @endforeach
                                @include('admin.product.all-color-product', [
                                    'colors' => $product->colorsProduct,
                                    'product_id' => $product->id,
                                    'product_name' => $product->name,
                                ])
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col justify-center items-center space-y-2">
                                <span class="text-center">{{count($product->imagesProduct)}} Ảnh</span>
                                @include('admin.product.all-image-product', [
                                    'images' => $product->imagesProduct,
                                    'product_name' => $product->name,
                                ])
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->price }}kVNĐ
                        </td>
                        <td class="px-6 py-4">
                            <div class="h-32 overflow-y-auto">
                                <?php echo $product->description; ?>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->beSale }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->amount_available }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col justify-center items-center space-y-2">
                                @include('admin.product.add-product-color', [
                                    'product' => $product,
                                    'colors' => $colors,
                                ])
                                @include('admin.product.add-product-image', [
                                    'product' => $product,
                                ])
                                @include('admin.product.edit-product', [
                                    'product' => $product,
                                    'categories' => $categories,
                                ])
                                <form action="/admin/products" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="number" hidden value="{{ $product->id }}"
                                        name="product_id">
                                    <button data-tooltip-target="tooltip-delete-product{{ $product->id }}" type="submit" class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <div id="tooltip-delete-product{{ $product->id }}" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Xóa sản phẩm
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
