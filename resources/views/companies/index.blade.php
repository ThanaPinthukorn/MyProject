@extends('layouts.app')

@section('style')
    <style>
        .card{
            border: 1px solid black;
            margin-top: 20px
        }
        .card-header{
            background-color: rgb(49, 49, 49);
            text-align: center;
            font-size: 1.5em;
            color: white;
        }
        .btn-primary{
            width: 80px;
        }
    </style>
@endsection

@section('content')

    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">{{ __('ตารางลักษณะปรากฏ') }}</div>
    
                    <div class="card-body">
            
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif

                        <table class="table "> <!-- ตาราง table-dark table-striped -->
                            <tr>
                                <th>ลำดับ</th>
                                <th>แบบทดสอบชุดที่</th>
                                <th>ชื่อผู้ทดสอบ</th>
                                <th>ตัวอย่างที่ 1</th>
                                <th>ตัวอย่างที่ 2</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach($companies as $form7p_appearance) <!-- ลูปข้อมูล -->
                                <tr>
                                    <td>{{ $form7p_appearance->id }}</td>
                                    <td>{{ $form7p_appearance->no_form }}</td>
                                    <td>{{ $form7p_appearance->name_tester }}</td>
                                    <td>{{ $form7p_appearance->sample_1a }}</td>
                                    <td>{{ $form7p_appearance->sample_2a }}</td>
                                    <td>
                                        <form action="{{ route('companies.destroy', $form7p_appearance->id) }}" method="POST"> <!-- ลบข้อมูล -->
                                            <a href="{{ route('companies.edit', $form7p_appearance->id) }}" class="btn btn-warning">Edit</a> <!-- แก้ไขข้อมูล -->
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $companies->links('pagination::bootstrap-5') !!}
                        <div>
                            <a href="{{ route('admin.home') }}" class="btn btn-primary">Back</a>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection