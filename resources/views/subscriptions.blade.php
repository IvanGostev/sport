@extends('layouts.app')
@section('content')

    <section class="h-100 h-custom">
        <div class="container h-100">
            <div class="container py-3">
                <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                    <h1 class="display-4 fw-normal">Подписки</h1>
                    <p class="fs-5 text-muted">Вы получаете подарки за то, что пользуетесь сервисами Яндекса.
                        Как это работает: получаете звездочки за действия в сервисах, набираете их нужное количество и
                        забираете подарок. И дальше — за новым подарком.
                        А если выполнять задания недели, можно получать больше звездочек и другие награды.</p>
                </div>

                <main>
                    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                        <div class="col">
                            <div class="card mb-4 rounded-3 shadow-sm">
                                <div class="card-header py-3">
                                    <h4 class="my-0 fw-normal">Месяц</h4>
                                </div>
                                <div class="card-body" style="height: 31vh;  display: flex;
  flex-direction: column;  ">
                                    <div style="height: 25vh; display: flex;
  flex-direction: column; justify-content: flex-start;">
                                        <h1 class="card-title pricing-card-title">2000 руб</h1>
                                        <p class="list-unstyled mt-3 mb-4">
                                            10 users included
                                            2 GB of storage
                                            Email support
                                            Help center access
                                        </p>
                                    </div>
                                    <div style="height: 6vh; display: flex;
  flex-direction: column; justify-content: flex-end;" >
                                        <button type="button" class="w-100 btn btn-lg btn-outline-primary">Sign up for
                                            free
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-4 rounded-3 shadow-sm">
                                <div class="card-header py-3">
                                    <h4 class="my-0 fw-normal">Пол года</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title">4500 руб</h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li>20 users included</li>
                                        <li>10 GB of storage</li>
                                        <li>Priority email support</li>
                                        <li>Help center access</li>
                                    </ul>
                                    <button type="button" class="w-100 btn btn-lg btn-primary">Get started</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-4 rounded-3 shadow-sm border-primary">
                                <div class="card-header py-3 text-white bg-primary border-primary">
                                    <h4 class="my-0 fw-normal">Год</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title">6500 руб</h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li>30 users included</li>
                                        <li>15 GB of storage</li>
                                        <li>Phone and email support</li>
                                        <li>Help center access</li>
                                    </ul>
                                    <button type="button" class="w-100 btn btn-lg btn-primary">Contact us</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

            </div>
        </div>
    </section>
@endsection
