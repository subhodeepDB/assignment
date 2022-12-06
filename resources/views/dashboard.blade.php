<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body class="antialiased">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Rate Chat</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li> --}}
                </ul>
                <span class="navbar-text"> 
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </span>
            </div>
        </div>
    </nav>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <br>
            <h1>Profile</h1>
            <br>
            <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <input type="file" name="file" class="form-control" id="inputGroupFile04"
                        aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>
                <br>
                <div class="form-group">
                    <div class="form-control">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}"
                            readonly>
                        <input type="hidden" name="user_id" id="id" class="form-control" value="{{ Auth::user()->id }}">
                    </div>
                    
                    <div class="form-control">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ Auth::user()->email }}" readonly>
                    </div>

                    <div class="form-control">
                        <label for="email">Orange Price</label>
                        <input type="text" name="price" id="price" class="form-control">
                    </div>

                    <div class="form-control">
                        <label for="email">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                </div>
                <br>
                {{-- <br> --}}
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
    </section>

</body>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

</html>