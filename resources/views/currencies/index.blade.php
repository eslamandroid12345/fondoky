@extends('layouts_admin.master')
@section('css')

    @section('title')
        {{ trans('currency.currencies') }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{ trans('currency.currencies') }}

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

                        <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                            {{ trans('currency.currency_add') }}
                        </button>

                    <br><br>


                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>{{trans('currency.logo')}}</th>
                                <th>{{trans('currency.currency_ar')}}</th>
                                <th>{{trans('currency.currency_en')}}</th>
                                <th>{{trans('data.action')}}</th>


                            </tr>
                            </thead>
                            <tbody>



                            @foreach ($currencies as $currency)
                                <tr>

                                    <td>
                                        <img style="width: 20px;height: 20px;border-radius: 4px" src="{{URL::to('currencies/'.$currency->logo)}}">
                                    </td>
                                    <td>{{$currency->currency_ar}}</td>
                                    <td>{{$currency->currency_en}}</td>


                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $currency->id }}" title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $currency->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                    </td>
                                </tr>



                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $currency->id }}" tabindex="-1" role="dialog"
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
                                                <form action="{{route('currencies.update')}}" enctype="multipart/form-data" method="post" autocomplete="off">

                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">

                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $currency->id }}">
                                                        {{--logo--}}
                                                        <div class="col-lg-12 col-md-12 col-12">
                                                            <label for="Name"
                                                                   class="mr-sm-2">{{trans('setting.logo')}}
                                                                :</label>
                                                            <input class="form-control" type="file" name="logo"  />
                                                            <img style="width: 20px;height: 20px;border-radius: 4px" src="{{URL::to('currencies/'.$currency->logo)}}">

                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-12">
                                                            <label for="Name"
                                                                   class="mr-sm-2 mt-4">{{trans('setting.currency_ar')}}
                                                                :</label>
                                                            <input class="form-control" type="text" name="currency_ar" value="{{$currency->currency_ar}}" />
                                                        </div>


                                                        <div class="col-lg-12 col-md-12 col-12">
                                                            <label for="Name"
                                                                   class="mr-sm-2 mt-4">{{trans('setting.currency_en')}}
                                                                :</label>
                                                            <input class="form-control" type="text" name="currency_en" value="{{$currency->currency_en}}" />
                                                        </div>


                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('setting.close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-success">{{ trans('setting.edit') }}</button>
                                                    </div>
                                                    </div>
                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $currency->id }}" tabindex="-1" role="dialog"
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
                                                <form action="{{route('currencies.delete')}}"
                                                      method="post">

                                                    @csrf
                                                    @method('DELETE')

                                                    {{ trans('setting.confirm_delete') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $currency->id }}">
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

                        <form class="row mb-30" action="{{route('currencies.store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
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

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="Name"
                                               class="mr-sm-2 mt-3">{{trans('currency.currency_ar')}}
                                            :</label>
                                        <input class="form-control" type="text" name="currency_ar" value="{{old('currency_ar')}}">
                                    </div>


                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="Name"
                                               class="mr-sm-2 mt-3">{{trans('currency.currency_en')}}
                                            :</label>
                                        <input class="form-control" type="text" name="currency_en"  value="{{old('currency_en')}}">
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
