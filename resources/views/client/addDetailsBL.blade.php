<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - srtdash</title>
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
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST" action="{{ url('/addDetailsBLForm') }}">
                @csrf
                    <div class="login-form-head">
                        <h4>Ajouter nouveau produit pour BL num {{$id}}</h4>
                        @if(session()->has('error'))
                    <span class="alert alert-danger">
                        <strong>{{ session()->get('error') }}</strong>
                    </span>
                @endif
                @if(session()->has('success'))
                    <span class="alert alert-success">
                        <strong>{{ session()->get('success') }}</strong>
                    </span>
                @endif
                    </div>
                    <input type="hidden" value="{{$id}}" name="id">
                    <div class="login-form-body">
                    <div class="form-gp">
                            <label for="exampleInputEmail7">Produit</label>
                            <br>
                            <select id="exampleInputEmail7" class="form-control @error('ref') is-invalid @enderror"  name="ref">
                            @foreach($data as $data)
                            <option value="{{$data->RefPdt}}">{{$data->RefPdt}} ({{$data->PV}}dh-stock:{{$data->stock}})</option>
                            @endforeach
                                </select>
                            <div class="text-danger"></div>
                            @error('ref')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail2">Quantité</label>
                            <input type="number" min=1 id="exampleInputEmail2" class="form-control @error('qte') is-invalid @enderror"  name="qte">
                            <div class="text-danger"></div>
                            @error('qte')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
               
                        <div class="form-gp">
                            <label for="exampleInputEmail4">Prix Unitaire</label>
                            <input type="number" id="exampleInputEmail4" class="form-control @error('prix') is-invalid @enderror"  name="prix">
                            <div class="text-danger"></div>
                            @error('prix')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail5">Remise</label>
                            <input type="number" min=0 max=100 id="exampleInputEmail5" class="form-control @error('rem') is-invalid @enderror"  name="rem">
                            <div class="text-danger"></div>
                            @error('rem')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
               
               
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Ajouter <i class="ti-arrow-right"></i></button>
                        </div>
                        <br>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="button" onclick="location.href='{{ url('/detailsBL/'.$id) }}'"><i class="ti-arrow-left"></i>  Retour </button>
                        </div>
                  
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
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
</body>

</html>