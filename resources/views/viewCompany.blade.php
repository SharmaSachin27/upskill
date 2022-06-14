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
                                <td>{{ $item->logo }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->website }}</td>
                                <td>
                                    <a href="{{ route('companies.edit',$item->id) }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ url('companies', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
@endsection