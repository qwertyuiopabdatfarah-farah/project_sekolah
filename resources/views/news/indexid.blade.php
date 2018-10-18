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
                        @can('news-create')
                            <button type="button" name="add" id="add_data" class="btn btn-success">
                                Add Pengumuman  <i class="fa fa-plus"></i>
                            </button>
                        @endcan
                       
                    </div>
                </div>
            </div>
            <div id="datatable-editable_wrapper" class="dataTables_wrapper no-footer">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-none dataTable no-footer" id="news_table" role="grid" aria-describedby="datatable-editable_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" style="width: 9px;">No</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1"  style="width: 142px;">Name</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1"  style="width: 72px;">Jenis Kelamin</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 27px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('bawah')
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-datatables-bs3/assets/js/datatables.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#news_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('news.get.id') }}',
                columns: [
                    {data: 'DT_Row_Index', orderable: true, searchable: false},
                    {data: 'user.name',  name: 'user.name'},
                    {data: 'judul',      name: 'news.judul', orderable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
                });
        });
    </script>
@endsection