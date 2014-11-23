@include('header')

<div class="container main-container login-container">
    <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-lg-offset-3">
            {{Form::open()}}

                    <h2 class="form-signin-heading">Por favor, faça login</h2>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
                    @endif

                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required="" autofocus="">
                    <label for="inputPassword" class="sr-only">Senha</label>
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Senha" required=""><br>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>

            {{Form::close()}}
        </div>
    </div>
</div>

@include('footer')