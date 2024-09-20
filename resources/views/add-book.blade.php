<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Tambah Buku</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/cookers.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
        integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style-default.css') }}" />
</head>

<body>
    {{-- header --}}
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md text-center pt-5">
                    <h1>Tambah Buku</h1>
                </div>
            </div>
        </div>
    </header>
    {{-- header end --}}



    {{-- form --}}
    <section class="form-masuk">
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif

        <div class="container">
            <form action="{{ route('add-book') }}" method="POST" enctype="multipart/form-data" autocomplete="on">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama </label>
                            <input type="text" name='name' class="form-control" id="name" aria-describedby="name"
                                value='{{ old("name") }}' />
                            @error('name')
                                <div class="alert alert-danger mt-1 mb-1">
                                    Nama wajib diisi
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Jumlah </label>
                            <input type="number" name='amount' class="form-control" id="amount"
                                aria-describedby="amount" value='{{ old("amount") }}' />
                            @error('amount')
                                <div class="alert alert-danger mt-1 mb-1">
                                    Jumlah wajib diisi
                                </div>
                            @enderror
                        </div>
                        @error('add-error')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <div class="text-end">
                            <button type="submit" id="btn-submit" class="">Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    {{-- form end --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    <script src="{{ asset('js/script-auth.js') }}"></script>
</body>

</html>