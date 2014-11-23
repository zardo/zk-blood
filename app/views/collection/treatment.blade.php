@include('header')

<div class="container main-container">
    <div class="row">
        <div class="col-xs-12"><br><br>

            @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
            @endif

            <h1>{{Auth::getUser()->hemocenter->name}} - Módulo Coleta</h1>
            <h3>Inserção de dados da coleta <span class="label label-primary">senha #{{$donation->id}}</span> <span class="label label-info">{{$donation->donator->name}}</span></h3>

            <br><br>

            <div class="row">
                <div class="col-sm-4">
                    {{Form::open()}}
                    
                        <label>Quantidade doada</label>
                        <input type="text" name="height" class="form-control" placeholder="ml" required autofocus=""><br>

                        <br><input type="submit" class="btn btn-lg btn-primary" value="Salvar dados da coleta"/>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')