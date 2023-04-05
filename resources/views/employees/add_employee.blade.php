@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
    اضافة موظف
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('Frontend/frontend.employees') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">&nbsp; / {{ __('Frontend/frontend.add_employee') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    {{-- +++++++++++++++++++++++ Error Messages  ++++++++++++++++++++ --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{-- +++++++++++++++++++++++ Add Message ++++++++++++++++++++ --}}
    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }}
                        {{-- ################################ row 1 ################################ --}}
                        <div class="row">
                            <!-- +++++++++++++++++++ اسم الاول +++++++++++++ -->
                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('Frontend/frontend.firstName') }}</label>
                                <input type="text" class="form-control" id="inputName" name="firstName"
                                    title="{{ __('Frontend/frontend.Enter First Name') }}" >
                            </div>
                            <!-- +++++++++++++++++++ اسم الثاني +++++++++++++ -->
                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('Frontend/frontend.lastName') }}</label>
                                <input  type="text" class="form-control" id="inputName" name="lastName"
                                        title="{{ __('Frontend/frontend.Enter Last Name') }}" >
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <!-- +++++++++++++++++++ رقم الهاتف +++++++++++++ -->
                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('Frontend/frontend.phone') }}</label><br/>
                                <input type="text" class="form-control" id="inputName" name="phone"
                                title="{{ __('Frontend/frontend.Enter Phone Number') }}">
                            </div>
                            <!-- +++++++++++++++++++ البريد الالكتروني +++++++++++++ -->
                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('Frontend/frontend.email') }}</label><br/>
                                <input type="text" class="form-control" id="inputName" name="email"
                                title="{{ __('Frontend/frontend.Enter Email Address') }}" >
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                        <!-- +++++++++++++++++++ حدد الشركة +++++++++++++ -->
                            <div class="col">
                                <label for="inputName" class="control-label">{{ __('Frontend/frontend.company') }}</label><br/>
                                <select name="company" class="form-control">
                                    <!--placeholder-->
                                    <option value="" selected disabled>{{ __('Frontend/frontend.select company') }}</option>
                                    @foreach ($allCompanies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><br/><br/>
                        <div class="row">
                            <!-- +++++++++++++++++++ حفظ البيانات +++++++++++++ -->
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">{{ __('Frontend/frontend.save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

@endsection
