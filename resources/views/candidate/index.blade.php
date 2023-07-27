<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
</head>

<body>




    <a href="{{ route('logout') }}">KELUAR</a>

    <div class="container mt-5">
        <div class="d-flex mb-3">
            <h1>DATA CANDIATE</h1>

            @auth

            @endauth
            <?php $cek = Auth::user()->level;
            if ($cek === 'superadmin') :
            ?>

            <a href="{{ route('candidate.new') }}" class="btn btn-success ml-auto"> NEW CANDIDATE</a>

            <?php endif;?>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Birthday</th>
                            <th scope="col">resume</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($candidates as $candidate)
                            <tr>
                                <th scope="row">{{ $candidate->name }}</th>
                                <td>{{ $candidate->email }}</td>
                                <td>{{ $candidate->birthday }}</td>
                                <td>{{ $candidate->resume }}</td>
                                <td>
                                    <a href="{{ route('candidate.show', $candidate->id) }}" type="button"
                                        class="btn btn-primary"><i class="far fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
