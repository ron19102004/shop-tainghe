@extends('layouts.admin')
@section('title', 'Ron Shop Admin - Sản phẩm')
@section('main')
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
    <div class="space-y-3">
        @include('admin.product.all-category')
        @include('admin.product.all-color')
        @include('admin.product.all-product')
    </div>
@endsection
