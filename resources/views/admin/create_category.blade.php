@extends('layouts.admin.header_tags')

@section('body')
    <x-admin.header />
    <!-- ======= Header ======= -->

    <!-- ======= Sidebar ======= -->

    <x-admin.sidebar isActive="category" />
    <main id="main" class="main">

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-16">
                    <div class="row">
                        <div class="con">
                            <div class="col-lg-6" style="width: 70vw">

                                @livewire('admin.create-category')
                            </div>
                        </div>

                    </div>
                </div><!-- End Left side columns -->


            </div>
        </section>


    </main><!-- End #main -->
@endsection
