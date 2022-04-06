<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
html,
body {
  max-width: 100%;
  overflow-x: hidden;
}

.login__body {
  min-height: 100vh;
}

.login__image {
  -o-object-fit: contain;
     object-fit: contain;
}

.login__container,
.login__row {
  min-height: 100vh;
}

.login__card {
  background-color: #f6f6f6;
}
/*# sourceMappingURL=main.css.map */

</style>
 <div class="container login__container my-5">
        <div class="row login__row">
            <div class="col-md-6 d-flex">
                <img class="login__imagek align-self-center" src="https://www.freevector.com/uploads/vector/preview/28488/Businessman_Happy_Accepting_News.jpg"
                    width="100%" alt="" />
            </div>
            <div class="col-md-5 d-flex">
                <div class="align-self-center card login__card shadow-sm w-100">
                <h2 class="text-muted text-center">Modifier le mot de passe</h2>

                    <div class="card-body">
                    @if(session()->has('success'))
                    <span class="alert alert-success">
                        <strong>{{ session()->get('success') }}</strong>
                    </span>
                @endif
                        <form action="/change" method="post">
                        {{ csrf_field() }}

                            <div class="my-5">
             
                            </div>

                            <div class="">
                                <div class="form-group">
                                    <label for="">Mot de passe</label>
                                    <input type="password" name="new_password" class="form-control form-control-lg" />
                                </div>
                                <div class="form-group">
                                    <label for="">Confirmation</label>
                                    <input type="password" name="new_confirm_password" class="form-control form-control-lg" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block my-3" value="Modifier">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>