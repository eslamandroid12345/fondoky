@extends('layout.master')
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
  اضافه موظف جديد للوحه
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{__('admin_create.home')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                   {{__('admin_create.edit_admin')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('admin'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('admin') }}</strong>

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
                    <form action="{{route('admins.store')}}" method="post" enctype="multipart/form-data"
                          autocomplete="off">

                        @csrf

                        <div class="row">


                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{__('admin_create.employee_name')}}</label>
                                <input type="text" class="form-control" id="inputName" name="name" value="{{old('name')}}">
                                <span class="text-danger"> @error('name') {{$message}} @enderror</span>

                            </div>

                          <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{__('admin_create.email')}}</label>
                                <input type="email" class="form-control" id="inputName" name="email" value="{{old('email')}}">
                                <span class="text-danger"> @error('email') {{$message}} @enderror</span>

                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{__('admin_create.password')}}</label>
                                <input type="password" class="form-control" id="inputName" name="password" value="{{old('password')}}">
                                <span class="text-danger"> @error('password') {{$message}} @enderror</span>

                            </div>


                             <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{__('admin_create.phone')}}</label>
                                <input type="number" class="form-control" id="inputName" name="phone" value="{{old('phone')}}">
                                <span class="text-danger"> @error('phone') {{$message}} @enderror</span>

                            </div>



                            <div class="col-lg-8 col-md-8 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{__('admin.select_role')}}</label>
                                <select name="role_id" class="form-control SlectBox" onclick="console.log($(this).val())"
                                        onchange="console.log('change is firing')">

                                    <option selected disabled>{{__('admin.select_role')}}</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                                </select>
                                <span class="text-danger"> @error('role_id') {{$message}} @enderror</span>

                            </div>






                        <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                            <h5 class="card-title">{{__('admin_create.image')}}</h5>

                            <input type="file" name="image" class="dropify" accept=".jpg, .png, image/jpeg, image/png"
                                   data-height="70" />
                            <span class="text-danger"> @error('image') {{$message}} @enderror</span>

                        </div>
                            <br>


                         </div>


                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary">{{__('admin_create.save')}}</button>
                        </div>
                    </form>
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
