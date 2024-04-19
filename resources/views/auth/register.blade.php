<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Authentications - Register</title>
    <link rel="shortcut icon" type="image/png" href="/admin/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="/admin/assets/css/styles.min.css" />
</head>


<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">

                                    @if ($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    aria-describedby="textHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-4">
                                                <label for="major" class="form-label">Major</label>
                                                <input type="text" class="form-control" id="major"
                                                    name="major">
                                            </div>
                                            <div class="mb-4">
                                                <label for="id_number" class="form-label">Id Number</label>
                                                <input type="number" class="form-control" id="id_number"
                                                    name="id_number">
                                            </div>
                                            <div class="mb-4">
                                                <label for="class_id" class="form-label">Class</label>
                                                <select name="class_id" id="class_id" class="form-control">
                                                    @foreach ($classes as $class)
                                                        <option value="{{ $class->id }}">{{ $class->class }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-4">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password"
                                                    name="password">
                                            </div>
                                            <div class="mb-4">
                                                <label for="password" class="form-label">Konfirmasi Password</label>
                                                <input type="password" class="form-control" id="password_confirmation"
                                                    name="password_confirmation">
                                            </div>
                                            <div class="mb-3">
                                                <select id="role_id" name="role_id" class="form-select" hidden>
                                                    <option value="3" selected>Student</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <button type="submit" class="btn btn-danger w-100 py-8 fs-4 mb-4 rounded-2">Sign
                                        Up</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Already have an account?</p>
                                        <a class="text-danger fw-bold ms-2" href="/login">Log In</a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="/admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
