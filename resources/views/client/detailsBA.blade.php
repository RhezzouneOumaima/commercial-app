<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Table Layout - srtdash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/icon/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<div id="preloader">
        <div class="loader"></div>
    </div>
  <!-- page title area end -->
   <div class="main-content-inner">
                <div class="row">
<!-- Striped table start -->
<div class="col-lg-8 mt-7">
                        <div class="card">
                            <div class="card-body">
                            <button type="button" class="btn btn-rounded btn-primary mb-3" onclick="location.href='{{ url('/avoirClt') }}'">Retour </button>
                            <button type="button" class="btn btn-rounded btn-primary mb-3" onclick="location.href='{{ url('/addDetailsBA/'.$data2->id) }}'">nouveau</button>
                                <h4 class="header-title">Bon Avoir Num {{$data2->id}} de Client {{$data2->Clt}}</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead class="text-uppercase bg-info">
                                                <tr>
                                                    <th scope="col">BL</th>
                                                    <th scope="col">Produit</th>
                                                    <th scope="col">Quantité</th>
                                                    <th scope="col">Prix unitaire</th>
                                                    <th scope="col">Montant</th>
                                                    <th scope="col">action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $data)
                                                <tr>
                                                    <th scope="row">{{$data->idBL}}</th>
                                                    <td>{{$data->pdt}}</td>
                                                    <td>{{$data->qte}}</td>
                                                    <td>{{$data->pu}} dh</td>
                                                    <td>{{$data->montant}} dh</td>
                                                    <td><a href={{url("deletedetailsBA/".$data->id)}}><i class="ti-trash"></i></a></td>
                                                </tr>
                                                @endforeach
                                             
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Striped table end -->

</div> </div> 
<script src="{{asset('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- others plugins -->
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>