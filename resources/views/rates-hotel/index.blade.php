@extends('layouts.master')
@section('css')
    @section('title')
        تقيمات الزبائن
    @endsection

    @section('PageText')
        {{__('hotels.rates_department')}}
    @stop

    @section('page-header')
        <!-- breadcrumb -->
        @section('PageTitle')

            {{__('hotels.stars')}}

        @stop
        <!-- breadcrumb -->
    @endsection
    @section('content')
        <!-- row -->
        <div class="row">
            <div class="col-md-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="col-xl-12 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                               data-page-length="50"
                                               style="text-align: center">
                                            <thead>
                                            <tr>
                                               <th>{{__('hotels.user_rate')}}</th>
                                               <th>{{__('hotels.stars')}}</th>
                                            </tr>
                                            </thead>

                                            @foreach($rates as $rate)
                                                <tbody>
                                                <tr>
                                                    <td>{{$rate->user->name}}</td>

                                                    <td>

                                                        @for($i = 1 ; $i <= $rate->rates_number ; $i++)
                                                            <i style="color: #17a2b8" class="fa fa-star"></i>
                                                        @endfor

                                                        @for($j = $rate->rates_number + 1; $j <= 5 ; $j++)

                                                            <i class="fa fa-star"></i>

                                                        @endfor
                                                    </td>



                                                </tr>
                                                </tbody>

                                            @endforeach






                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->
    @endsection
