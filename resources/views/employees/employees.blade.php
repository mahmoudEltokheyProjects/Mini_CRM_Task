@extends('layouts.master')
@section('title')
    قائمةالموظفين
@stop
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">{{ __('Frontend/frontend.employees') }}</h4>
                    <span class="text-muted mt-1 tx-13 mr-2 mb-0">&nbsp; /  {{ __('Frontend/frontend.employees_list') }}</span>

                </div>
            </div>
        </div>
        <!-- breadcrumb -->
@endsection
@section('content')

        <!-- +++++++++++++ Center Content of The Page +++++++++++++ -->
        <!-- ############## Start row : companies Table ############## -->
        <div class="row row-sm">
            <!-- Bordered Table -->
            <div class="col-xl-12">
                <div class="card mg-b-20">
                    <div class="card-header pb-0">
                        <!-- Add employee -->
                        <a href="{{ route('employees.create') }}" class="modal-effect btn btn-primary" style="color:white">
                            <i class="fas fa-plus"></i>&nbsp; {{ __('Frontend/frontend.add_employee') }}
                        </a>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">{{ __('Frontend/frontend.order') }}</th>
                                        <th class="border-bottom-0">{{ __('Frontend/frontend.firstName') }}</th>
                                        <th class="border-bottom-0">{{ __('Frontend/frontend.lastName') }}</th>
                                        <th class="border-bottom-0">{{ __('Frontend/frontend.phone') }}</th>
                                        <th class="border-bottom-0">{{ __('Frontend/frontend.email') }}</th>
                                        <th class="border-bottom-0">{{ __('Frontend/frontend.company_name') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- "counter variable" for inovices numbering "# column in table" -->
                                    @php $i = 0; @endphp
                                    <!-- Show "All inovices" -->
                                    @foreach ( $employees as $employee )
                                        @php $i++; @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $employee->firstName }}</td>
                                            <td>{{ $employee->lastName }}</td>
                                            <td>{{ $employee->phone }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <!-- +++++++++++++++++++  الشركة +++++++++++++ -->
                                            <td>
                                                {{ $employee->companyRelation->name }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $employees->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!--/div-->
        </div>
        <!-- +++++++++++++++++++++++++++++++ حذف الشركة +++++++++++++++++++++++++++++++ -->
        <div  class="modal fade" id="delete_employee" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel"     aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">حذف الموظف</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('employees.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            هل انت متاكد من عملية الحذف ؟
                            <input type="hidden" name="employee_id" id="employee_id" value="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تاكيد</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- ############## End row : companies Table ############## -->
    </div>
    <!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

<!-- Appear "company_id" in "Delete company Modal" -->
<script>
    $('#delete_company').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var invoice_id = button.data('company_id')
        var modal = $(this)
        modal.find('.modal-body #company_id').val(company_id);
    })
</script>
@endsection
