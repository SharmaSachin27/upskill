@extends('layout.master')
@section('title', 'Manage Company')
@section('main-content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">view Company</h1>
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($company as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td class="text-center">
                                    <a href="{{ asset('public/company_logos/' . $item->logo) }}" data-fancybox="gallery"><img src="{{ asset('public/company_logos/' . $item->logo) }}" alt="img" height="80px" width="80px" style="border-radius: 50%;"  class="logo-img"></a>
                                    </td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->website }}</td>
                                <td class="text-center">
                                    <a href="{{ route('companies.edit',$item->id) }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a>
                                </td>
                                <td class="text-center">
                                    <form method="POST" action="{{ url('companies', $item->id) }}" accept-charset="UTF-8" style="display:inline" id="deleteCompany">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function () {
        $('#deleteCompany').submit(function (e) {
        e.preventDefault();
        var form = $(this);
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Record!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                form.submit();
                swal("Poof! Your Recrod has been deleted!", {
                icon: "success",
                });
            } else {
                swal("Your Record is safe!");
            }
        });
    }); 
    });
</script>
@endsection