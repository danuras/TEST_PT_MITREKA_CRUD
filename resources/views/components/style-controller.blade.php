<!DOCTYPE html>
<html lang="en">
<style>
    .social-list li a {
        color: #8d9de8;
    }

    .list-documentation {
        display: none;
    }

    .toggle-btn {
        cursor: pointer;
        border: none;
        background: none;
        font-size: 1.2rem;
        font-size: 14px;
        /* Ukuran ikon */
        color: #8d9de8;
        /* Warna ikon */
    }

    .docs-nav .nav-item.active .nav-link {
        color: #8d9de8;
    }

    .docs-nav .nav-item.active .nav-link .theme-icon-holder {
        color: #fff;
        background: #8d9de8;
    }

    .theme-icon-holder {
        color: #8d9de8;
        text-align: center;
    }


    .docs-nav .nav-item.active .nav-link::before {
        background-color: #8d9de8;
    }

    .btn-primary {
        background: #8d9de8;
        color: #fff;
    }

    a.theme-link:hover {
        color: #8d9de8;
        text-decoration-color: rgba(141, 157, 232, 0.8);
    }

    .btn:hover {
        color: #fff;
        background-color: rgba(100, 112, 165, 1);
        border-color: rgba(100, 112, 165, 1);
    }

    .social-list li a:hover {
        color: rgba(100, 112, 165, 1);
    }

    .download-buttons {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .download-buttons a {
        width: 200px;
        text-align: center;
    }

    @media (max-width: 768px) {
        .download-buttons {
            flex-direction: column;
            gap: 10px;
            align-items: center;
        }

        .download-buttons a {
            width: 200px;
        }
    }

    .centered-figure {
        text-align: center;
        margin: 20px auto;
        /* Jarak dari elemen sebelumnya */
    }

    .centered-image {
        width: 200px;
        /* Lebar gambar diatur menjadi 200px */
        height: auto;
        display: block;
        margin: 0 auto;
        /* Mengatur gambar tetap berada di tengah */
    }

    .centered-figure figcaption {
        margin-top: 10px;
        /* Jarak antara gambar dan keterangan */
        font-size: 14px;
        /* Ukuran font untuk keterangan */
        color: #555;
        /* Warna teks untuk keterangan */
    }

    .btn-check:checked+.btn,
    :not(.btn-check)+.btn:active,
    .btn:first-child:active,
    .btn.active,
    .btn.show {
        color: #000;
        background-color: rgba(100, 112, 165, 1);
        border-color: rgba(100, 112, 165, 1);
    }
</style>

</html>