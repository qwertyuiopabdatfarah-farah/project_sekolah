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
<h2 class="panel-title">Add Users</h2>
</header>

     <div class="panel-body" style="display: block;">  
         {{ Form::open(['route' => 'users.store', 'method' => 'POST', 'class' => 'form-horizontal form-bordered']) }}   

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label class="col-md-3 control-label">Name</label>
          <div class="col-md-6">  
          {{ Form::text('name', null, ['class' => 'form-control mb-3', 'placeholder'=> 'Name']) }}
          @if ($errors->has('name'))
          <span class="help-block">
          <strong>{{ $errors->first('name') }}</strong>
          </span>
          @endif                                      
          </div>
        </div>



        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <label class="col-md-3 control-label">Email</label>
          <div class="col-md-6">  
          {{ Form::email('email', null, ['class' => 'form-control mb-3', 'placeholder'=> 'Email']) }}
          @if ($errors->has('email'))
          <span class="help-block">
          <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif                                      
          </div>
        </div>


        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <label class="col-md-3 control-label">Password</label>
          <div class="col-md-6">  
         {!! Form::password('password', ['placeholder' => 'Password','class' => 'form-control']) !!}
          @if ($errors->has('password'))
          <span class="help-block">
          <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif                                      
          </div>
        </div>


        <div class="form-group{{ $errors->has('confirm-password') ? ' has-error' : '' }}">
          <label class="col-md-3 control-label">Confirm Password</label>
          <div class="col-md-6">  
          {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password','class' => 'form-control']) !!}
          @if ($errors->has('confirm-password'))
          <span class="help-block">
          <strong>{{ $errors->first('confirm-password') }}</strong>
          </span>
          @endif                                      
          </div>
        </div>


        <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
          <label class="col-md-3 control-label">Permissions</label>
          <div class="col-md-6">  
         {!! Form::select('roles[]', $roles, [], 
         ['multiple' => true, 
          'class' => 'form-control mb-3',
          'id' => 'example-filter-placeholder']) !!} 
        @if ($errors->has('roles'))
          <span class="help-block">
          <strong>{{ $errors->first('roles') }}</strong>
          </span>
          @endif                                      
          </div>
        </div>

        {{-- {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!} --}}



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