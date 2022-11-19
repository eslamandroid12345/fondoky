<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>A simple, clean, and responsive HTML invoice template</title>

    <style>


        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <img src="{{asset('img/hot2.png')}}" style="width: 100px; height: 100px" />
                        </td>

                        <td>
                            Booking number #: {{$invoice->id}}<br />
                            Created: {{date('Y-m-d')}}<br />
                            Check_in : {{$invoice->check_in}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            {{lang() == 'ar' ? $invoice->hotel->name_ar : $invoice->hotel->name_en}}<br />
                            location : {{ lang() == 'ar' ? $invoice->hotel->location_ar : $invoice->hotel->location_en}}<br />
                        </td>

                        <td>
                            Currency : {{ lang() == 'ar' ? $invoice->hotel->currency_ar :  $invoice->hotel->currency_en}}<br />
                            manger : {{$invoice->hotel->manger}}<br />
                            {{$invoice->hotel->phone}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>{{__('book_hotel.total_all')}}</td>

            <td>{{ lang() == 'ar' ? $invoice->hotel->currency_ar . $invoice->total_all : $invoice->total_all . $invoice->hotel->currency_en }}</td>
        </tr>


            <tr class="item">
                <td>Invoice number</td>

                <td>{{rand(1,20000)}}</td>
            </tr>

            <tr class="item">
                <td>{{__('book_hotel.city_to')}}</td>

                <td>{{ $invoice->destination}}</td>
            </tr>



             <tr class="item">
                <td>{{__('book_hotel.children')}}</td>

            <td>{{ $invoice->children}}</td>
            </tr>


        <tr class="item">
            <td>{{__('book_hotel.adults')}}</td>

            <td>{{ $invoice->adults}}</td>
        </tr>


        <tr class="item">
                <td>{{__('book_hotel.date_arrive')}}</td>

            <td>{{ $invoice->check_in}}</td>
            </tr>


        <tr class="item">
                <td>{{__('book_hotel.date_leave')}}</td>

            <td>{{ $invoice->check_out}}</td>
            </tr>


            <tr class="item">
                <td>{{__('book_hotel.num_of_nights')}}</td>

            <td>{{ $invoice->num_of_nights}}</td>
            </tr>


               <tr class="item">
                <td>{{__('book_hotel.room_number')}}</td>

            <td>{{ $invoice->room_number}}</td>
            </tr>


               <tr class="item">
                <td>{{__('book_hotel.vat_tax')}}</td>

            <td>{{ $invoice->vat_tax}}</td>
            </tr>




        <tr class="item">
            <td>{{__('book_hotel.tourism_tax')}}</td>

            <td>{{ $invoice->tourism_tax}}</td>
        </tr>

     <tr class="item">
            <td>{{__('book_hotel.municipal_tax')}}</td>

            <td>{{ $invoice->municipal_tax}}</td>
        </tr>

      <tr class="item">
            <td>{{__('book_hotel.total')}}</td>

            <td>{{ $invoice->total}}</td>
        </tr>

      <tr class="item">
            <td>{{__('book_hotel.user')}}</td>

            <td>{{ $invoice->user->name}}</td>
        </tr>


   <tr class="item">
            <td>{{__('book_hotel.room_type')}}</td>

            <td>{{ $invoice->room->room_type}}</td>
        </tr>


    </table>
</div>
</body>
</html>
