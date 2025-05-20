@extends('layouts.default')

@section('content')
<div>
    <h2>Приветствуем пользователя, {{ $welcomeData['name'] }}!</h2>
    @if($welcomeData['age'] > 18)
        <h3>Возраст пользователя {{ $welcomeData['age']}} </h3>
        @else
            <h3>Возраст пользователя слишком мал</h3>
    @endif
    <h3>Должность: {{ $welcomeData['position']}}</h3>
    <h3>Адрес: {{ $welcomeData['address'] }}</h3>

</div>
@stop
