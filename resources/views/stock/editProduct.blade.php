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
                
                <form method="POST" action="{{ url('/editProduct') }}">
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
                            <label for="exampleInputEmail1">Désignation</label>
                            <input type="text" id="exampleInputEmail1" value="{{$data->RefPdt}}" class="form-control @error('ref') is-invalid @enderror"   name="ref">
                            <i class="fa fa-file-text-o"></i>
                            <div class="text-danger"></div>
                            @error('ref')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail2">Catégorie</label>
                            <input type="text" id="exampleInputEmail2" value="{{$data->Cat}}" class="form-control @error('example') is-invalid @enderror"  name="example" list="exampleList">
                            <datalist id="exampleList">
                            @foreach($Cat as $cat)
                            <option value="{{$cat->Cat}}" >  
                         @endforeach
                            </datalist>
                            <i class="fa fa-file-text-o"></i>
                            <div class="text-danger"></div>
                            @error('example')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail3">Remarque</label>
                            <input type="text" id="exampleInputEmail3" value="{{$data->Remarque}}" class="form-control @error('rem') is-invalid @enderror"  name="rem">
                            <i class="fa fa-file-text-o"></i>
                            <div class="text-danger"></div>
                            @error('rem')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail4">Seuil d'alerte</label>
                            <input type="number" min=0 id="exampleInputEmail4" value="{{$data->SM}}" class="form-control @error('sa') is-invalid @enderror"  name="sa">
                            <i class="fa fa-minus-square"></i>
                            <div class="text-danger"></div>
                            @error('sa')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail5">Prix d'achat</label>
                            <input type="number" min=0 id="exampleInputEmail5"  value="{{$data->PA}}" class="form-control @error('pa') is-invalid @enderror"  name="pa">
                            <i class="fa fa-money"></i>
                            <div class="text-danger"></div>
                            @error('pa')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail6">Stock initial</label>
                            <input type="number" min=0 id="exampleInputEmail6" value="{{$data->stock}}" class="form-control @error('si') is-invalid @enderror"  name="si">
                            <i class="fa fa-server"></i>
                            <div class="text-danger"></div>
                            @error('si')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail7">Prix de vente GROS</label>
                            <input type="number" min=0 id="exampleInputEmail7"  value="{{$data->PV}}" class="form-control @error('pv') is-invalid @enderror"  name="pv">
                            <i class="fa fa-money"></i>
                            <div class="text-danger"></div>
                            @error('pv')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword8">Prix de vente DEMI-GROS</label>
                            <input type="number" min=0 id="exampleInputPassword8" value="{{$data->PVG}}" class="form-control @error('pvg') is-invalid @enderror"  name="pvg">
                            <i class="fa fa-money"></i>
                            <div class="text-danger"></div>
                            @error('pvg')
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
                            <button id="form_submit" type="button"  onclick="location.href='{{ url('/listStock') }}'"><i class="ti-arrow-left"></i>  Retour </button>
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