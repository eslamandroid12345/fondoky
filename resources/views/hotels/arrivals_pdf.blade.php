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
                            <img src="https://www.sparksuite.com/images/logo.png" style="width: 100%; max-width: 300px" />
                        </td>

                        <td>
                            Invoice #: 123<br />
                            Created: January 1, 2015<br />
                            Due: February 1, 2015
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
                            Sparksuite, Inc.<br />
                            12345 Sunny Road<br />
                            Sunnyville, CA 12345
                        </td>

                        <td>
                            Acme Corp.<br />
                            John Doe<br />
                            john@example.com
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>Payment Method</td>

            <td>Check #</td>
        </tr>


            <tr class="item">
                <td>رقم الفاتوره</td>

                <td>{{rand(1,20000)}}</td>
            </tr>

            <tr class="item">
                <td>الوجهه</td>

                <td>{{ $invoice->destination}}</td>
            </tr>



             <tr class="item">
                <td>الاطفال</td>

            <td>{{ $invoice->children}}</td>
            </tr>


        <tr class="item">
            <td>البالغين</td>

            <td>{{ $invoice->adults}}</td>
        </tr>


        <tr class="item">
                <td>تاريخ الوصول</td>

            <td>{{ $invoice->check_in}}</td>
            </tr>


        <tr class="item">
                <td>تاريخ المغادره</td>

            <td>{{ $invoice->check_out}}</td>
            </tr>


            <tr class="item">
                <td>عدد الليالي</td>

            <td>{{ $invoice->num_of_nights}}</td>
            </tr>


               <tr class="item">
                <td>عدد الغرف</td>

            <td>{{ $invoice->room_number}}</td>
            </tr>


               <tr class="item">
                <td>ضريبه القيمه المضافه</td>

            <td>{{ $invoice->vat_tax}}</td>
            </tr>




        <tr class="item">
            <td>ضريبه السياحه</td>

            <td>{{ $invoice->tourism_tax}}</td>
        </tr>

     <tr class="item">
            <td>ضريبه البلديه</td>

            <td>{{ $invoice->municipal_tax}}</td>
        </tr>

      <tr class="item">
            <td>الاجمالي بدون قيمه الضرائب</td>

            <td>{{ $invoice->total}}</td>
        </tr>

      <tr class="item">
            <td>اسم النزيل</td>

            <td>{{ $invoice->user->name}}</td>
        </tr>


   <tr class="item">
            <td>نوع الغرفه</td>

            <td>{{ $invoice->room->room_type}}</td>
        </tr>

     <tr class="item">
            <td>اسم الفندق</td>

            <td>{{ $invoice->hotel->name_ar}}</td>
        </tr>


        <tr class="total">
            <td></td>

            <td>Total: {{ $invoice->hotel->currency_ar . $invoice->total_all}}</td>
        </tr>
    </table>
</div>
</body>
</html>
