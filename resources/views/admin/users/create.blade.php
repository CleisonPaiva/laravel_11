@extends('admin.layouts.app')
@section('title')
    CREATE
@endsection

@section('content')
    <h1>Novo Usuário</h1>

    <x-alert></x-alert>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf()
        <input name="name" type="text" placeholder="Nome" value="{{ old('name') }}">
        <input name="email" type="email" placeholder="E-mail" value="{{ old('email') }}">
        <input name="password" type="password" placeholder="Password">

        <button type="submit">Salvar</button>
    </form>
@endsection
 