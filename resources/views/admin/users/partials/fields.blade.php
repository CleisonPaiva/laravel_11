<x-alert></x-alert>
@csrf()
<input name="name" type="text" placeholder="Nome" value="{{$user->name ?? old('name') }}">
<input name="email" type="email" placeholder="E-mail" value="{{$user->email ?? old('email') }}">
<input name="password" type="password" placeholder="Password">

<button type="submit">Salvar</button>