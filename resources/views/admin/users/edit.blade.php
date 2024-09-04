@extends('admin.layouts.app')
@section('title')
    EDIT
@endsection

@section('content')
    <h1>Editar Usuário</h1>

    <x-alert></x-alert>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf()
        @method('PUT')
        
        <input name="name" type="text" placeholder="Nome" value="{{ $user->name }}">
        <input name="email" type="email" placeholder="E-mail" value="{{ $user->email }}">
        <input name="password" type="password" placeholder="Password">

        <button type="submit">Salvar</button>
    </form>
@endsection
 