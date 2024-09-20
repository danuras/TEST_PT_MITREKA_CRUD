<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div id="docs-sidebar" class="docs-sidebar">
        <nav id="docs-nav" class="docs-nav navbar">

            <div class="d-block d-lg-none mb-3 d-flex justify-content-start align-items-center">
                <ul class="social-list list-inline mx-md-3 mx-lg-5 mb-0 d-flex">
                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook fa-fw"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-fw"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram fa-fw"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-youtube fa-fw"></i></a></li>
                </ul>
            </div>

            <div class="d-block d-lg-none mb-3 d-flex justify-content-start align-items-center">

                @if(Auth::check())
                    <a href="/keluar" class="btn btn-primary">Keluar</a>
                @else
                    <a href="/masuk" class="btn btn-primary">Masuk</a>
                @endif
            </div>
            <ul class="section-items list-unstyled nav flex-column pb-3">
                <!-- 0 -->
                <div>
                    <li class="nav-item section-title mt-3 {{ request()->is('daftar-buku') ? 'active' : '' }} ">
                        <span class="theme-icon-holder me-2"><i class="fas fa-book"></i></span>
                        <a class="nav-link" href="/daftar-buku">
                            Daftar Buku
                        </a>
                    </li>
                    @if(Auth::check())
                        @if(Auth::user()->role == 'admin')
                            <li
                                class="nav-item section-title mt-3 {{ request()->is('daftar-buku-yang-ingin-dipinjam') ? 'active' : '' }} ">
                                <span class="theme-icon-holder me-2"><i class="fas fa-book"></i></span>
                                <a class="nav-link" href="/daftar-buku-yang-ingin-dipinjam">
                                    Permintaan Peminjaman
                                </a>
                            </li>
                        @endif
                        <li
                            class="nav-item section-title mt-3 {{ request()->is('daftar-buku-yang-sedang-dipinjam') ? 'active' : '' }} ">
                            <span class="theme-icon-holder me-2"><i class="fas fa-book"></i></span>
                            <a class="nav-link" href="/daftar-buku-yang-sedang-dipinjam">
                                Daftar Buku Dipinjam
                            </a>
                        </li>
                    @endif
                </div>
            </ul>

        </nav><!--//docs-nav-->
    </div><!--//docs-sidebar-->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleButtons = document.querySelectorAll('.toggle-btn');

            toggleButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const section = button.closest('.section-title');
                    const navGroup = section.parentElement;
                    const navItems = navGroup.querySelectorAll('.list-documentation');

                    navItems.forEach(item => {
                        item.style.display = item.style.display === 'none' || item.style.display === '' ? 'block' : 'none';
                    });

                    let icon = this.children[0];
                    if (icon.classList.contains('fa-chevron-left')) {
                        icon.classList.remove('fa-chevron-left');
                        icon.classList.add('fa-chevron-down');
                    } else {
                        icon.classList.remove('fa-chevron-down');
                        icon.classList.add('fa-chevron-left');
                    }

                });
            });

        });
    </script>
</body>

</html>