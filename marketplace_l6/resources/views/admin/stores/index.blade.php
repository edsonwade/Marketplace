<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js">
<link rel="stylesheet" href="https://code.jquery.com/jquery-3.5.1.js">
@extends('layouts.app')


<script>
    $(document).ready(function () {
        table = $("#store").DataTable({
            pageLength: 20,
            order: [],
            paging: true,
            searching: true,
            info: true,
            ajax: {
                url: "https://api.srv3r.com/table/",
                method: "GET",
                dataSrc: ""
            },
            columns: [
                {
                    data: "id",
                    render: function (data, type, row, meta) {
                        if (type === "display") {
                            data = '<a href="{{route('admin.index')}}?id=' + data + '">' + row.id + "</a>";
                        }
                        return data;
                    }
                },
                {data: "ID"},
                {data: "User_id"},
                {data: "Name"},
                {data: "Slug"},
                {data: "Phone"},
                {data: "Description"},

            ]
        });

    });
</script>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card p-2">
                    <h3 align="center">Store</h3>
                    <div class="table-responsive">
                        <table id="store" class="table table-striped display" style="width:100%">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">User_id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Description</th>

                            </tr>
                            </thead>
                            @foreach($stores as $store)
                                <tr>
                                    <tbody>

                                    <td>{{$store->id}}</td>
                                    <td>{{$store->user_id}}</td>
                                    <td>{{$store->name}}</td>
                                    <td>{{$store->slug}}</td>
                                    <td>{{$store->phone}}</td>
                                    <td>{{$store->description}}</td>



                                    </tbody>




                                </tr>
                            @endforeach
                        </table>
                        {{$stores->links()}}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

