@extends('layouts.admin.header_tags')

@section('body')
    <x-admin.header />
    <!-- ======= Header ======= -->

    <!-- ======= Sidebar ======= -->

    <x-admin.sidebar isActive="category" />
    <main id="main" class="main">

        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card top-selling overflow-auto">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
                        <br>
                        <br>

                        <div class="card-body pb-0">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title">categories</span></h5>
                                <a href="{{ route('admin.create.category') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-lg"></i> Create category
                                </a>
                            </div>

                            
                            @livewire('admin.category')

                        </div>

                    </div>
                </div><!-- End Top Selling -->

            </div>
        </section>


    </main><!-- End #main -->
@endsection
