@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
    <!-- <h5>Files</h5> -->
    @if(Auth::user()->id > 1)

        <a href="{{ route('files.create') }}" class="btn btn-primary float-right mb-3">Add file</a>
    @endif

    <div class="row" id="flashmessage">
          <div class="col-12">
        @include('layouts.partials.messages')
        </div>
    </div>
        <!-- @include('layouts.partials.messages') -->
        
      <div class="card-body table-responsive">  

        <table class="table table-hover table-striped table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Document Name</th>
              <th scope="col">Name</th>
              <th scope="col">Cid</th>
              <th scope="col">Size</th>
              <th scope="col">Type</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($files as $file)
              <tr>
              @if(Auth::user()->id == $file->name[0] 
              || Auth::user()->id == $file->name[0] .$file->name[1] 
              || Auth::user()->id == $file->name[0] .$file->name[1].$file->name[2]
              ||Auth::user()->id == $file->name[0] .$file->name[1].$file->name[2].$file->name[3]
              ||Auth::user()->id == $file->name[0] .$file->name[1].$file->name[2].$file->name[3].$file->name[4]
              ||Auth::user()->id == $file->name[0] .$file->name[1].$file->name[2].$file->name[3].$file->name[4].$file->name[5]
              ||Auth::user()->id == $file->name[0] .$file->name[1].$file->name[2].$file->name[3].$file->name[4].$file->name[5].$file->name[6]
              ||Auth::user()->id == $file->name[0] .$file->name[1].$file->name[2].$file->name[3].$file->name[4].$file->name[5].$file->name[6].$file->name[7]
              ||Auth::user()->id == $file->name[0] .$file->name[1].$file->name[2].$file->name[3].$file->name[4].$file->name[5].$file->name[6].$file->name[7].$file->name[8]
              ||Auth::user()->id == $file->name[0] .$file->name[1].$file->name[2].$file->name[3].$file->name[4].$file->name[5].$file->name[6].$file->name[7].$file->name[8].$file->name[9]
              ||Auth::user()->id == $file->name[0] .$file->name[1].$file->name[2].$file->name[3].$file->name[4].$file->name[5].$file->name[6].$file->name[7].$file->name[8].$file->name[9].$file->name[10]

              )


                <td width="3%">{{ $file->id = 1 }}</td>

                <td>{{ $file->name }}</td>
                <td>{{ $file->user }}</td>
                <td>{{ $file->cid }}</td>

                <td width="10%">{{ $file->size }}</td>
                <td width="10%">{{ $file->type }}</td>
                <form action="{{ route('files.download') }}" method="post" enctype="multipart/form-data">

                <td width="5%">
                @csrf
           
              <button type="submit" name="file"  value="{{$file->name}}" class="btn btn-primary">Download</button> <br><br>
              </form>

              <form action="{{ route('files.destroy') }}" method="post" enctype="multipart/form-data">

                @csrf


              <button type="submit" name="delete"  value="{{$file->name}}" onclick="return confirm('Do you want to delete?')" class="btn btn-primary">Delete</button>


                </form>
                @endif

                </td>


               


              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
@endsection
<script>
setTimeout(function () {
        $("#flashmessage").hide();
    }, 2000);

</script>
 
