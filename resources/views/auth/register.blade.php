@extends('layout.default')

@section('style')
    <style>
        html,
        body {
            height: 100%;
        }

        .form-signin {
            max-width: 330px;
            padding: 1rem;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {

            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
@endsection
@section('content')
    <main class="form-signin  m-auto">
        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <img class="mb-4" src="{{ asset('assets/img/F.png') }}" alt="" width="72" height="72">
            <h1 class="h3 mb-3 fw-normal">Create Your Account</h1>

            <div class="form-floating">
                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Enter name">
                @error('name')
                    <span class="text-danger">{{ $message }}></span>
                @enderror
                <label for="floatingInput">Full Name</label>
            </div>
            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                @error('email')
                    <span class="text-danger">{{ $message }}></span>
                @enderror
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating" style="margin-bottom: 10px">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                @error('password')
                    <span class="text-danger">{{ $message }}></span>
                @enderror


                <label for="floatingPassword">Password</label>
            </div>

            @if (session()->has('success'))
                <div class="alert alert-sucess">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session("error"))
            <div class="alert alert-danger">
                {{session("error")}}

            @endif
            <button class="btn btn-primary w-100 py-2" type="submit">Create your account</button>

        </form>
    </main>
@endsection
