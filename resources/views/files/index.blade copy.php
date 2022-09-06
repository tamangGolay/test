@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
    <!-- <h5>Files</h5> -->
        <a href="{{ route('files.create') }}" class="btn btn-primary float-right mb-3">Add file</a>

        @include('layouts.partials.messages')

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Document Name</th>
              <th scope="col">Name</th>
              <th scope="col">Cid</th>
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
                <td>{{ $file->cid }}</td>

                <td width="10%">{{ $file->size }}</td>
                <td width="10%">{{ $file->type }}</td>
                <!-- <td width="5%"><a href="{{ $file->type }}" class="btn btn-danger btn-sm">Delete</a></td> -->
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
@endsection
