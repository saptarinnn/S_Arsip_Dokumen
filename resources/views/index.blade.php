<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico" />

    <title>Pengarsipan Dokumen</title>

    @vite('resources/js/app.js')

</head>

<body>
    <!-- Content -->

    <div class="container h-auto d-flex justify-content-center align-items-center" style="min-height: 100vh">
        <!-- Register -->
        <div class="card" style="max-width: 481px">
            <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center mb-3">
                    <span class="demo menu-text fw-bold" style="font-size: 20px;"><span
                            class="text-primary">_pengarsipan</span>Document</span>
                </div>

                <h5 class="fw-semibold m-0 p-0 mb-1">Login</h5>
                <p class="mb-4">Selamat datang kembali, masukkan kredensial Anda untuk melanjutkan.</p>

                <x-form action="{{ route('login') }}">
                    <x-form.input label="Username" name="username" value="{{ old('name') }}" autofocus required />
                    <x-form.input label="Password" name="password" type="password" required />

                    <div class="d-flex">
                        <button type="submit" style="width: 100%"
                            class="btn btn-primary text-white mt-3">Login</button>
                    </div>
                </x-form>

            </div>
        </div>
        <!-- /Register -->
    </div>

    <!-- / Content -->

</body>

</html>
