@extends('layouts.admin.header_tags')

@section('body')
    <x-admin.header />
    <!-- ======= Header ======= -->

    <!-- ======= Sidebar ======= -->

    <x-admin.sidebar isActive='' />
    <main id="main" class="main">

        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card top-selling overflow-auto">

                        <br>
                        <br>

                        <div class="card-body pb-0">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title">categories</span></h5>
                            </div>

                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">image</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">store</th>
                                        <th scope="col">btns</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @if (isset($stores))
                                            @foreach ($stores as $store)
                                                <th scope="row"><img src="{{ asset("storage/".$store->logo) }}" alt=""
                                                        style="    width: 70px; height: 80px;"></th>
                                                <th scope="row">{{ $store->user->name }}</th>
                                                <th>{{ $store->name }}</th>
                                                <th scope="row">
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <form action="{{ route('admin.accept.store' , ['store' => $store->id]) }}" method="POST"
                                                                style="display:inline-block;">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-primary">
                                                                    accept
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </li>
                                                </th>
                                            @endforeach
                                        @endif
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Top Selling -->

            </div>
        </section>
    </main><!-- End #main -->
@endsection
