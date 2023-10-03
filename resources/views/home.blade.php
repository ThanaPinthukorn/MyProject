@extends('layouts.app')

@section('style')
    <style>
        .btn {
            border: 1px solid black;
            border-radius: 20px;
            width: 45%;
            height: 200px;
            padding: 20px;
            margin: 10px 0px 10px 24px;
            font-size: 1.5em;
            color: white;
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }
        .c{
            background-color: green;
        }
        .c:hover{
            background-color: lightgreen;
            border: 2px solid green;
        }
        .w{
            background-color: rgb(0, 110, 255);
        }
        .w:hover{
            background-color: rgb(106, 146, 255);
            border: 2px solid rgb(0, 110, 255);
        }
        .e{
            background-color: rgb(209, 188, 1);
            text-align: left;
        }
        .e:hover{
            background-color: yellow;
            border: 2px solid rgb(209, 188, 1);
        }

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
    </style>
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/main.css') }}">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Menu') }}</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div>
                        <a class="btn c" href="{{ route('companies.create') }}">
                            {{ __('สร้างแบบทดสอบ') }}</a>
                        <a class="btn w" href="{{ route('companies.index2') }}">
                            {{ __('ตรวจสอบรายละเอียด') }}</a>
                        <a class="btn e" href="{{ route('companies.index') }}">
                            {{ __('จัดการข้อมูล') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
