@extends('layouts.app')
@section('content')
    <section class="h-100 h-custom">
        <div class="container h-100">
            <div class="container py-3">
                <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                    <h1 class="display-4 fw-normal">Моя подписка</h1>
                    @if(1)
                        <p class="fs-5 text-muted">У вас нет подписки, ваш профиль не активен</p>
                        <a href="{{route('subscription.index')}}" class="fs-4 btn btn-light btn-block">Перейти к
                            тарифам</a>
                </div>
                @else
                    <div class="card">
                        <h5 class="card-header">Мой
                            тариф: {{auth()->user()->subscription_months . auth()->user()->subscription_months != 1 ? 'месяцев' : 'месяц' }} </h5>
                        <div class="card-body">
                            <h5 class="card-title">Активна
                                до {{auth()->user()->day_pay != null ? \Carbon\Carbon::create(auth()->user()->day_pay)->addMonths(auth()->user()->subscription_months)->toDateString() : '-' }}
                            </h5>
                            <form class="card-text">
                                <button class="btn btn-light">Отключить авто продление</button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
