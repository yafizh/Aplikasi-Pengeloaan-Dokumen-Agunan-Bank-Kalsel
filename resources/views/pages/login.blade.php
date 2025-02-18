<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="row g-0 mt-5">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center">BANK KALSEL</h5>
                    <h5 class="text-center mb-3">APLIKASI PENGELOLAAN DOKUMEN AGUNAN</h5>
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form class="mt-3" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Usernae</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
</body>

</html>
