<!DOCTYPE html>

<html>

@include('base')

<body>
    @include('components.navbar')

    <main style='box-shadow: none; margin-top: 15vh; text-align: center;'>
        <h1 style='margin: 1rem 0;'>Operation finished with success!</h1>

        <hr />

        <p style='color: var(--primary-color);'>{{ $feedback }}</p>

        <img style='margin-top: 3rem;' src="{{ asset('images/success-250.png') }}" alt='Success icon' />

    </main>

</body>

</html>
