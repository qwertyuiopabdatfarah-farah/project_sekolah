@extends('layouts.private')

@section('atas')
<link rel="stylesheet" href="{{ asset('css/multiselect/bootstrap-multiselect.css') }}">
@endsection


@section('isi')
<section class="panel">
            <div class="panel-body">
              <div class="invoice">
                <div class="table-responsive">
                  <table class="table invoice-items">
                    <thead>
                      <tr class="h4 text-dark">
                        <th id="cell-id" class="text-weight-semibold">Name</th>
                        <th id="cell-item" class="text-weight-semibold">Email</th>
                        <th id="cell-item" class="text-weight-semibold">Roles</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{ $user->name }}</td>  
                        <td>{{ $user->email }}</td>  
                        <td>
                             @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                   <br/><label class="badge badge-success">{{ $v }}</label><br/>
                                 @endforeach
                            @endif
                       </td>       
                       </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="text-right mr-lg">
                <a class="btn btn-primary" href="{{ route('users.index') }}"><i class="fa fa-external-link" aria-hidden="true"></i> Back</a>
              </div>
            </div>
          </section>
@endsection

@section('bawah')
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
@endsection