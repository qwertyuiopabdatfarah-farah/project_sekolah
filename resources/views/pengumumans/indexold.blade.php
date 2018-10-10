@extends('general.app')
@section('atas')

@endsection

@section('isi')
<div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Pengumuman</h2>

            </div>

            <div class="pull-right">

                @can('pengumuman-create')

                <a class="btn btn-success" href="{{ route('pengumumans.create') }}"> Create New Pengumuman</a>

                @endcan

            </div>

        </div>

    </div>



    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif



    <table class="table table-bordered" id="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
        </tr>
    </thead>
    @foreach ($pengumumans as $pengumuman)

    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $pengumuman->name }}</td>

        <td>{{ $pengumuman->detail }}</td>

        <td>

                <form action="{{ route('pengumumans.destroy',$pengumuman->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('pengumumans.show',$pengumuman->id) }}">Show</a>

                    @can('pengumuman-edit')

                    <a class="btn btn-primary" href="{{ route('pengumumans.edit',$pengumuman->id) }}">Edit</a>

                    @endcan



                    @csrf

                    @method('DELETE')

                    @can('pengumuman-delete')

                    <button type="submit" class="btn btn-danger">Delete</button>

                    @endcan

                </form>

        </td>

    </tr>

    @endforeach

    </table>
   


    {!! $pengumumans->links() !!}



@endsection