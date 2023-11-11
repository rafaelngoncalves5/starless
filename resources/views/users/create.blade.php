<!DOCTYPE html>

@include('base')

<body>
    @include('components.navbar')

    <main>

        <h1>Register a new user</h1>
        <form method='post' action="{{ route('user_create') }}">
            @csrf

            <label for='username'>Username:</label>
            <input id='username' name='username' placeholder='johndoe5' value={{ old('username') }}></input>

            <label for='email'>Email:</label>
            <input id='email' name='email' placeholder='johndoe5@mail.com' value={{ old('email') }}></input>
            <label for='email_confirmation'>Email confirmation:</label>
            <input id='email_confirmation' name='email_confirmation' placeholder='johndoe5@mail.com'></input>


            <label for='password'>Password:</label>
            <input id='password' name='password' type='password'></input>
            <label for='password_confirmation'>Password confirmation:</label>
            <input id='password_confirmation' name='password_confirmation' type='password'></input>

            @foreach($errors->all() as $error)
            <span class='error'><strong> - </strong>{{ $error }}</span>
            @endforeach

            <button type='submit'>Submit</button>
        </form>
    </main>

</body>

</html>
