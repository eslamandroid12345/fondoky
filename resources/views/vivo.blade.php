<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


    <style>

        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300;500&display=swap');

        body{

            font-family: 'Cairo', sans-serif;

        }

        .form-group{

            text-align: right;
        }

        .fall{

            background: #f2f2f2;
            border-radius: 7px;
        }

        label{

            font-size: 14px;
        }
        table{

            direction: rtl;
        }

        .fall-2{


            /*background: #17a2b8;*/
            height: 430px;
            border-radius: 5px;
            text-align: right;
        }

        .fall-3{


            text-align: right;
        }

        .fall-4{


            text-align: right;
        }

        .fall-4 ul li{

            list-style-type: none;
            line-height: 33px;
        }

        img{

            height: 430px;
        }

        table thead tr th{

            font-size: 14px;


        }


    </style>
</head>
<body>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-12 mt-3">
            <div class="py-5 fall">

                <div class="container">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">الوجهه</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">نوع الغرفه</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">تاريخ الوصول</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">تاريخ المغادره</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">الاشخاص البالغين</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">الاطفال</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>



                    <div class="form-group">
                        <label for="exampleInputEmail1">عدد الغرف</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">المجموع شامل قيمه الضريبه المضافه</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>



                    <button type="submit" class="col-12 btn btn-info">استكمال عمليه الحجز</button>
                </form>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-12 my-3">


            <div class="py-5">

                {{--start table--}}
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">نوع الغرفه</th>
                        <th scope="col">عدد الغرف</th>
                        <th scope="col">سعر الغرفه</th>
                        <th scope="col">تاريخ البدايه</th>
                        <th scope="col">تاريخ النهايه</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>

                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                    </tr>

                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>

                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>


                    </tbody>
                </table>



                {{--end table--}}

                <div class="col-lg-12 col-md-12 col-sm-12 col-12 my-3">

                    <div class="fall-2">

                        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-touch="false" data-interval="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{asset('img/pahat.jpg')}}" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('img/kk.jpg')}}" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('img/hot_1.jpg')}}" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControlsNoTouching" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-target="#carouselExampleControlsNoTouching" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </button>
                        </div>

                    </div>
                </div>


            </div>

        </div>


    </div>
</div>



<div class="container-fluid">
    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 my-3 mt-5">

                            <div class="fall-3">

                                <h5 class="card-title">غرفه دوبل</h5>
                                <p class="card-text">
                                    سِرّة مفردة متينه ومريحة بقياس 200× 110 سم (الغرف المزدوجة بأسِرّة مفردة) أو 200× 170 (الغرف المزدوجه بسرير واحد بحجم كبير)
                                    دورة مياه خاصة بالغرفة مزوده بإضاءة كهربائية
                                    قواعد خاصة مزودة بشموع لإنارة الغرفة في الليل
                                    إطلالة رائعة على الجبال بالطبيعة الصخرية
                                    تتوفر مغسلة إضافية خارجية في بعض الغرف
                                    مياه معدنية مجانية معبأة في جرة فخارية من صنع محلي
                                    ألواح الصابون الصديق للبيئة من إنتاج مشروع محلي نسائي في شمال الأردن
                                    قربة الماء الساخنة للاستخدام خلال فصل الشتاء
                                    مكتب مُلبّس بالجلد من إنتاج ورشة الجلد الموجودة  في الموقع
                                    شبكة حماية من الناموس خاصة بكل سرير

                                </p>


                            </div>
                        </div>


    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 my-3">
            <div class="fall-4 py-5">


                <ul>
                    <li>Coffee</li>
                    <li>Tea</li>
                    <li>Milk</li>
                </ul>

            </div>
        </div>


    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>


</body>
</html>