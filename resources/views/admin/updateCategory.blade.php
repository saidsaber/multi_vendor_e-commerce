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

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Create Category</h5>

                                        <!-- General Form Elements -->
                                        <form action="{{ route('admin.edit.category' , ['category' => $category->id]) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Category
                                                    Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ $category->name }}">
                                                </div>
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Category
                                                    Slug</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="slug"
                                                        value="{{ $category->slug }}">
                                                </div>
                                                @error('slug')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputNumber" class="col-sm-2 col-form-label">Category
                                                    Logo</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="file" id="formFile"
                                                        name="image">
                                                </div>
                                                @error('logo')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>

                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Submit
                                                        Form</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div><!-- End Left side columns -->


            </div>
        </section>


    </main><!-- End #main -->
@endsection
