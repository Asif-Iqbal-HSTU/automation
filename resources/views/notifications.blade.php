@extends('master')

@section('titleContent')
    <title>Student Profile Page</title>
    <style>
        .image-cropper {
            width: 150px;
            /* Adjust the width and height as needed */
            height: 150px;
            overflow: hidden;
            display: flex;
            border-radius: 50%;
            margin: 0 auto;
        }

        .image-cropper img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 50%;
        }

        body {
            background-color: #FAFAFA;
        }

        .card-centered {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .card-img-top {
            width: 150px;
            /* Adjust the desired width */
            height: 150px;
            /* Adjust the desired height */
            object-fit: cover;
            border-radius: 0%;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <nav class="navbar navbar-dark bg-primary">
            <div class="container-fluid">
                <!-- Navbar brand -->
                <a class="navbar-brand" href="#">HSTU Automation Program</a>

                <!-- Navbar links -->
                <ul class="navbar-nav ml-auto flex-row">
                    {{-- <li class="nav-item mr-2">
                        <a class="nav-link" href="#"><i class="fa-solid fa-house-user fa-lg"></i>Home</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"><i
                                class="fa-solid fa-arrow-right-from-bracket fa-lg"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    @if ($user)

    @else
        <p>No record found for the provided UID.</p>
    @endif


    <script>
        $(document).ready(function() {
            $('#updatePasswordForm').submit(function(e) {
                e.preventDefault();
                var form = $(this);

                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        // Password updated successfully
                        $('.modal-body').prepend(
                            '<div class="alert alert-success">Password updated successfully!</div>'
                        );
                        form[0].reset();
                    },
                    error: function(xhr) {
                        // Display the error message
                        var errorMessage = xhr.responseJSON.message;
                        $('.modal-body').prepend('<div class="alert alert-danger">' +
                            errorMessage + '</div>');
                    }
                });
            });
        });
    </script>
@endsection
