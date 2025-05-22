@extends('layouts.default')

@section('content')
<div>
    <h2>Контакты пользователя, {{ $data['name'] }}!</h2>
    <h3>Адресс: {{ $data['address'] }}</h3>
    <h3>Почтовый код: {{ $data['post_code'] }}</h3>
    @if(!$data['email'])
        <h3>Электронная почта отсутствует</h3>
    @else
        <h3>Электронная почта: {{ $data['email'] }}</h3>
    @endif
    <h3>Номер телефона: {{ $data['phone'] }}</h3>


</div>
@stop
