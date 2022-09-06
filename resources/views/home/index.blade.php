@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Dashboard</h1>
       


        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Document Name</th>
              <th scope="col">Name</th>
              <th scope="col">Size</th>
              <th scope="col">Type</th>
              <!-- <th scope="col">Action</th> -->
            </tr>
          </thead>
          <tbody>
            @foreach($files as $file)
              <tr>
                <td width="3%">{{ $file->id }}</td>
                <td>{{ $file->name }}</td>
                <td>{{ $file->user }}</td>
                <td width="10%">{{ $file->size }}</td>
                <td width="10%">{{ $file->type }}</td>
                <!-- <td width="5%"><a href="{{ $file->type }}" class="btn btn-danger btn-sm">Delete</a></td> -->
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>

        
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Please sign up!!</p>
        @endguest
    </div>
@endsection
