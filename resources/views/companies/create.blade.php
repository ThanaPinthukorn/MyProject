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
        .c{
            background-color: orange;
            color: black;
        }
        .c:hover{
            background-color: orangered;
            border: 2px solid orange;
            color: white;
        }
        .w{
            background-color: lightgreen;
            color: black;
        }
        .w:hover{
            background-color: green;
            border: 2px solid lightgreen;
            color: white;
        }
        .btn-primary{
            width: 100px;
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
                <div class="card-header">{{ __('เลือกแบบทดสอบ') }}</div>

                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row">
                        <center>
                            <div>
                            <br>
                            <a class="btn c" href="{{ route('companies.editform1') }}">
                                {{ __('แบบทดสอบความชอบแบบ (7 – Point hedonic score)') }}</a>
                            <a class="btn w" href="{{ route('companies.editform2') }}">
                                {{ __('แบบทดสอบชิมแบบพรรณนาเชิงปริมาณ') }}</a>
                            </div>
                        </center>
                        
                        <div>
                            <a href="{{ route('admin.home') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

@endsection