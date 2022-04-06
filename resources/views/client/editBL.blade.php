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
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                
                <form method="POST" action="{{ url('/editBL') }}">
                     @csrf
                    <div class="login-form-head">
                        <h4>Bienvenue!</h4>
                        <p>Changer le produit </p><br>
                @if(session()->has('success'))
                    <span class="alert alert-success">
                        <strong>{{ session()->get('success') }}</strong>
                    </span>
                @endif
                    </div>
                    <input type="hidden" value="{{$data->id}}" name="id">
                    <div class="login-form-body">
 
                    <div class="form-gp">
                            <label for="exampleInputEmail7">Client</label>
                            <br>
                            <select id="exampleInputEmail7" value="{{$data->Clt}}" class="form-control @error('c') is-invalid @enderror"  name="c">
                            <option value="divers">divers</option>
                            @foreach($clt as $clt)
                            <option value="{{$clt->Clt}}">{{$clt->Clt}}</option>
                            @endforeach
                                </select>
                            <div class="text-danger"></div>
                            @error('c')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail2">Représentant</label>
                            <input type="text" id="exampleInputEmail2" value="{{$data->Representant}}" class="form-control @error('rep') is-invalid @enderror"  name="rep">
                            <div class="text-danger"></div>
                            @error('rep')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail3">Mode Réglement</label><br>
                            <select id="exampleInputEmail3" value="{{$data->ModeReg}}" class="form-control @error('mode') is-invalid @enderror"  name="mode">
                            <option value="Espece">Espece</option>
                            <option value="Credit">Credit</option>
</select>
                            <div class="text-danger"></div>
                            @error('mode')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail4">Remarque</label>
                            <input type="text" id="exampleInputEmail4" value="{{$data->Remarque}}" class="form-control @error('rem') is-invalid @enderror"  name="rem">
                            <div class="text-danger"></div>
                            @error('rem')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
               


                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Changer <i class="ti-arrow-right"></i></button>
                        </div>
                        <br>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="button"  onclick="location.href='{{ url('/listBL') }}'"><i class="ti-arrow-left"></i>  Retour </button>
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