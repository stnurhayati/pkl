@extends('SNU.Student.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 - Input Siswa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('SNUStudent.create') }}"> Create New student</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nis</th>
            <th>Name</th>
            <th>Day of Birth</th>
            <th>Gender</th>
            <th>Class ID</th>
            <th>Phone</th>
            <th>Address</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($student as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->nis }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->birth_date }}</td>
            <td>{{ $student->gender }}</td>
            <td>{{ $student->class_id }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->address }}</td>
            <td>
                <form action="{{ route('SNUStudent.destroy',$student->nis) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('SNUStudent.show',$student->nis) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('SNUStudent.edit',$student->nis) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 