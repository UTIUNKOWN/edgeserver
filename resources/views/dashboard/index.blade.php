@extends('layouts.main')

@section('container')
    @include('partials.sidebar')
    <section class="home-section">
        <h4 class="pt-3">PEMANTAUAN TEMPAT SAMPAH PINTAR</h4>
        <h5 class="mb-2">POLITEKNIK NEGERI SEMARANG</h5>
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
                    @if ($trash)
                        @foreach ($trash as $trash)
                            <a href="" class="text-decoration-none col-lg-3 col-md-4 col-sm-6 mb-3"
                                data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $trash->node_number }}">
                                <div class="card">
                                    {{-- <div class="card-header text-end">
                                <a href="" class="link-warning"><i class="fa-solid fa-square-pen"></i></i></a>
                                <a href="" class="link-danger"><i class="fa-solid fa-square-minus"></i></a>
                            </div> --}}
                                    <h4 class="card-title mt-2">Tempat Sampah</h4>
                                    <div class="trash mx-auto">
                                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 285.5 374"
                                            @if ($trash->node) data-percent=" {{ $trash->hcsr }}"
                                        @else
                                        data-percent="1" @endif
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
                                    </div>
                                    <div class="card-body">
                                        <span class="num fs-1"
                                            @if ($trash->node) data-val=" {{ $trash->hcsr }}"
                                        @else
                                        data-val="1" @endif>0</span>
                                        <span class="text fs-1">%</span>
                                        <p class="card-text">
                                            @if ($trash->node)
                                                {{ $trash->location }}
                                            @else
                                                ID Sampah tidak terdeteksi
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div class="modal fade" id="exampleModal-{{ $trash->node_number }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">Tempat Sampah
                                                {{ $trash->node_number }}
                                            </h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col rounded ratio ratio-4x3">
                                                    <iframe src="{{ $trash->maps }}" class="">
                                                    </iframe>
                                                </div>
                                                <div class="col align-middle mt-2">
                                                    <div class="bg-secondary bg-opacity-25 mb-3 rounded">
                                                        <div class="row">
                                                            <h4 class="mb-0 pt-2">Volume sampah : </h4>
                                                        </div>
                                                        <div class="row row-cols-auto justify-content-center">
                                                            <span class="num display-1 px-0"
                                                                @if ($trash->node) data-val=" {{ $trash->hcsr }}"
                                        @else
                                        data-val="1" @endif>0</span>
                                                            <span class="text display-1 px-0">%</span>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="bg-secondary bg-opacity-25 rounded mb-3">
                                                            <h4 class="pt-2">Location : </h4>
                                                            <h3 class="pb-1">{{ $trash->location }}</h3>
                                                        </div>
                                                        <div class="bg-secondary bg-opacity-25 rounded">
                                                            <h4 class="pt-2">Last Update : </h4>
                                                            <h3 class="">
                                                                @if ($trash->node)
                                                                    {{ \Carbon\Carbon::parse($trash->last_update)->format('d-m-Y H:i:s') }}
                                                                @else
                                                                    ID Sampah tidak terbaca
                                                                @endif
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if (auth()->user()->is_admin == 1)
                                            <div class="modal-footer">
                                                <form action="/dashboard/{{ $trash->node_number }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button role="button" class="btn btn-lg btn-secondary opacity-75"
                                                        onclick="return confirm('Menghapus tempat sampah akan MENGHAPUS SELURUH DATA sampah yang telah terekam juga. Apakah anda yakin ingin menghapus tempat sampah?')">Delete</button>
                                                </form>
                                                <a href="dashboard/{{ $trash->node_number }}/edit" role="button"
                                                    class="btn btn-lg btn-primary opacity-75">Edit</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    @if (auth()->user()->is_admin == 1)
                        <div class="my-auto opacity-50 col-lg-3 col-md-4 col-sm-6">
                            <a href="dashboard/create">
                                <div class="card border-0">
                                    {{-- <div class="card-header text-end">
                                <a href="" class="link-warning"><i class="fa-solid fa-square-pen"></i></i></a>
                                <a href="" class="link-danger"><i class="fa-solid fa-square-minus"></i></a>
                            </div> --}}
                                    <div class="trash mx-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                                            fill="currentColor" class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                        </svg>
                                    </div>
                                    <div class="card-body">
                                        <h5>TAMBAH TEMPAT SAMPAH</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="" id="featured-3">
            <div class="row py-4 row-cols-1 row-cols-lg-4 justify-content-around fs-6">
                <div class="feature col mb-3 pt-3 rounded text-light" style="background-color: #4d6360">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                            class="bi bi-trash2" viewBox="0 0 16 16">
                            <path
                                d="M14 3a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2zM3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5c-1.954 0-3.69-.311-4.785-.793z" />
                        </svg>
                    </div>
                    <h1 class="float-end mx-2 my-2">{{ $total }}</h1>
                    <h4>Total Tempat Sampah</h4>
                    <p>Jumlah total tempat sampah di lingkungan Politeknik Negeri Semarang yang dapat dipantau.</p>
                </div>
                <div class="feature col mb-3 pt-3 rounded text-light" style="background-color: #62829f">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                            class="bi bi-trash2-fill" viewBox="0 0 16 16">
                            <path
                                d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z" />
                        </svg>
                    </div>
                    <h1 class="float-end mx-2 my-2">{{ $fillfull }}</h1>
                    <h4>Tempat Sampah Penuh</h4>
                    <p>Jumlah tempat sampah terdeteksi penuh dan harus segera dikosongkan</p>
                </div>
                <div class="feature col mb-3 pt-3 rounded text-light" style="background-color: #4f5e6c">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                            class="bi bi-recycle" viewBox="0 0 16 16">
                            <path
                                d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z" />
                        </svg>
                    </div>
                    <h1 class="float-end mx-2 my-2">{{ $totalvolume }} cm<sup>3</sup></h1>
                    <h4>Total Volume Sampah</h4>
                    <p>Total volume sampah saat ini yang terbaca dari seluruh tempat sampah.</p>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function autoRefreshPage() {
                window.location = window.location.href;
            }
            setInterval('autoRefreshPage()', 600000);
        </script>

    </section>
@endsection
