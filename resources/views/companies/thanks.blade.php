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
            border-radius: 10px;
            width: 100px;
            height: 20px;
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
            align-items: center;
        }
    </style>
@endsection

@section('content')

<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">{{ __('-') }}</div>

                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('companies.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            
                        </div>

                        <center class="mb-4"><h1>แสกนเพื่อทำแบบทดสอบ</h1><br>

                            <div id="qrcode">
                                <script>
                                    // URL ของหน้าของคุณ
                                    const url = 'https://your-public-url.com/form11';
                                
                                    // เลือกข้อมูลของ DOM element ที่คุณจะแสดง QR code
                                    const qrCodeContainer = document.getElementById('qrcode');
                                
                                    // สร้าง QR code
                                    const qrcode = new QRCode(qrCodeContainer, {
                                        text: url,
                                        width: 300, // กว้างของ QR code
                                        height: 300 // สูงของ QR code
                                    });
                                </script>
                            </div><br>

                            <div class="row mb-3">

                                <div class="col-md-6 offset-md-3">
                                    <a href="{{ route('admin.home') }}" class="btn btn-success">Home</a>
                                </div>
                                </div>
                            </div>
                        </center>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    

@endsection