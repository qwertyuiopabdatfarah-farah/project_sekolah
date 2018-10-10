@extends('layouts.public')

@section('atas')
<link href="{{ asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" type="text/css" rel="stylesheet">
@endsection

@section('isi')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="alert alert-info alert-admin">
                <div class="row">
                    <div class="col-lg-12" style="text-align: left">
                        <h4><strong class="warning"><i class="fa fa-warning"></i>Pemberitahuan !</strong></h4>
                        <p><strong>Isi data pada form secara benar sesuai dengan data Anda, bila Anda mendapat kesulitan bisa
                                mendownload file documentasi dengan  cara klik tombol dibawah</strong></p>
                        <p>
                            <button class="btn btn-primary">Download Documentasi</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div data-collapsed="0" class="card card-admin">
                <div class="card-header">
                    <div class="card-title">
                        <h2 class="card-title">Daftar Peserta Didik Baru</h2>
                    </div>
                </div> 
                @include('flash::message')
            {{ Form::open(['route' => 'siswa.store', 'method' => 'POST']) }}
                <div class="card-body">
                    <div class="row">

                        {{--<button class="btn btn-primary" data-toggle="modal" data-target="#formModal">
                            Launch Form Modal
                        </button>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="formModalLabel">Large Modal Title</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form id="demo-form" class="mb-4" novalidate="novalidate">
                                    <diform-group row row align-items-center">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control" placeholder="Type your name..." required="">
                                        </div>
                                    </div>
                                    <diform-group row row align-items-center">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" class="form-control" placeholder="Type your email..." required="">
                                        </div>
                                    </div>
                                    <diform-group row row align-items-center">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">URL</label>
                                        <div class="col-sm-9">
                                            <input type="url" name="url" class="form-control" placeholder="Type an URL...">
                                        </div>
                                    </div>
                                    <diform-group row row">
                                        <label class="col-sm-3 text-left text-sm-right mb-0">Comment</label>
                                        <div class="col-sm-9">
                                            <textarea rows="5" class="form-control" placeholder="Type your comment..." required=""></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>--}}
             <div class="container">
                <div class="row">
                    <div class="col-lg-1">
                    </div>

                    <div class="col-lg-4">
                        

                        <div class="form-group row{{ $errors->has('nama_lengkap') ? ' has-error' : '' }}">
                            <label>Nama Lengkap Sesuai Ijasah</label>
                            {{ Form::text('nama_lengkap', null, ['class' => 'form-control mb-3', 'placeholder'=> 'Nama Lengkap']) }}
                            @if ($errors->has('nama_lengkap'))
                            <span class="help-block">
                            <strong>{{ $errors->first('nama_lengkap') }}</strong>
                            </span>
                            @endif
                        </div>
                        
                        <div class="form-group row{{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
                        <label>Jenis Kelamin</label>
                        {!! Form::select('jenis_kelamin',[null =>'::Jenis Kelamin::', 'Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'], null, ['class' => 'form-control mb-3']) !!}
                        @if ($errors->has('jenis_kelamin'))
                        <span class="help-block">
                        <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                        </span>
                        @endif
                        </div>


                        <div class="form-group row{{ $errors->has('tingkat_sekolah') ? ' has-error' : '' }}">
                        <label>Masuk Pada Tingkat</label>
                        {!! Form::select('tingkat_sekolah',[null =>'::Tingkat::',
                                                           'MTS' => 'Madrasah Tsaniyah (MTS)'
                                                            ,'MA'=> 'Madrasah Aliyah (MA)'
                                                            ], 
                                                           null, ['class' => 'form-control mb-3']) !!}
                        @if ($errors->has('tingkat_sekolah'))
                        <span class="help-block">
                        <strong>{{ $errors->first('tingkat_sekolah') }}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group row{{ $errors->has('agama') ? ' has-error' : '' }}">
                        <label>Masuk Pada Tingkat</label>
                        {!! Form::select('agama',[null =>'::Agama::', 
                                                 'Islam'     => 'Islam', 
                                                 'Protestan' => 'Protestan',
                                                 'Katolik'   => 'Katolik',
                                                 'Hindu'     => 'Hindu',
                                                 'Budha'     => 'Budha'
                                                  ], 
                                                  null, ['class' => 'form-control mb-3']) !!}
                        @if ($errors->has('agama'))
                        <span class="help-block">
                        <strong>{{ $errors->first('agama') }}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group row{{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
                        <label>Tempat Lahir</label>
                        {!! Form::text('tempat_lahir', null, ['placeholder' => 'Tempat Lahir','class' => 'form-control mb-3']) !!}
                        @if ($errors->has('tempat_lahir'))
                        <span class="help-block">
                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group row{{ $errors->has('tanggal_lahir') ? ' has-error' : '' }}">
                        <label>Tanggal Lahir</label>
                        {!! Form::text('tanggal_lahir', null, ['placeholder' => 'Tanggal Lahir','class' => 'form-control mb-3','id' => 'tgl']) !!}
                        @if ($errors->has('tanggal_lahir'))
                        <span class="help-block">
                        <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                        </span>
                        @endif
                    </div>

                    </div>
                    <div class="col-lg-2">
                    </div>    
                    <div class="col-lg-4"> 
                        
                        <div class="form-group row{{ $errors->has('telepon') ? ' has-error' : '' }}">
                        <label>No Telepon</label>
                        {!! Form::number('telepon', null, ['placeholder' => 'No Telepon','class' => 'form-control mb-3']) !!}
                        @if ($errors->has('telepon'))
                        <span class="help-block">
                        <strong>{{ $errors->first('telepon') }}</strong>
                        </span>
                        @endif
                        </div>
                        
                        <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label>E-Mail</label>
                        {!! Form::email('email', null, ['placeholder' => 'E-Mail','class' => 'form-control mb-3']) !!}
                        @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                        </div>


                        <div class="form-group row{{ $errors->has('nama_sekolah_sebelumnya') ? ' has-error' : '' }}">
                        <label>No Telepon</label>
                        {!! Form::text('nama_sekolah_sebelumnya', null, ['placeholder' => 'Nama Sekolah Sebelumnya','class' => 'form-control mb-3']) !!}
                        @if ($errors->has('nama_sekolah_sebelumnya'))
                        <span class="help-block">
                        <strong>{{ $errors->first('nama_sekolah_sebelumnya') }}</strong>
                        </span>
                        @endif
                        </div>



                        <div class="form-group row{{ $errors->has('alamat_sekolah_sebelumnya') ? ' has-error' : '' }}">
                        <label>Alamat Sekolah Sebelumnya</label>
                        {!! Form::textarea('alamat_sekolah_sebelumnya', null, ['class' => 'form-control mb-3', 'placeholder'=> 'Alamat Sekolah Sebelumnya', 'size' => '5x5']) !!}
                        @if ($errors->has('alamat_sekolah_sebelumnya'))
                        <span class="help-block">
                        <strong>{{ $errors->first('alamat_sekolah_sebelumnya') }}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group row{{ $errors->has('alamat_rumah') ? ' has-error' : '' }}">
                        <label>Alamat Lengkap Rumah</label>
                        {!! Form::textarea('alamat_rumah', null, ['class' => 'form-control mb-3', 'placeholder'=> 'Alamat Rumah', 'size' => '5x5']) !!}
                        @if ($errors->has('alamat_rumah'))
                        <span class="help-block">
                        <strong>{{ $errors->first('alamat_rumah') }}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group row">
                          {{ Form::button('<i class="fa fa-send fa-fw " aria-hidden="true"></i> Kirim ', ['type' => 'submit', 'class' => 'btn btn-outline custom-border-width btn-primary custom-border-radius font-weight-semibold text-uppercase mt-5 mb-3']) }}
                          <p>&nbsp;</p>
                          <a class="btn btn-outline custom-border-width btn-danger custom-border-radius font-weight-semibold text-uppercase mt-5 mb-3"
                               href="{{--{{ route('') }}--}}" title="Batal">
                            <i class="fa fa-arrows-alt fa-fw" aria-hidden="true"></i>Batal</a>  
                        </div>    
                   </div>
                <div class="col-lg-1">
                </div>
               </div>
             </div>


                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection

@section('bawah')
<script src="{{ asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
                $('#tgl').datepicker({
                    format: "yyyy-mm-dd",
                    autoclose:true
                });
            });
</script>
@endsection