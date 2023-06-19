@extends('layouts.main')

@section('container')
    @include('partials.sidebar')
    <section class="home-section">
        <h4 class="pt-3">PEMANTAUAN TEMPAT SAMPAH PINTAR</h4>
        <h5 class="mb-2">REKAYASA SISTEM KOMPUTER</h5>
        <hr>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="pt-2 text-center">
                <div class="d-flex row">
                <a href="" class="text-decoration-none col-lg-3 col-md-4 col-sm-6 mb-3"
                data-bs-toggle="modal" data-bs-target="    if ($dataKetinggian1) {
            $ketinggian1 = $dataKetinggian1->ketinggian;">
                                <div class="card">
                                    {{-- <div class="card-header text-end">
                                <a href="" class="link-warning"><i class="fa-solid fa-square-pen"></i></i></a>
                                <a href="" class="link-danger"><i class="fa-solid fa-square-minus"></i></a>
                            </div> --}}
                            <h4 class="card-title mt-2">Tempat Sampah</h4>
                                    <div class="trash mx-auto">
                                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 285.5 374"
                                            data-color="#ff5733" data-animation="2000" width="150" height="150"
                                            fill="currentColor" class="bi bi-alarm-fill progressIcon d-flex"
                                            viewBox="0 0 16 16">
                                            <defs>
                                                <style>
                                                .cls-1 {
                                                        fill: #444e3f;
                                                    }
                                                </style>
                                            </defs>
                                            <title>sampah</title>
                                            <path class="cls-1"
                                                d="M459.75,732.75c-4.58-2.4-9.63-4.21-13.63-7.35-5.41-4.24-7.75-10.51-8.21-17.44q-4.87-73.69-9.82-147.38-3.16-47.31-6.33-94.63c-.06-.86,0-1.73,0-2.9h238c-.2,4.12-.34,8.19-.61,12.25q-3.57,53.49-7.18,107-3.18,47.7-6.28,95.39c-.71,10.6-1.37,21.2-2.23,31.79-.85,10.38-8.57,19.36-18.92,22.36-.94.28-1.86.63-2.79.94Zm117-60.79c-.21,6.78,4.56,12.36,11.19,12.76s12.14-4.46,12.78-11.51c.79-8.71,1.51-17.42,2.28-26.13q3.21-36.78,6.43-73.56c1.1-12.69,2.34-25.38,3.22-38.09a11.82,11.82,0,0,0-11.15-12.65,12.06,12.06,0,0,0-12.74,11.12c-.3,3-.52,6-.78,9l-6.42,73.55C580,634.83,578.39,653.26,576.77,672Zm-72.07-.8c-.42-4.42-.9-9.27-1.32-14.12q-5.33-61.42-10.64-122.85c-.6-6.94-6.21-11.88-12.85-11.41a12,12,0,0,0-11.09,12.75c.14,3.74.57,7.47.89,11.2q5.52,63.1,11,126.2c.63,7.21,6.1,12.27,12.88,11.79C500.22,684.25,505,678.65,504.7,671.16Zm24.05-67.94q0,34.31,0,68.61c0,7.56,5.17,13,12.12,12.91,6.79-.07,11.85-5.43,11.85-12.79q0-68.25,0-136.48a14.79,14.79,0,0,0-.76-4.77A11.93,11.93,0,0,0,528.78,535C528.72,557.73,528.75,580.47,528.75,603.22Z"
                                                transform="translate(-397.25 -358.75)" />
                                            <path class="cls-1"
                                                d="M582.05,358.75c1,.36,2,.76,3,1.08,10.43,3.37,17.5,13.12,17.71,24.58.1,5.24,0,10.49,0,16.34h3.84q25,0,50,0c15.64,0,26.13,11.09,26.17,27.56,0,6.62,0,13.23,0,20.14H397.59c0-8.85-.88-17.78.21-26.45a24.06,24.06,0,0,1,24-21.23c17-.11,34,0,51.06,0h4.18c0-4.92,0-9.51,0-14.09,0-14.29,6.72-23.52,19.82-27.34a4.31,4.31,0,0,0,.89-.57Zm-42.13,42c12,0,24-.07,36.05.05,2.91,0,4.15-.94,4-4.09a100.47,100.47,0,0,1,0-10.12c.14-3-1.08-3.95-3.81-3.88-5.35.14-10.7,0-16.06,0-18.68,0-37.36.05-56-.05-3.06,0-4.37.94-4.15,4.28a68,68,0,0,1,0,9.36c-.25,3.53,1.13,4.52,4.35,4.47C516.13,400.65,528,400.75,539.92,400.75Z"
                                                transform="translate(-397.25 -358.75)" />
                                        </svg>
                  
        </script>

    </section>
@endsection
