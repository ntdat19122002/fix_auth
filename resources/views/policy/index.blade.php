@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{ Auth::user()->name }}</h3>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-8">

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
            serverSide :true,
            processing:true,
            ajax: "{{ route('post.index') }}",
            columns:[
                {data:'id'},
                {data:'title'},
                {data:'description'},
                {data:'username'},
            ]
        });
    } );
</script>

@endsection