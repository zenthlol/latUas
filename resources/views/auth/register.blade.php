<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <div class="p-5">
        <h1 class="text-center">{{ __('form.title') }}</h1>
        <form action="{{route('register_process')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="" class="form-label">{{ __('form.input.name') }}</label>
                <input name="name" type="text" class="form-control" id="" value="{{old('name')}}">
            </div>

            @error('name')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">{{__('form.input.email')}}</label>
                <input name="email" type="email" class="form-control" id="" value="{{old('email')}}">
            </div>

            @error('email')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">{{__('form.input.password')}}</label>
                <input name="password" type="password" class="form-control" id="" value="{{old('password')}}">
            </div>

            @error('password')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            {{-- <div class="mb-3">
                <label for="" class="form-label">Password Confirmation</label>
                <input name="password_confirmation" type="password" class="form-control" id="" value="{{old('password_confirmation')}}">
            </div>

            @error('password_confirmation')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror --}}

            <a href="{{route('login')}}">Login Account</a>
            <button type="submit" class="btn btn-primary">{{__('form.button')}}</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
