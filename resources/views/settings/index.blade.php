@extends('layouts_admin.master')
@section('css')

    @section('title')
        {{__('sidebar_admin.settings')}}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{__('sidebar_admin.settings')}}

    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        @if($settings->count() == 0)
                        <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                            {{trans('setting.add_setting_modal')}}
                        </button>
                        @endif

                    <br><br>


                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>{{trans('setting.logo')}}</th>
                                <th>{{trans('setting.name_ar')}}</th>
                                <th>{{trans('setting.name_en')}}</th>
                                <th>{{trans('setting.about_ar')}}</th>
                                <th>{{trans('setting.about_en')}}</th>
                                <th>{{trans('setting.privacy_ar')}}</th>
                                <th>{{trans('setting.privacy_en')}}</th>
                                <th>{{trans('setting.location_ar')}}</th>
                                <th>{{trans('setting.location_en')}}</th>
                                <th>{{trans('setting.vat_tax')}}</th>
                                <th>{{trans('setting.municipal_tax')}}</th>
                                <th>{{trans('setting.tourism_tax')}}</th>
                                <th>{{trans('data.action')}}</th>


                            </tr>
                            </thead>
                            <tbody>



                            @foreach ($settings as $setting)
                                <tr>

                                    <td>
                                        <img style="width: 80px;height: 80px;border-radius: 4px" src="{{URL::to('setting/'.$setting->logo)}}">
                                    </td>
                                    <td>{{$setting->name_ar}}</td>
                                    <td>{{$setting->name_en}}</td>
                                    <td>{{$setting->about_ar}}</td>
                                    <td>{{$setting->about_en}}</td>
                                    <td>{{$setting->privacy_ar}}</td>
                                    <td>{{$setting->privacy_en}}</td>
                                    <td>{{$setting->location_ar}}</td>
                                    <td>{{$setting->location_en}}</td>
                                    <td>{{$setting->vat_tax}}</td>
                                    <td>{{$setting->municipal_tax}}</td>
                                    <td>{{$setting->tourism_tax}}</td>


                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $setting->id }}" title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $setting->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                    </td>
                                </tr>



                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $setting->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('setting.edit') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                                <!-- edit_form -->
                                                <form action="{{route('settings.update')}}" enctype="multipart/form-data" method="post" autocomplete="off">

                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">

                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $setting->id }}">
                                                        {{--logo--}}
                                                        <div class="col-lg-12 col-md-12 col-12">
                                                            <label for="Name"
                                                                   class="mr-sm-2">{{trans('setting.logo')}}
                                                                :</label>
                                                            <input class="form-control" type="file" name="logo"  />
                                                            <img style="width: 100px;height: 100px;border-radius: 4px" src="{{URL::to('setting/'.$setting->logo)}}">

                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-12">
                                                            <label for="Name"
                                                                   class="mr-sm-2 mt-4">{{trans('setting.name_ar')}}
                                                                :</label>
                                                            <input class="form-control" type="text" name="name_ar" value="{{$setting->name_ar}}" />
                                                        </div>


                                                        <div class="col-lg-12 col-md-12 col-12">
                                                            <label for="Name"
                                                                   class="mr-sm-2 mt-4">{{trans('setting.name_en')}}
                                                                :</label>
                                                            <input class="form-control" type="text" name="name_en" value="{{$setting->name_en}}" />
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-12">
                                                            <label for="Name"
                                                                   class="mr-sm-2 mt-4">{{trans('setting.about_ar')}}
                                                                :</label>
                                                            <textarea class="form-control" type="text" name="about_ar">{{$setting->about_ar}}</textarea>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-12">
                                                            <label for="Name"
                                                                   class="mr-sm-2 mt-4">{{trans('setting.about_en')}}
                                                                :</label>
                                                            <textarea class="form-control" type="text" name="about_en">{{$setting->about_en}}</textarea>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-12">
                                                            <label for="Name"
                                                                   class="mr-sm-2 mt-4">{{trans('setting.privacy_ar')}}
                                                                :</label>
                                                            <textarea class="form-control" type="text" name="privacy_ar">{{$setting->privacy_ar}}</textarea>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-12">
                                                            <label for="Name"
                                                                   class="mr-sm-2 mt-4">{{trans('setting.privacy_en')}}
                                                                :</label>
                                                            <textarea class="form-control" type="text" name="privacy_en">{{$setting->privacy_en}}</textarea>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-12">
                                                            <label for="Name"
                                                                   class="mr-sm-2 mt-4">{{trans('setting.location_ar')}}
                                                                :</label>
                                                            <input class="form-control" type="text" name="location_ar" value="{{$setting->location_ar}}" />
                                                        </div>


                                                        <div class="col-lg-12 col-md-12 col-12">
                                                            <label for="Name"
                                                                   class="mr-sm-2 mt-4">{{trans('setting.location_en')}}
                                                                :</label>
                                                            <input class="form-control" type="text" name="location_en" value="{{$setting->location_en}}" />
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-12">
                                                            <label for="Name"
                                                                   class="mr-sm-2 mt-4">{{trans('setting.vat_tax')}}
                                                                :</label>
                                                            <input class="form-control" type="text" name="vat_tax" value="{{$setting->vat_tax}}" />
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-12">
                                                            <label for="Name"
                                                                   class="mr-sm-2 mt-4">{{trans('setting.municipal_tax')}}
                                                                :</label>
                                                            <input class="form-control" type="text" name="municipal_tax" value="{{$setting->municipal_tax}}" />
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-12">
                                                            <label for="Name"
                                                                   class="mr-sm-2 mt-4">{{trans('setting.tourism_tax')}}
                                                                :</label>
                                                            <input class="form-control" type="text" name="tourism_tax" value="{{$setting->tourism_tax}}" />
                                                        </div>

                                                    </div><br>

                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('setting.close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-success">{{ trans('setting.edit') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $setting->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('setting.confirm_delete') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('settings.delete')}}"
                                                      method="post">

                                                    @csrf
                                                    @method('DELETE')

                                                    {{ trans('setting.confirm_delete') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $setting->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('setting.close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{ trans('setting.delete') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>




        <!-- add_modal_class -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            {{trans('setting.add_setting_modal')}}

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form class="row mb-30" action="{{route('settings.store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="card-body">
                                <div class="row">


                                    {{--logo--}}
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <label for="Name"
                                               class="mr-sm-2">{{trans('setting.logo')}}
                                            :</label>
                                        <input class="form-control" type="file" name="logo">
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-12">
                                        <label for="Name"
                                               class="mr-sm-2 mt-3">{{trans('setting.name_ar')}}
                                            :</label>
                                        <input class="form-control" type="text" name="name_ar" value="{{old('name_ar')}}">
                                    </div>


                                    <div class="col-lg-12 col-md-12 col-12">
                                        <label for="Name"
                                               class="mr-sm-2 mt-3">{{trans('setting.name_en')}}
                                            :</label>
                                        <input class="form-control" type="text" name="name_en"  value="{{old('name_en')}}">
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-12">
                                        <label for="Name"
                                               class="mr-sm-2 mt-3">{{trans('setting.about_ar')}}
                                            :</label>
                                        <input class="form-control" type="text" name="about_ar"  value="{{old('about_ar')}}">
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-12">
                                        <label for="Name"
                                               class="mr-sm-2 mt-3">{{trans('setting.about_en')}}
                                            :</label>
                                        <input class="form-control" type="text" name="about_en"  value="{{old('about_en')}}">
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-12">
                                        <label for="Name"
                                               class="mr-sm-2 mt-3">{{trans('setting.privacy_ar')}}
                                            :</label>
                                        <input class="form-control" type="text" name="privacy_ar"  value="{{old('privacy_ar')}}">
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-12">
                                        <label for="Name"
                                               class="mr-sm-2 mt-3">{{trans('setting.privacy_en')}}
                                            :</label>
                                        <input class="form-control" type="text" name="privacy_en"  value="{{old('privacy_en')}}">
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-12">
                                        <label for="Name"
                                               class="mr-sm-2 mt-3">{{trans('setting.location_ar')}}
                                            :</label>
                                        <input class="form-control" type="text" name="location_ar"  value="{{old('location_ar')}}">
                                    </div>


                                    <div class="col-lg-12 col-md-12 col-12">
                                        <label for="Name"
                                               class="mr-sm-2 mt-3">{{trans('setting.location_en')}}
                                            :</label>
                                        <input class="form-control" type="text" name="location_en"  value="{{old('location_en')}}">
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-12">
                                        <label for="Name"
                                               class="mr-sm-2 mt-3">{{trans('setting.vat_tax')}}
                                            :</label>
                                        <input class="form-control" type="text" name="vat_tax"  value="{{old('vat_tax')}}">
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-12">
                                        <label for="Name"
                                               class="mr-sm-2 mt-3">{{trans('setting.municipal_tax')}}
                                            :</label>
                                        <input class="form-control" type="text" name="municipal_tax"  value="{{old('municipal_tax')}}">
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-12">
                                        <label for="Name"
                                               class="mr-sm-2 mt-3">{{trans('setting.tourism_tax')}}
                                            :</label>
                                        <input class="form-control" type="text" name="tourism_tax"  value="{{old('tourism_tax')}}" >
                                    </div>


                                            </div>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">{{ trans('setting.close') }}</button>

                                        <button type="submit"
                                                class="btn btn-success">{{ trans('setting.save') }}</button>
                                    </div>


                            </div>
                        </form>
                    </div>


                </div>

            </div>

        </div>
    </div>



    </div>

    </div>

    <!-- row closed -->
@endsection
