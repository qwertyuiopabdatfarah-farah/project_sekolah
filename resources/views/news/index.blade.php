@extends('layouts.private')

@section('atas')
    <link rel="stylesheet" href="{{asset('vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />
@endsection


@section('isi')
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
            </div>
            <h2 class="panel-title">Default</h2>
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-md">
                        @can('pengumumans-create')
                            <button type="button" name="add" id="add_data" class="btn btn-success">
                                Add Pengumuman  <i class="fa fa-plus"></i>
                            </button>
                        @endcan
                        <a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
                    </div>
                </div>
            </div>
            <div id="datatable-editable_wrapper" class="dataTables_wrapper no-footer">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-none dataTable no-footer" id="pengumuman_table" role="grid" aria-describedby="datatable-editable_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" style="width: 9px;">No</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1"  style="width: 142px;">Name</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1"  style="width: 72px;">Jenis Kelamin</th>
                            {{--<th tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1"  style="width: 218px;">Detail</th>--}}
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 27px;">Actions</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 17px; position: center;">
                                @can('pengumumans-delete')
                                    <button type="button" name="multiple_delete" id="delete_all" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                @endcan
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>



    <div id="pengumumanModalAdd" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="pengumuman_formAdd">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Data Pengumuman</h4>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <span id="form_outputAdd"></span>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" id="nameAdd" class="form-control"/>
                        </div>
                        <div>
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelaminAdd" class="form-control">
                                <option value="">--Pilih Salah Satu--</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Detail</label>
                            <textarea name="detail" class="form-control" rows="10" id="detailAdd" ></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id" value="" />
                        <input type="hidden" name="button_actionAdd" id="button_actionAdd" value="insert" />
                        <input type="submit" name="submit" id="actionAdd" value="Add" class="btn btn-info" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="pengumumanModalEdit" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="pengumuman_formEdit">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Data Pengumuman</h4>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <span id="form_outputEdit"></span>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" id="nameEdit" class="form-control" />
                        </div>
                        <div>
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelaminEdit" class="form-control">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Detail</label>
                            <textarea name="detail" class="form-control" rows="10" id="detailEdit" ></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="idEdit" value="" />
                        <input type="hidden" name="button_actionEdit" id="button_actionEdit" value="edit" />
                        <input type="submit" name="submit" id="actionEdit" value="Edit" class="btn btn-info" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('bawah')
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-datatables-bs3/assets/js/datatables.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#pengumuman_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('get.pengumuman') }}',
                columns: [
                    {data: 'DT_Row_Index', orderable: true, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'jenis_kelamin', name: 'jenis_kelamin'},
                   /* {data: 'detail', name: 'detail', orderable: false},*//*
                 {data: 'kategori', name: 'kategori', orderable: false, searchable: false},*/
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'checkbox', orderable:false, searchable:false}
                ]});

            $('#add_data').click(function(){
                $('#pengumumanModalAdd').modal('show');
                $('#pengumuman_formAdd')[0].reset();
                $('#form_outputAdd').html('');
                $('#button_actionAdd').val('insert');
                $('#actionAdd').val('Add');
                $('.modal-title').text('Add Data');
            });


            $('#pengumuman_formAdd').on('submit', function(event){
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url:"{{ route('store.pengumuman') }}",
                    method:"POST",
                    data:form_data,
                    dataType:"json",
                    success:function(data)
                    {
                        if(data.error.length > 0)
                        {
                            var error_html = '';
                            for(var count = 0; count < data.error.length; count++)
                            {
                                error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                            }
                            $('#form_outputAdd').html(error_html);
                        }
                        else
                        {
                            $('#form_outputAdd').html(data.success);
                            $('#pengumuman_formAdd')[0].reset();
                            $('#actionAdd').val('Add');
                            $('.modal-title').text('Add Data');
                            $('#button_actionAdd').val('insert');
                            $('#pengumuman_table').DataTable().ajax.reload();
                        }
                    }
                })
            });

            $(document).on('click', '.edit', function(){
                var id = $(this).attr("id");
                $('#form_outputEdit').html('');
                $.ajax({
                    url:"{{route('fetch.pengumuman')}}",
                    method:'get',
                    data:{id:id},
                    dataType:'json',
                    success:function(data)
                    {
                        $('#nameEdit').val(data.name);
                        $('option:selected', $('#jenis_kelaminEdit')).text(data.jenis_kelamin);
                        //$('#jenis_kelaminEdit option:selected').text(data.jenis_kelamin);
                        $('#detailEdit').val(data.detail);
                        $('#idEdit').val(id);
                        $('#pengumumanModalEdit').modal('show');
                        $('#actionEdit').val('Edit');
                        $('.modal-title').text('Edit Data');
                        $('#button_actionEdit').val('update');
                    }
                })
            });


            $('#pengumuman_formEdit').on('submit', function(event){
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url:"{{ route('edit.pengumuman') }}",
                    method:"POST",
                    data:form_data,
                    dataType:"json",
                    success:function(data)
                    {
                        if(data.error.length > 0)
                        {
                            var error_html = '';
                            for(var count = 0; count < data.error.length; count++)
                            {
                                error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                            }
                            $('#form_outputAdd').html(error_html);
                        }
                        else
                        {
                            $('#form_outputEdit').html(data.success);
                            $('#pengumuman_formEdit')[0].reset();
                            $('#actionEdit').val('Edit');
                            $('.modal-title').text('Edit Data');
                            $('#button_actionEdit').val('edit');
                            $('#pengumuman_table').DataTable().ajax.reload();
                        }
                    }
                })
            });


            $(document).on('click', '.delete', function(){
                var id = $(this).attr('id');
                if(confirm("Are you sure you want to Delete this data?"))
                {
                    $.ajax({
                        url:"{{route('destroy.pengumuman')}}",
                        mehtod:"get",
                        data:{id:id},
                        success:function(data)
                        {
                            alert(data);
                            $('#pengumuman_table').DataTable().ajax.reload();
                        }
                    })
                }
                else
                {
                    return false;
                }
            });

            $(document).on('click', '#delete_all', function(){
                var id = [];
                if(confirm("Are you sure you want to Delete this data?"))
                {
                    $('.pengumuman_checkbox:checked').each(function(){
                        id.push($(this).val());
                    });
                    if(id.length > 0)
                    {
                        $.ajax({
                            url:"{{ route('destroyall.pengumuman')}}",
                            method:"get",
                            data:{id:id},
                            success:function(data)
                            {
                                alert(data);
                                $('#pengumuman_table').DataTable().ajax.reload();
                            }
                        });
                    }
                    else
                    {
                        alert("Please select atleast one checkbox");
                    }
                }
            });


        });
    </script>
@endsection