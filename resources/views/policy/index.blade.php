@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('posts.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" class="form-control">
        <br>
        <button class="btn btn-success">Import User Data</button>
    </form>
    <h3>{{ Auth::user()->name }}</h3>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-warning float-end" href="{{ route('posts.export') }}">Export User Data</a>
            <table class="table" id="posts-table">
                <thead>
                  <tr id="list-header">
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">User</th>
                    <th>Action</th>
                  </tr>
                </thead>
                {{-- data table --}}
              </table>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('#list-header').on({
            mouseenter: function(){
                $(this).css('background-color','lightgray');
            },
            mouseleave: function(){
                $(this).css('background-color','lightblue');
            }
        })
 
        $('#posts-table').DataTable({
            paging: true,
            pageLength: 5,
            serverSide :true,
            processing:true,  
            ajax: {
                'type':'GET',
                'url':"{{ route('post.index') }}",
                'datatype': 'json',
                //  "data": function(data) {
                //      var json = jQuery.parseJSON(data);
                //      json.draw = json.draw;
                //      json.recordsTotal = json.total;
                //      json.recordsFiltered = json.total;
                //      json.data = json.data;
                //      console.log(data);
                //      return JSON.stringify(json); // return JSON string
                //  }
            },
            columns:[
                {data:'id' , name: "id"},
                {data:'title', name: "title"},
                {data:'description', name: "description"},
                {data:'user.name', name: "user_id"},
            ],
        });
    } );
</script>

@endsection