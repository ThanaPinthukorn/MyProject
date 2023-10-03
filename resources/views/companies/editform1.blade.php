@extends('layouts.app')

@section('style')
    <style>
        .card{
            border: 1px solid black;
            margin-top: 100px
        }
        .card-header{
            background-color: rgb(49, 49, 49);
            text-align: center;
            font-size: 1.5em;
            color: white;
        }
        .submit{
            background-color: rgb(49, 49, 49);
            color: white;
        }
        .submit:hover{
            border: 1px solid #000;
        }
        .btn {
            border: 1px solid black;
            border-radius: 20px;
            width: 600px;
            height: 150px;
            padding: 20px;
            margin: 10px;
            font-size: 1.5em;
            color: white;
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }
        .btn-primary{
            width: 100px;
            height: 20px;
            border-radius: 10px;
        }
        .btn-success{
            width: 200px;
            height: 20px;
            border-radius: 10px;
        }

    </style>
@endsection

@section('content')

<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">{{ __('ตั้งค่าแบบทดสอบ') }}</div>

                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('form1.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="no_form" class="col-md-10 col-form-label text-md-end">{{ __('ชุดที่') }}</label>

                            <div class="col-md-2">
                                <input id="no_form" type="number" class="form-control @error('no_form') is-invalid @enderror" name="no_form" value="{{ old('no_form') }}" required autocomplete="no_form" autofocus>

                                @error('no_form')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <center class="mb-4"><h4>แบบทดสอบความชอบแบบ (7 – Point hedonic score)</h4></center>

                        <div class="row mb-3">
                            <label for="product_name" class="col-md-2 col-form-label text-md-end">{{ __('ชื่อผลิตภัณฑ์') }}</label>

                            <div class="col-md-5">
                                <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" required autocomplete="product_name" autofocus>

                                @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                คําชี้แจง กรุณาทดสอบตัวอย่างที่เสนอให้จากซ้ายไปขวาแล้วให้คะแนนความชอบตัวอย่างในแต่ละปัจจัยที่ใกล้เคียงกับความรู้สึกของท่านมากที่สุด โดยกำหนดระดับคะแนนความชอบดังนี้ (กรุณาบ้วนปากทุกครั้งก่อนชิม)
                            </div>
                        </div>   

                        <div class="row mb-3">
                            <label for="tester_no" class="col-md-2 col-form-label text-md-end">{{ __('จำนวนผู้ทดสอบ') }}</label>

                            <div class="col-md-2">
                                <input id="tester_no" type="number" class="form-control @error('tester_no') is-invalid @enderror" name="tester_no" value="{{ old('tester_no') }}" required autocomplete="tester_no" autofocus>

                                @error('tester_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sample_no" class="col-md-2 col-form-label text-md-end">{{ __('จำนวนตัวอย่าง') }}</label>

                            <div class="col-md-2">
                                <input id="sample_no" type="number" class="form-control @error('sample_no') is-invalid @enderror" name="sample_no" value="{{ old('sample_no') }}" required autocomplete="sample_no" autofocus>

                                @error('sample_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <center>
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-12">
                                        <a href="{{ route('companies.create') }}" class="btn btn-primary">Back</a>
                                </div>
                                <div class="col-md-6 offset-md-12">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('สร้างแบบทดสอบ') }}
                                    </button>
                                </div>
                            </div>
                        </center>
                        
                            
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection