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
    اضافة شركة
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الشركات</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة شركة</span>
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
                    <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }}
                        {{-- ################################ row 1 ################################ --}}
                        <div class="row">
                            <!-- +++++++++++++++++++ اسم الشركة +++++++++++++ -->
                            <div class="col">
                                <label for="inputName" class="control-label">اسم الشركة</label>
                                <input type="text" class="form-control" id="inputName" name="name"
                                    title="يرجي ادخال اسم الشركة" >
                            </div>
                            <!-- +++++++++++++++++++ البريد الالكتروني +++++++++++++ -->
                            <div class="col">
                                <label for="inputName" class="control-label">البريد الالكتروني</label>
                                <input type="text" class="form-control" id="inputName" name="email"
                                    title="يرجي ادخال البريد الالكتروني" >
                            </div>
                        </div>
                        <br/>
                        <!-- +++++++++++++++++++ رابط موقع الشركة +++++++++++++ -->
                        <div class="col">
                            <label for="inputName" class="control-label">رابط موقع الشركة</label>
                            <input type="text" class="form-control" id="inputName" name="website"
                                title="يرجي ادخال رابط موقع الشركة" >
                        </div>
                        <br>
                        <!-- +++++++++++++++++++ المرفقات +++++++++++++ -->
                        <p class="text-danger">* صيغة الصورة pdf, jpeg ,.jpg , png </p>
                        <h5 class="card-title">لوجو الشركة</h5>
                        <div class="col-sm-12 col-md-12">
                            <input type="file" name="pic"  accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                data-height="70" />
                        </div>
                        <br>
                        <!-- +++++++++++++++++++ حفظ البيانات +++++++++++++ -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
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

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>

    <script>
        // +++++++++++++ Ajax Request : Get "products" related to "selected section in selectbox" ++++++++++++++++
        $(document).ready(function() {
            $('select[name="Section"]').on('change', function() {
                var SectionId = $(this).val();
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('section') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="product"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="product"]').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
    <!--
        ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            "مبلغ التحصيل" , "مبلغ العمولة" , "الخصم" , "نسبة ضريبة القيمة المضافة" ,
            "قيمة ضريبة القيمة المضافة" , "الاجمالي شامل الضريبة"
        ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    -->
    <script>
        function myFunction() {
            // ++++++++++++++++++ Amount_Commission "مبلغ العمولة" ++++++++++++++++++++
            var Amount_Commission = parseFloat(document.getElementById("Amount_Commission").value);
            // ++++++++++++++++++ Discount "الخصم" ++++++++++++++++++++
            var Discount = parseFloat(document.getElementById("Discount").value);
            // ++++++++++++++++++ Rate_VAT "نسبة ضريبة القيمة المضافة" ++++++++++++++++++++
            var Rate_VAT = parseFloat(document.getElementById("Rate_VAT").value);
            console.log(Rate_VAT);
            // ++++++++++++++++++ Value_VAT "قيمة ضريبة القيمة المضافة" ++++++++++++++++++++
            var Value_VAT = parseFloat(document.getElementById("Value_VAT").value);
            // ++++++++++++++++++ Total "الاجمالي شامل الضريبة" ++++++++++++++++++++
            var Amount_Commission2 = Amount_Commission - Discount;

            if (typeof Amount_Commission === 'undefined' || !Amount_Commission)
            {
                alert('يرجي ادخال مبلغ العمولة ');
            }
            else
            {
                // ++++++++++++++++++ "قيمة ضريبة القيمة المضافة" ++++++++++++++++++++
                var intResults = Amount_Commission2 * Rate_VAT / 100;
                // ++++++++++++++++++ "الاجمالي شامل الضريبة" ++++++++++++++++++++
                var intResults2 = parseFloat(intResults + Amount_Commission2);
                //  هيحول "قيمة ضريبة القيمة المضافة" الي رقم عشري وهيسمح برقمين فقط بعد العلامة العشرية
                sumq = parseFloat(intResults).toFixed(2);
                //  هيحول "الاجمالي شامل الضريبة" الي رقم عشري وهيسمح برقمين فقط بعد العلامة العشرية
                sumt = parseFloat(intResults2).toFixed(2);
                // Value_VAT الخاص بال inputField لل value هيضع "قيمة ضريبة القيمة المضافة" ك
                document.getElementById("Value_VAT").value = sumq;
                // Total الخاص بال inputField لل value هيضع "الاجمالي شامل الضريبة" ك
                document.getElementById("Total").value = sumt;
            }
        }
    </script>
@endsection
