@extends('layouts.app')
@section('content')
    <section class="h-100 h-custom">
        <div class="container h-100">
            <div class="container py-3">
                <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                    <h1 class="display-4 fw-normal">Моя подписка</h1>
                    @if(!$subscription)
                    <p class="fs-5 text-muted">У вас нет подписки, ваш профиль не активен</p>
                    <a href="{{route('subscription.index')}}" class="fs-4 btn btn-light btn-block">Перейти к тарифам</a>
                        @endif
                </div>
                @if($subscription)
                <div class="card">
                    <h5 class="card-header">Мой тариф: {{$subscription->subscriptionParent()->title}}</h5>
                    <div class="card-body">
                        <h5 class="card-title">Активна до {{$subscription->active()}}</h5>
                        <p class="card-text">{{$subscription->subscriptionParent()->description}}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
@endsection
