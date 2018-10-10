@extends('layouts.private')

@section('atas')
<link rel="stylesheet" href="{{ asset('css/multiselect/bootstrap-multiselect.css') }}">
@endsection


@section('isi')
<div class="row">
<div class="col-xs-12">
<section class="panel panel-featured">
<header class="panel-heading">
<div class="panel-actions">
   <a href="javascript;" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
   <a href="javascript;" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
</div>
<h2 class="panel-title">Add Pengumuman/Berita</h2>
</header>

     <div class="panel-body" style="display: block;">
          {!! Form::open(['route' => 'news.store', 'method' => 'POST', 'files' => true, 'class' => 'form-horizontal form-bordered']) !!}

        <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
          <label class="col-md-3 control-label">Judul</label>
          <div class="col-md-6">
          {{ Form::text('judul', null, ['class' => 'form-control mb-3', 'placeholder'=> 'Judul Berita/Pengumuman']) }}
          @if ($errors->has('judul'))
          <span class="help-block">
          <strong>{{ $errors->first('judul') }}</strong>
          </span>
          @endif
          </div>
        </div>


        <div class="form-group{{ $errors->has('isi') ? ' has-error' : '' }}">
          <label class="col-md-3 control-label">Isi</label>
          <div class="col-md-6">
          {{ Form::text('isi', null, ['class' => 'form-control mb-3', 'placeholder'=> 'Isi Berita/Pengumuman']) }}
          @if ($errors->has('isi'))
          <span class="help-block">
          <strong>{{ $errors->first('isi') }}</strong>
          </span>
          @endif
          </div>
        </div>


      <div class="form-group{{ $errors->has('file_name') ? ' has-error' : '' }}">
          <label class="col-md-3 control-label">Upload File</label>
          <div class="col-md-6">
          {!! Form::file('file_name[]', ['multiple' => true, 'class' => 'form-control mb-3']) !!}
        @if ($errors->has('file_name'))
          <span class="help-block">
          <strong>{{ $errors->first('file_name') }}</strong>
          </span>
          @endif
          </div>
        </div>


     <div class="form-group">
        <div class="col-md-3"></div>
        <div class="col-md-6">
      {{ Form::button('<i class="fa fa-send fa-fw " aria-hidden="true"></i> Save ', ['type' => 'submit', 'class' => 'btn btn-outline custom-border-width btn-primary custom-border-radius font-weight-semibold text-uppercase mt-5 mb-3']) }}

      {{ Form::button('<i class="fa fa-times fa-fw" aria-hidden="true"></i> Reset ', ['type' => 'reset', 'class' => 'btn btn-outline custom-border-width btn-danger custom-border-radius font-weight-semibold text-uppercase mt-5 mb-3']) }}
       </div>
     </div>
        {{ Form::close() }}
     </div>
</section>
</div>
</div>


@endsection

@section('bawah')
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/multiselect/bootstrap-multiselect.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example-filter-placeholder').multiselect({
            enableFiltering: true,
            filterPlaceholder: 'Search for something...'
        });
    });
</script>
@endsection
