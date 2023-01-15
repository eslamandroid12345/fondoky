@extends('layouts.master')
@section('css')
    @section('title')
        قسم التعليقات
    @endsection

    @section('PageText')
        {{__('hotels.comment_department')}}

    @stop

    @section('page-header')
        <!-- breadcrumb -->
        @section('PageTitle')

            {{__('hotels.comment_department')}}

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
                                                <th>{{__('hotels.user_comment')}}</th>
                                                <th>{{__('hotels.created_at')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($comments as $comment)
                                                <tr>
                                                    <td>{{$comment->user->name}}</td>
                                                    <td>{{$comment->comment}}</td>
                                                    <td>{{$comment->created_at->format('Y-m-d')}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
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
