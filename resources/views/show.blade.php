@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Аварийная информация') }}</div>
                <div class="card-body table-responsive">
                    <div class="row">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Кем приходиться</th>
                                <th>Тип контакта</th>
                                <th>Контакт</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->contacts() as $contact)
                                <tr>
                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->role}}</td>
                                    <td>{{$contact->type}}</td>
                                    <td>{{$contact->contact}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($user->type == 'standard')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group" style="width: 200px">
                                <img src="{{asset($user->img)}}" alt="" style="width: 100%">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Имя:</label>
                                 <h6>{{$user->name}}</h6>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Телефон:</label>
                                <h6>{{$user->phone}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Личная информация:</label>
                            <p placeholder="Текст ..."  name="information" id=""  cols="30" rows="10">{{$user->information}}</p>
                        </div>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
   <style>
       .row {
           margin-bottom: 1rem;
       }
   </style>
@endsection
