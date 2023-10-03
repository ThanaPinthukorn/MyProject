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
        .form-control{
            border: 2px solid darkgray;
        }
        .register{
            background-color: rgb(49, 49, 49);
            color: white;
        }
        .register:hover{
            border: 1px solid #000;
        }
        .btn-primary{
            width: 80px;
        }
    </style>
@endsection

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Data') }}</div>

                <div class="card-body">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('form7p_appearance.update', $form7p_appearance->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $form7p_appearance->id }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group my-3">
                                <strong>แบบทดสอบชุดที่</strong>
                                <input type="text" name="no_form" value="{{ $form7p_appearance->no_form }}" class="form-control" placeholder="แบบทดสอบชุดที่">
                                @error('no_form')
                                    <div class="alert alert-danger">{{ @message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group my-3">
                                <strong>ชื่อผู้ทดสอบ</strong>
                                <input type="text" name="name_tester" value="{{ $form7p_appearance->name_tester }}" class="form-control" placeholder="ชื่อผู้ทดสอบ">
                                @error('name_tester')
                                    <div class="alert alert-danger">{{ @message }}</div>
                                @enderror
                            </div>
                        </div>

                        <center>
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-12">
                                    <a href="{{ route('companies.index') }}" class="btn btn-primary">Back</a>
                                </div>
                                <div class="col-md-6 offset-md-12">
                                    <button type="submit" class="btn register">
                                        {{ __('Edit') }}
                                    </button>
                                </div>
                            </div>
                            </center>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection