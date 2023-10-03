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
        .row{
            font-size: 1.2em;
            color: black;
        }
        .submit{
            background-color: rgb(49, 49, 49);
            color: white;
        }
        .submit:hover{
            border: 1px solid #000;
        }

        .table{
            border: 1px solid black;
        }
        .table-borderless{
            text-align: center;
            border: none;
        }
        th{
            text-align: center;
        }
        .nb{
            text-align: center;
            border: none;
        }
        .command{
            height: 200px;
        }

    </style>
@endsection

@section('content')

<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('แบบทดสอบความชอบแบบ (7 – Point hedonic score)') }}</div>

                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('companies.store1')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                                <label for="no_form" class="col-md-10 col-form-label text-md-end">
                                    <strong> {{ __('ชุดที่') }}</strong>
                                </label>
                                <div class="col-md-1 mb-3">
                                    <input id="no_form" type="number" class="form-control @error('no_form') is-invalid @enderror" name="no_form" value="{{ old('no_form') }}" required autocomplete="no_form" autofocus>

                                    @error('no_form')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <label for="no_tester" class="col-md-10 col-form-label text-md-end">
                                    <strong> {{ __('ผู้ทดสอบคนที่') }}</strong>
                                </label>
                                <div class="col-md-1">
                                    <input id="no_tester" type="number" class="form-control @error('no_tester') is-invalid @enderror" name="no_tester" value="{{ old('no_tester') }}" required autocomplete="no_tester" autofocus>

                                    @error('no_tester')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <label for="name_tester" class="col-md-3 col-form-label text-md-end">
                                    <strong> {{ __('ชื่อผู้ทดสอบ') }}</strong>
                                </label>
                                <div class="col-md-5">
                                    <input id="name_tester" type="text" class="form-control @error('name_tester') is-invalid @enderror" name="name_tester" value="{{ old('name_tester') }}" required autocomplete="name_tester" autofocus>

                                    @error('name_tester')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row mt-3"></div>
                                <label for="product_name" class="col-md-3 col-form-label text-md-end">
                                    <strong>{{ __('ชื่อผลิตภัณฑ์') }} </strong>
                                </label>
                                <div class="col-md-5">
                                    <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" required autocomplete="product_name" autofocus>

                                    @error('product_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <strong>คําชี้แจง </strong>
                                กรุณาทดสอบตัวอย่างที่เสนอให้จากซ้ายไปขวาแล้วให้คะแนนความชอบตัวอย่างในแต่ละปัจจัยที่ใกล้เคียงกับความรู้สึกของท่านมากที่สุด โดยกำหนดระดับคะแนนความชอบดังนี้ (กรุณาบ้วนปากทุกครั้งก่อนชิม)
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="form-group my-3">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>ระดับของความชอบ</th>
                                        <th>คะแนน</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>ชอบมาก</td>
                                        <td>7</td>
                                    </tr>
                                    <tr>
                                        <td>ชอบปานกลาง</td>
                                        <td>6</td>
                                    </tr>
                                    <tr>
                                        <td>ชอบเล็กนอย</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>เฉยๆ</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td>ไม่ชอบเล็กนอย</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>ไม่ชอบปานกลาง</td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td>ไม่ชอบมาก</td>
                                        <td>1</td>
                                    </tr>
                                </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="form-group my-3">
                                <table class="table table-bordered" >
                                    <tr>
                                        <th rowspan="2"><br>คุณลักษณะผลิตภัณฑ์</th>
                                        <th colspan="5">ระดับของความชอบผลิตภัณฑ์</th>
                                    </tr>
                                    <tr>
                                        <th>รหัสตัวอย่าง<input type="number" name="sample" class="form-control nb" >
                                            @error('sample')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror 
                                        </th>
                                        <th>รหัสตัวอย่าง<input type="number" name="sample" class="form-control nb" >
                                            @error('sample')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror 
                                        </th>
                                        <th>รหัสตัวอย่าง<input type="number" name="sample" class="form-control nb" >
                                            @error('sample')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror 
                                        </th>
                                        <th>รหัสตัวอย่าง<input type="number" name="sample" class="form-control nb" >
                                            @error('sample')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror 
                                        </th>
                                        <th>รหัสตัวอย่าง<input type="number" name="sample" class="form-control nb" >
                                            @error('sample')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror 
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>ลักษณะปรากฏ</td>
                                        <td><input type="number" name="sample_1a" class="form-control nb" >
                                            @error('sample_1a')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_2a" class="form-control nb" >
                                            @error('sample_2a')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_3a" class="form-control nb" >
                                            @error('sample_3a')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_4a" class="form-control nb" >
                                            @error('sample_4a')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_5a" class="form-control nb" >
                                            @error('sample_5a')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>สี</td>
                                        <td><input type="number" name="sample_1c" class="form-control nb" >
                                            @error('sample_1c')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_2c" class="form-control nb" >
                                            @error('sample_2c')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_3c" class="form-control nb" >
                                            @error('sample_3c')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_4c" class="form-control nb" >
                                            @error('sample_4c')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_5c" class="form-control nb" >
                                            @error('sample_5c')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>กลิ่นเครื่องเทศ</td>
                                        <td><input type="number" name="sample_1s" class="form-control nb" >
                                            @error('sample_1s')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_2s" class="form-control nb" >
                                            @error('sample_2s')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_3s" class="form-control nb" >
                                            @error('sample_3s')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_4s" class="form-control nb" >
                                            @error('sample_4s')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_5s" class="form-control nb" >
                                            @error('sample_5s')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>เนื้อสัมผัส</td>
                                        <td><input type="number" name="sample_1t" class="form-control nb" >
                                            @error('sample_1t')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_2t" class="form-control nb" >
                                            @error('sample_2t')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_3t" class="form-control nb" >
                                            @error('sample_3t')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_4t" class="form-control nb" >
                                            @error('sample_4t')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_5t" class="form-control nb" >
                                            @error('sample_5t')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>รสชาติ</td>
                                        <td><input type="number" name="sample_1ta" class="form-control nb" >
                                            @error('sample_1ta')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_2ta" class="form-control nb" >
                                            @error('sample_2ta')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_3ta" class="form-control nb" >
                                            @error('sample_3ta')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_4ta" class="form-control nb" >
                                            @error('sample_4ta')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_5ta" class="form-control nb" >
                                            @error('sample_5ta')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ความชอบโดยรวม</td>
                                        <td><input type="number" name="sample_1o" class="form-control nb" >
                                            @error('sample_1o')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_2o" class="form-control nb" >
                                            @error('sample_2o')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_3o" class="form-control nb" >
                                            @error('sample_3o')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_4o" class="form-control nb" >
                                            @error('sample_4o')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" name="sample_5o" class="form-control nb" >
                                            @error('sample_5o')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="form-group my-3">
                                    <strong>ข้อเสอนแนะ</strong>
                                    <input type="text" name="command" class="form-control command">
                                </div>
                            </div>
                        </div>
                        <center>
                        <div class="row mb-3">
                            
                            <div class="col-md-6 offset-md-12">
                                <a href="{{ route('admin.home') }}" class="btn btn-primary">Back</a>
                            </div>  
                            <div class="col-md-6 offset-md-12">
                                <button type="submit" class=" btn submit">Submit</button>
                            </div>
                        </div>
                        </center>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection