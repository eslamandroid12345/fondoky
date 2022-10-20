@extends('layouts.master')
@section('css')
    @section('title')

        اضافه تواريخ للغرفه

    @stop
@endsection

@section('PageText')
    {{__('hotels.calendars_new_create')}}
@stop
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{__('hotels.calendars_departments')}}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if (session()->has('update'))
                        <div class="alert alert-danger">
                            {{session()->get('update')}}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                        <form class="form" action="{{route('calendars.update',$event->id)}}" method="POST" autocomplete="off">

                            @csrf
                            @method('PUT')


                            <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{__('hotels.calendars_new_create')}}</h6><br>


                        <div class="row">



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('calendars.room_number_add')}}</label>
                                    <input  type="number"  class="form-control" name="room_number" value="{{$event->room_number}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('calendars.room_price_add')}}</label>
                                    <input  type="number"  class="form-control" name="room_price" value="{{$event->room_price}}">
                                </div>
                            </div>





                        </div>



                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{__('calendars.save')}}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
