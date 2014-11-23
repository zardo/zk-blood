@include('header')

<div class="container main-container">
    <div class="row">
        <div class="col-xs-12"><br><br>

            @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
            @endif

            <h1>{{Auth::getUser()->hemocenter->name}} - Módulo Pré-Triagem</h1>
            <h3>Inserção de dados da pré-triagem <span class="label label-primary">senha #{{$donation->id}}</span> <span class="label label-info">{{$donation->donator->name}}</span></h3>

            <br><br>

            <div class="row">
                <div class="col-sm-4">
                    {{Form::open()}}
                    
                        <label>Altura</label>
                        <input type="text" name="height" class="form-control" placeholder="cm" required autofocus=""><br>
                        
                        <label>Peso</label>
                        <input type="text" name="weight" class="form-control" placeholder="kg" required autofocus=""><br>
                        
                        <label>Pulso</label>
                        <input type="text" name="bpm" class="form-control" placeholder="bpm" required autofocus=""><br>

                        <label>Pressão Arterial</label>
                        <input type="text" name="blood_pressure_1" class="form-control" placeholder="mm Hg" required autofocus="">
                        <input type="text" name="blood_pressure_2" class="form-control" placeholder="mm Hg" required autofocus=""><br>

                        <label>Temperatura</label>
                        <input type="text" name="temperature" class="form-control" placeholder="°C" required autofocus=""><br>

                        <br><input type="submit" class="btn btn-lg btn-primary" value="Salvar dados da pré-triagem"/>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')