@extends('layouts.admin.header_tags')

@section('body')
    <x-admin.header />
    <!-- ======= Header ======= -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap');
        
        * {
            font-family: 'Cairo', sans-serif;
        }
        
        .form-container {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .form-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            padding: 40px;
            max-width: 600px;
            width: 100%;
            position: relative;
            overflow: hidden;
        }
        
        .form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4);
        }
        
        .form-title {
            text-align: center;
            color: #2c3e50;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 30px;
            position: relative;
        }
        
        .form-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            margin: 15px auto;
            border-radius: 2px;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-label {
            display: block;
            color: #34495e;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 1.1rem;
        }
        
        .form-input, .form-select {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e1e8ed;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
            color: #2c3e50;
        }
        
        .form-input:focus, .form-select:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }
        
        .form-input:hover, .form-select:hover {
            border-color: #bdc3c7;
            background: white;
        }
        
        .file-input-container {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }
        
        .file-input {
            position: absolute;
            left: -9999px;
            opacity: 0;
        }
        
        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            border: 2px dashed #bdc3c7;
            border-radius: 12px;
            background: #f8f9fa;
            color: #7f8c8d;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            font-weight: 500;
        }
        
        .file-input-label:hover {
            border-color: #667eea;
            background: #e8f0fe;
            color: #667eea;
        }
        
        .file-input-label.has-file {
            border-color: #27ae60;
            background: #d5f4e6;
            color: #27ae60;
        }
        
        .submit-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.2rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .submit-btn:hover::before {
            left: 100%;
        }
        
        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.3);
        }
        
        .submit-btn:active {
            transform: translateY(-1px);
        }
        
        .preview-container {
            margin-top: 15px;
            text-align: center;
        }
        
        .preview-image {
            max-width: 200px;
            max-height: 200px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 3px solid #e1e8ed;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        @media (max-width: 768px) {
            .form-card {
                padding: 25px;
                margin: 10px;
            }
            
            .form-title {
                font-size: 2rem;
            }
            
            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }
        }
        
        .success-message {
            background: linear-gradient(135deg, #00b894, #00a085);
            color: white;
            padding: 15px;
            border-radius: 12px;
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
            display: none;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #bdc3c7;
            font-size: 1.2rem;
        }
        
        .form-input.with-icon {
            padding-left: 50px;
        }
    </style>
    <!-- ======= Sidebar ======= -->

    <x-vendor.sidebar isactive='product' />
    <main id="main" class="main">

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-16">
                    <div class="row">


                        <!-- Top Selling -->
                        <div class="col-12">
                            <div class="card top-selling overflow-auto">
                                <div class="card-body pb-0">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="card-title">Products</span></h5>
                                    </div>
                                    @livewire('vendor.form-details' ,['id' => $id])
                                    @livewire('vendor.product-details' , ['id' => $id])

                                </div>

                            </div>
                        </div><!-- End Top Selling -->

                    </div>
                </div><!-- End Left side columns -->


            </div>
        </section>

    </main><!-- End #main -->
@endsection
