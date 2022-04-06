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
                
                <form method="POST" action="{{ url('/editClient') }}">
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
                            <label for="exampleInputEmail1">Raison sociale ou nom</label>
                            <input type="text" id="exampleInputEmail1" value="{{$data->Clt}}" class="form-control @error('c') is-invalid @enderror"   name="c">
                            <div class="text-danger"></div>
                            @error('c')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail2">Personne Contactée</label>
                            <input type="text" id="exampleInputEmail2" value="{{$data->Contact}}" class="form-control @error('con') is-invalid @enderror"  name="con">
                            <div class="text-danger"></div>
                            @error('con')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail3">Téléphone Fixe</label>
                            <input type="text" id="exampleInputEmail3" value="{{$data->TelFix}}" class="form-control @error('Fix') is-invalid @enderror"  name="Fix">
                            <div class="text-danger"></div>
                            @error('Fix')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail4">Téléphone mobile</label>
                            <input type="text" id="exampleInputEmail4" value="{{$data->TelPortable}}" class="form-control @error('Portable') is-invalid @enderror"  name="Portable">
                            <div class="text-danger"></div>
                            @error('Portable')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail5">Fax</label>
                            <input type="text" id="exampleInputEmail5" value="{{$data->Fax}}" class="form-control @error('f') is-invalid @enderror"  name="f">
                            <div class="text-danger"></div>
                            @error('f')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail6">Remarque</label>
                            <input type="text" id="exampleInputEmail6" value="{{$data->Remarque}}" class="form-control @error('rem') is-invalid @enderror"  name="rem">
                            <div class="text-danger"></div>
                            @error('rem')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail7">Type</label>
                            <br>
                            <select id="exampleInputEmail7" value="{{$data->Type}}" class="form-control @error('t') is-invalid @enderror"  name="t">
                            <option value="Gros">Gros</option>
                                <option value="Demi-Gros">Demi-Gros</option>
                                </select>
                            <div class="text-danger"></div>
                            @error('t')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword8">Plafond</label>
                            <input type="number" min=0 id="exampleInputPassword8" value="{{$data->Plafond}}" class="form-control @error('pla') is-invalid @enderror"  name="pla">
                            <div class="text-danger"></div>
                            @error('pla')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword8">Ville</label>
                            <input type="text" id="exampleInputPassword8" value="{{$data->Ville}}" class="form-control @error('v') is-invalid @enderror"  name="v">
                            <div class="text-danger"></div>
                            @error('v')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail9">EnUneVente</label>
                            <br>
                            <select id="exampleInputEmail9" value="{{$data->EnUneVente}}" class="form-control @error('enUne') is-invalid @enderror"  name="enUne">
                            <option value="oui">oui</option>
                                <option value="non">non</option>
                                </select>
                            <div class="text-danger"></div>
                            @error('enUne')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>

                        <div class="form-gp">
                            <label for="exampleInputPassword10">Commercial</label>
                            <input type="text" id="exampleInputPassword10" value="{{$data->Commercial}}" class="form-control @error('com') is-invalid @enderror"  name="com">
                            <div class="text-danger"></div>
                            @error('com')
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
                            <button id="form_submit" type="button"  onclick="location.href='{{ url('/listClient') }}'"><i class="ti-arrow-left"></i>  Retour </button>
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