<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - srtdash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
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
                <form method="POST" action="{{ url('/addClientForm') }}">
                @csrf
                    <div class="login-form-head">
                        <h4>Ajouter nouveau client</h4>
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
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Raison sociale ou nom</label>
                            <input type="text" id="exampleInputEmail1" class="form-control @error('c') is-invalid @enderror"   name="c">
                            <div class="text-danger"></div>
                            @error('c')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail2">Personne Contactée</label>
                            <input type="text" id="exampleInputEmail2" class="form-control @error('con') is-invalid @enderror"  name="con">
                            <div class="text-danger"></div>
                            @error('con')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail3">Téléphone Fixe</label>
                            <input type="text" id="exampleInputEmail3" class="form-control @error('Fix') is-invalid @enderror"  name="Fix">
                            <div class="text-danger"></div>
                            @error('Fix')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail4">Téléphone mobile</label>
                            <input type="text" id="exampleInputEmail4" class="form-control @error('Portable') is-invalid @enderror"  name="Portable">
                            <div class="text-danger"></div>
                            @error('Portable')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail5">Fax</label>
                            <input type="text" id="exampleInputEmail5" class="form-control @error('f') is-invalid @enderror"  name="f">
                            <div class="text-danger"></div>
                            @error('f')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail6">Remarque</label>
                            <input type="text" id="exampleInputEmail6" class="form-control @error('rem') is-invalid @enderror"  name="rem">
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
                            <select id="exampleInputEmail7" class="form-control @error('t') is-invalid @enderror"  name="t">
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
                            <input type="number" min=0 id="exampleInputPassword8" class="form-control @error('pla') is-invalid @enderror"  name="pla">
                            <div class="text-danger"></div>
                            @error('pla')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword8">Ville</label>
                            <input type="text" id="exampleInputPassword8" class="form-control @error('v') is-invalid @enderror"  name="v">
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
                            <select id="exampleInputEmail9" class="form-control @error('enUne') is-invalid @enderror"  name="enUne">
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
                            <input type="text" id="exampleInputPassword10" class="form-control @error('com') is-invalid @enderror"  name="com">
                            <div class="text-danger"></div>
                            @error('com')
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
                            <button id="form_submit" type="button" onclick="location.href='{{ url('/listClient') }}'"><i class="ti-arrow-left"></i>  Retour </button>
                        </div>
                  
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>