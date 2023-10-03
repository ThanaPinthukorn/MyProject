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
            font-size: 1.1em;
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
            text-align: left;
            border: none;
        }
        td{
            text-align: right;
        }
        .nb{
            text-align: left;
        }
        .command{
            height: 200px;
        }
        .slidecontainer{
            width: 100%;
        }
        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 10px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }
        .slider:hover {
            opacity: 1;
        }
        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            background: #04AA6D;
            cursor: pointer;
        }
        .slider::-moz-range-thumb {
            width: 10px;
            height: 25px;
            background: #04AA6D;
            cursor: pointer;
        }
        input{
            font-size: 1.1em;
        }
        .one::-moz-range-thumb{
            background: #0581c9;
        }
        

    </style>
@endsection

@section('content')

<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('แบบทดสอบชิมแบบพรรณนาเชิงปริมาณ') }}</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('companies.store2')}}" method="POST" enctype="multipart/form-data">
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
                                <table class="table table-borderless" >
                                    <tr>
                                        <th colspan="3">1. สี</th>
                                    </tr>
                                    <tr>
                                        <td>สีส้มอ่อน</td>
                                        <td>
                                            <div class="slidecontainer">
                                                <input type="range" min="0" max="20" value="10" class="slider one" name="csample_1">
                                            </div>
                                            @error('csample_1')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                            <div class="slidecontainer">
                                                <input type="range" min="0" max="20" value="10" class="slider" name="csample_2">
                                            </div>
                                            @error('csample_2')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td class="nb">สีส้มอ่อน-แดง</td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">2. กลิ่นเครื่องเทศ</th>
                                    </tr>
                                    <tr>
                                        <td>น้อย</td>
                                        <td>
                                            <div class="slidecontainer">
                                                <input type="range" min="0" max="20" value="10" class="slider one" name="smsample_1">
                                            </div>
                                            @error('smsample_1')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                            <div class="slidecontainer">
                                                <input type="range" min="0" max="20" value="10" class="slider" name="smsample_2">
                                            </div>
                                            @error('smsample_2')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td class="nb">มาก</td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">3. รสเค็ม</th>
                                    </tr>
                                    <tr>
                                        <td>น้อย</td>
                                        <td>
                                            <div class="slidecontainer">
                                                <input type="range" min="0" max="20" value="10" class="slider one" name="ssample_1">
                                            </div>
                                            @error('ssample_1')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                            <div class="slidecontainer">
                                                <input type="range" min="0" max="20" value="10" class="slider" name="ssample_2">
                                            </div>
                                            @error('ssample_2')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td class="nb">มาก</td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">4. รสหวาน</th>
                                    </tr>
                                    <tr>
                                        <td>น้อย</td>
                                        <td>
                                            <div class="slidecontainer">
                                                <input type="range" min="0" max="20" value="10" class="slider one" name="swsample_1">
                                            </div>
                                            @error('swsample_1')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                            <div class="slidecontainer">
                                                <input type="range" min="0" max="20" value="10" class="slider" name="swsample_2">
                                            </div>
                                            @error('swsample_2')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td class="nb">มาก</td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">5. ความเผ็ด</th>
                                    </tr>
                                    <tr>
                                        <td>น้อย</td>
                                        <td>
                                            <div class="slidecontainer">
                                                <input type="range" min="0" max="20" value="10" class="slider one" name="spsample_1">
                                            </div>
                                            @error('spsample_1')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                            <div class="slidecontainer">
                                                <input type="range" min="0" max="20" value="10" class="slider" name="spsample_2">
                                            </div>
                                            @error('spsample_2')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td class="nb">มาก</td>
                                    </tr>
                                    <tr>
                                        <th>6. ความกลมกล่อม</th>
                                    </tr>
                                    <tr>
                                        <td>น้อย</td>
                                        <td>
                                            <div class="slidecontainer">
                                                <input type="range" min="0" max="20" value="10" class="slider one" name="msample_1">
                                            </div>
                                            @error('msample_1')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                            <div class="slidecontainer">
                                                <input type="range" min="0" max="20" value="10" class="slider" name="msample_2">
                                            </div>
                                            @error('msample_2')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td class="nb">มาก</td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">7. เนื้อสัมผัส</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">&nbsp;&nbsp;&nbsp;7.1 ความละเอียด</th>
                                    </tr>
                                    <tr>
                                        <td>น้อย</td>
                                        <td>
                                            <div class="slidecontainer">
                                                <input type="range" min="0" max="20" value="10" class="slider one" name="rsample_1">
                                            </div>
                                            @error('rsample_1')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                            <div class="slidecontainer">
                                                <input type="range" min="0" max="20" value="10" class="slider" name="rsample_2">
                                            </div>
                                            @error('rsample_2')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td class="nb">มาก</td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">&nbsp;&nbsp;&nbsp;7.2 ความข้นหนืด</th>
                                    </tr>
                                    <tr>
                                        <td>น้อย</td>
                                        <td>
                                            <div class="slidecontainer">
                                                <input type="range" min="0" max="20" value="10" class="slider one" name="vsample_1">
                                            </div>
                                            @error('vsample_1')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                            <div class="slidecontainer">
                                                <input type="range" min="0" max="20" value="10" class="slider" name="vsample_2">
                                            </div>
                                            @error('vsample_2')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td class="nb">มาก</td>
                                    </tr>
                                    <tr>
                                        <th>8. โดยรวม</th>
                                    </tr>
                                    <tr>
                                        <td>น้อย</td>
                                        <td>
                                            <div class="slidecontainer">
                                                <input type="range" min="0" max="20" value="10" class="slider one" name="osample_1">
                                            </div>
                                            @error('osample_1')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                            <div class="slidecontainer">
                                                <input type="range" min="0" max="20" value="10" class="slider" name="osample_2">
                                            </div>
                                            @error('osample_2')
                                                <div class="alert alert-danger">{{ @message }}</div>
                                            @enderror
                                        </td>
                                        <td class="nb">มาก</td>
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
                            
                            <div class="col-md-6 offset-md-12 mb-3">
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