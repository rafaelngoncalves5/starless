<!DOCTYPE html> <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <head> <meta charset="utf-8"> <meta
    name="viewport" content="width=device-width, initial-scale=1"> <title>Hello, my new index!</title> </head> <body>

<h1>Post your stuff here!</h1>
<form method='post' action="{{ route('user_create') }}">
    @csrf

    <label for='username'>Username:</label>
    <input id='username' name='username' placeholder='johndoe5'></input>

    <label for='email'>Email:</label>
    <input id='email' name='email' placeholder='johndoe5@mail.com'></input>

    <label for='password'>Password:</label>
    <input id='password' name='password' type='password'></input>

    <button type='submit'>Submit</button>
</form>

@if (request()->getMethod() === 'POST')
<p>Data received => {{ print_r($new_user) }} created with success!</p>
@else
<p>Sua request não é POST</p>
@endif

</body>

</html>