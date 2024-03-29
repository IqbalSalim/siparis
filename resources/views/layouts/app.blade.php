<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        [x-cloak] {
            display: none
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{ $slot }}
        </main>
    </div>
    @livewireScripts
    <livewire:scripts />
    @livewireChartsScripts

    <script>
        window.addEventListener('swal:success', event => {
            swal({
                title: event.detail.message,
                text: event.detail.text,
                icon: event.detail.type,
                buttons: false,
                timer: 1500,
            });
        });

        window.addEventListener('swal:error-confirm', event => {
            swal({
                title: event.detail.message,
                text: event.detail.text,
                icon: event.detail.type,
                buttons: {
                    cancel: "Input Manual",
                    catch: {
                        text: "Coba Lagi Input Cover",
                        value: "catch",
                    }, 
                }

            }).then((value)  => {
                if(value == "catch"){
                    window.location = event.detail.url
                }else{
                    swal("Silahkan Input Manual..");
                }
            })
        });

        window.addEventListener('swal:success-redirect', event => {
            swal({
                title: event.detail.message,
                text: event.detail.text,
                icon: event.detail.type,
                buttons: false,
                timer: 1500,
            }).then(()=>{
                window.location.href=event.detail.url
            })
        });

        window.addEventListener('swal:error', event => {
            swal({
                title: event.detail.message,
                text: event.detail.text,
                icon: "warning",
                buttons: "Periksa",
            });
        });
        window.addEventListener('swal:confirm', event => {
            swal({
                    title: 'Apakah anda yakin?',
                    text: 'Jika dihapus, Anda tidak akan dapat mengembalikan data ini!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.livewire.emit('delete', event.detail);
                    }
                });
        });
        window.addEventListener('swal:addDescription', event => {
            swal({
                    text: event.detail.message,
                    content: "input",
                    button: {
                        text: "Submit",
                        closeModal: false,
                    },
                })
                .then((description) => {
                    if (description) {
                        window.livewire.emit('reject', description);
                    }
                }).then((result) => {
                    swal.stopLoading();
                    swal.close();
                });

        });
    </script>
</body>

</html>