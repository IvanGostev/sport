@extends('layouts.app')
@section('content')

    <section class="h-100 h-custom">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3 class="fw-bold mb-0">Корзина</h3>
                                            <h6 class="mb-0 text-muted">{{count($products)}} товара</h6>
                                        </div>
                                        <hr class="my-4">
                                        @foreach($products as $product)
                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img
                                                        src="{{asset(getProductById($product->id))}}"
                                                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h5 class="text-muted">{{$product->title}}</h5>
{{--                                                    <h5 class="mb-0">{{$product->category()->title}}</h5>--}}
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                    <button data-mdb-button-init data-mdb-ripple-init
                                                            class="btn btn-link px-2"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                        <i class="fas fa-minus"></i>
                                                    </button>

                                                    <input id="form1" min="0" name="quantity" value="{{$product->qty}}" type="number"
                                                           class="form-control form-control-sm"/>

                                                    <button data-mdb-button-init data-mdb-ripple-init
                                                            class="btn btn-link px-2"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h5 class="mb-0">{{$product->price}} руб</h5>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                                                </div>
                                            </div>
                                            <hr class="my-4">
                                        @endforeach
                                        <div class="pt-2">
                                            <h5 class="mb-0"><a href="{{route('product.index')}}" class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Вернуться в магазин</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-body-tertiary">
                                    <div class="p-4">
                                        <h3 class="fw-bold pt-1">Данные</h3>
                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-3">
                                            <h5 class="">Товаров: {{count($products)}}</h5>
                                            <h5>{{$total}} руб</h5>
                                        </div>
                                        <h5 class="mb-2">Адрес</h5>

                                        <div class="mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <textarea type="text" placeholder="Введите адрес доставки"
                                                          class="form-control form-control-lg " rows="2"></textarea>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-3">
                                            <h5 class="">К оплате:</h5>
                                            <h5>{{$total}} руб</h5>
                                        </div>

                                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-dark btn-block btn-lg"
                                                data-mdb-ripple-color="dark">Оплатить
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
