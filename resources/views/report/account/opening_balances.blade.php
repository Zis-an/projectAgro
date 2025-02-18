@extends('adminlte::page')

@section('title', __('global.opening_balance_report'))

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{__('global.opening_balance_report')}}</h1>


        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('global.home')}}</a></li>
                <li class="breadcrumb-item active">{{__('global.opening_balance_report')}}</li>
            </ol>

        </div>
    </div>
@stop

@section('content')
    <div class="row">
        {{--        <div class="col-md-12">--}}
        {{--            <div class="card">--}}
        {{--                <div class="card-body">--}}
        {{--                    <form action="{{route('report.cattle.opening_balance_report')}}" method="GET">--}}

        {{--                        <div class="row">--}}
        {{--                            <div class=" col-md-3 col-sm-6">--}}
        {{--                                <div class="form-group">--}}
        {{--                                    <label for="farm_id">{{__('global.select_farm')}} <span class="text-danger"> *</span></label>--}}
        {{--                                    <select class="select2 form-control" name="farm_id" id="farm_id">--}}
        {{--                                        <option value="">{{__('global.select_farm')}}</option>--}}

        {{--                                    </select>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="col-md-3 col-sm-6">--}}
        {{--                                <div class="form-group">--}}
        {{--                                    <label for="cattle_type_id">{{ __('global.select_cattle_type')}}<span class="text-danger"> *</span></label>--}}
        {{--                                    <select name="cattle_type_id" id="cattle_type_id" class="form-control select2">--}}
        {{--                                        <option value="">{{ __('global.select_cattle_type')}}</option>--}}

        {{--                                    </select>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class=" col-md-3 col-sm-6">--}}
        {{--                                <div class="form-group">--}}
        {{--                                    <label for="tag_id">{{ __('global.select_tag_id')}}<span class="text-danger"> *</span></label>--}}
        {{--                                    <select name="tag_id" id="tag_id" class="form-control select2">--}}
        {{--                                        <option value="">{{ __('global.select_tag_id')}}</option>--}}

        {{--                                    </select>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}

        {{--                            <div class=" col-md-3 col-sm-6 align-self-end">--}}
        {{--                                <div class="form-group">--}}
        {{--                                    @can('cattle_create')--}}
        {{--                                        <input type="submit" value="{{__('global.filter')}}" class="btn btn-primary form-control ">--}}
        {{--                                    @endcan--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}

        {{--                    </form>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="adminsList" class="table  dataTable table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>{{__('global.sl')}}</th>
                            <th>{{__('global.unique_id')}}</th>
                            <th>{{__('global.date')}}</th>
                            <th>{{__('global.account')}}</th>
                            <th>{{__('global.opening_balances')}}</th>
                            <th>{{__('global.status')}}</th>
                            <th>{{__('global.updated_at')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $sl = 1; ?>
                        @foreach($opening_balances as $opening_balance)
                            <tr>

                                <td>{{$sl++}}</td>
                                <td>{{$opening_balance->unique_id}}</td>
                                <td>{{$opening_balance->date}}</td>
                                <td>{{$opening_balance->account->account_name??'--'}} ({{$opening_balance->account->account_no??'--'}}) {{$opening_balance->account->admin->name??'--'}}</td>
                                <td>{{$opening_balance->amount}}</td>
                                <td>{{$opening_balance->status}}</td>
                                <td>{{date_format($opening_balance->updated_at,'d M y h:i A') }}</td>

                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{__('global.sl')}}</th>
                            <th>{{__('global.unique_id')}}</th>
                            <th>{{__('global.date')}}</th>
                            <th>{{__('global.account')}}</th>
                            <th>{{__('global.opening_balances')}}</th>
                            <th>{{__('global.status')}}</th>
                            <th>{{__('global.updated_at')}}</th>

                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop
@section('footer')
    <strong>{{__('global.developed_by')}} <a href="https://soft-itbd.com">{{__('global.soft_itbd')}}</a>.</strong>
    {{__('global.all_rights_reserved')}}.
    <div class="float-right d-none d-sm-inline-block">
        <b>{{__('global.version')}}</b> {{env('DEV_VERSION')}}
    </div>
@stop
@section('plugins.datatablesPlugins', true)
@section('plugins.Datatables', true)
@section('plugins.Select2', true)


@section('css')

@stop

@section('js')

    <script>



        $(document).ready(function() {
            $('.select2').select2({
                theme:'classic'
            })

            $("#adminsList").DataTable({
                dom: 'Bfrtip',
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                searching: true,
                ordering: true,
                info: true,
                paging: true,
                buttons: [
                    {
                        extend: 'copy',
                        text: '{{ __('global.copy') }}',
                    },
                    {
                        extend: 'csv',
                        text: '{{ __('global.export_csv') }}',
                    },
                    {
                        extend: 'excel',
                        text: '{{ __('global.export_excel') }}',
                    },
                    {
                        extend: 'pdf',
                        text: '{{ __('global.export_pdf') }}',
                    },
                    {
                        extend: 'print',
                        text: '{{ __('global.print') }}',
                    },
                    {
                        extend: 'colvis',
                        text: '{{ __('global.colvis') }}',
                    }
                ],
                pagingType: 'full_numbers',
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100],
                language: {
                    paginate: {
                        first: "{{ __('global.first') }}",
                        previous: "{{ __('global.previous') }}",
                        next: "{{ __('global.next') }}",
                        last: "{{ __('global.last') }}",
                    }
                }
            });

            loadFarms();
            loadCattleTypes();
            $('#farm_id').change(function() {
                var farm_id = $(this).val();
                var cattle_type_id = $('#cattle_type_id').val();
                if (farm_id || cattle_type_id) {
                    loadCattleList(farm_id,cattle_type_id);
                } else {
                    $('#tag_id').empty();
                }
            });
            $('#cattle_type_id').change(function() {
                var cattle_type_id = $(this).val();
                var farm_id = $('#farm_id').val();
                if (cattle_type_id || farm_id) {
                    loadCattleList(farm_id,cattle_type_id);

                } else {
                    $('#tag_id').empty();
                }
            });

        });
        function loadFarms() {
            $.ajax({
                url: '{{route('farms')}}', // Replace with your server URL
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    var farm_id = $('#farm_id');
                    farm_id.empty();
                    farm_id.append($('<option>', {
                        value: '',
                        text: '{{ __('global.select_farm')}}'
                    }));
                    $.each(data, function(key, value) {
                        farm_id.append($('<option>', {
                            value: value.id,
                            text: value.name
                        }));
                    });
                }
            });
        }
        function loadCattleTypes() {
            $.ajax({
                url: '{{route('cattle_types')}}', // Replace with your server URL
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    var cattle_type_id = $('#cattle_type_id');
                    cattle_type_id.empty();
                    cattle_type_id.append($('<option>', {
                        value: '',
                        text: '{{ __('global.select_cattle_type')}}'
                    }));
                    $.each(data, function(key, value) {
                        cattle_type_id.append($('<option>', {
                            value: value.id,
                            text: value.title
                        }));
                    });
                }
            });
        }
        function loadCattleList(farm_id,cattle_type_id) {
            $.ajax({
                url: "{{ route('farm_cattle_list') }}",
                method: 'GET',
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}', // Add a CSRF token if needed
                    farm_id: farm_id ,// Send cattle_type_id as data
                    cattle_type_id: cattle_type_id ,// Send cattle_type_id as data
                },
                success: function(data) {
                    var tagSelect = $('#tag_id');
                    tagSelect.empty();
                    tagSelect.append($('<option>', {
                        value: '',
                        text: '{{__('global.select_tag_id')}}'
                    }));
                    $.each(data, function(key, value) {
                        tagSelect.append($('<option>', {
                            value: value.id,
                            text: value.tag_id
                        }));
                    });
                }
            });
        }

    </script>
@stop
