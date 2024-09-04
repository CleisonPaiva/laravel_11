@extends('admin.layouts.app')
@section('title')
    INDEX
@endsection

@section('content')
    <h1>Usuários</h1>

    <a href="{{ route('users.create') }}">Novo</a>

    <x-alert></x-alert>

    <table>
        <thead>
            <tr>
                <td>Nome</td>
                <td>E-mail</td>
                <td>Ações</td>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}">Editar</a>
                        <a href="{{ route('users.destroy', $user->id) }}">Excluir</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100">Nenhum Usuário no Banco</td>

                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $users->links() }}
@endsection
