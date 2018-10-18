@extends('layouts.app')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Add New Pengumuman</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('index.pengumuman') }}"> Back</a>

            </div>

        </div>

    </div>



    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

   @include('flash::message')

   {{ Form::open(['route' => 'store.pengumuman', 'method' => 'POST', 'class' => 'form-horizontal']) }}

    @csrf

   <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Name:</strong>

            <input type="text" name="name" class="form-control" placeholder="Name">

        </div>

    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Jek:</strong>

            <input type="text" name="jenis_kelamin" class="form-control" placeholder="Name">

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Detail:</strong>

            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>

 </form>



@endsection