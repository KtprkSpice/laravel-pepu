<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- jQuerry --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    {{-- TailwindCss --}}
    @vite('resources/css/app.css')
    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js"></script>
    {{-- SWAL --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Admin - @yield('title')</title>
</head>


<body class="overflow-x-hidden">
    {{-- Stack Button --}}
    <button id="menuButton" class="fixed top-5 left-5 z-10 bg-black text-white px-4 py-2 rounded-lg md:hidden">
        <i class="fa-solid fa-bars"></i>
    </button>

    {{-- Overlay --}}
    <div id="overlay" class="fixed inset-0 bg-black/50 z-30 hidden md:hidden">
    </div>

    {{-- Sidebar --}}
    <aside id="sidebar"
        class="w-64 min-h-screen bg-gray-600 fixed flex flex-col -translate-x-full md:translate-x-0 transition-transform duration-300 z-40">
        <div class="relative overflow-hidden flex items-center flex-col justify-center p-10">
            <div class="absolute inset-0 bg-center bg-cover blur-xs scale-110"
                style="background-image: url(https://images.unsplash.com/photo-1568667256549-094345857637?q=80&w=715&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);">
            </div>
            <div class="relative z-10 inset-0 flex flex-col items-center">
                <img src="https://i.pravatar.cc/150?img=3" alt="" class="rounded-full mb-5">
                <h2 class="text-white">Nama</h2>
            </div>
        </div>
        <div>
            <ul>
                <li>
                    <a href="#"
                        class="p-5 border-b border-black block text-white flex gap-2 items-center hover:bg-white hover:text-black">
                        <i class="fa-solid fa-house"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="p-5 border-b border-black block text-white flex gap-2 items-center hover:bg-white hover:text-black">
                        <i class="fa-solid fa-book"></i>
                        <span>Data Buku</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="p-5 border-b border-black block text-white flex gap-2 items-center hover:bg-white hover:text-black">
                        <i class="fa-solid fa-layer-group"></i>
                        <span>Data Kategori</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="p-5 border-b border-black block text-white flex gap-2 items-center hover:bg-white hover:text-black">
                        <i class="fa-solid fa-users"></i>
                        <span>Data Users</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="mt-auto">
            {{-- <a href="{{ route('logout') }}" class="block p-5 text-white border-t border-black">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span>Logout</span>
            </a> --}}
            <form action="{{ route('logout') }}" class="w-full" id="logout" method="POST">
                <button type="submit" class="w-full text-left p-5 text-white border-t border-black cursor-pointer">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- Content --}}
    <section class="ml-10 md:ml-64 flex justify-center min-h-screen">
        <div class="w-full max-w-6xl p-10">
            @yield('content')
        </div>
    </section>

    <x-alert />

    <script>
        const menuButton = document.getElementById('menuButton');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        menuButton.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full')
            overlay.classList.add('hidden')
        });

        // Logout alert
        const logout = document.getElementById('logout');
        logout.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Logout"
            }).then((result) => {

                if (result.isConfirmed) {
                    form.submit();
                }

            });
        })

        // Cnfirm Delte
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                document.querySelectorAll('.delete-form').forEach(form => {

                    form.addEventListener('submit', function(e) {

                        e.preventDefault();

                        Swal.fire({
                            title: "Are you sure?",
                            text: "You won't be able to revert this!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, delete it!"
                        }).then((result) => {

                            if (result.isConfirmed) {
                                form.submit();
                            }

                        });

                    });

                });
            })
        })
    </script>
</body>

</html>
