@extends('staffs.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Staffs Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('staffs.create') }}"> Create New Staff</a>
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
            <th>SName</th>
            <th>Age</th>
            <th width="560x">Action</th>
        </tr>
        @foreach ($staffs as $staff)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $staff->sname }}</td>
            <td>{{ $staff->age }}</td>
            <td>
                <form action="{{ route('staffs.destroy',$staff->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('staffs.show',$staff->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('staffs.edit',$staff->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $staffs->links() !!}
      
@endsection