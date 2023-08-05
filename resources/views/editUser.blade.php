@extends('/layouts.app')


@section('title', 'Definições')

@section('content')
<script>
var user = {!! json_encode($user->toArray()) !!};

var today = new Date();
var birthsDate = new Date(user.birthDate);
var age = today.getFullYear() - birthsDate.getFullYear();
var m = today.getMonth() - birthsDate.getMonth();

if (m < 0 || (m === 0 && today.getDate() < birthsDate.getDate())) {
    age--;
}

</script>
<div class="container-settings">
<div class="container-list" id="setDivHeights">
<div class="container-border-user" id="divHeights">
    <div class="row">
  		<div class="container-settings-10">
          <h1 style="margin-bottom: 3vh">Definições</h1>
        </div>
    </div>
    <div class="row">
  		<div class="container-settings-3"><!--left col-->
            <ul class="list-group">
                <li class="list-group-item text-muted">Opções</li>
                <li class="list-group-item text-re_shape-settings" id="editLI" style="cursor: pointer;"><span class="pull-left"><strong>Editar dados</strong></span></li>
                <li class="list-group-item text-re_shape-settings" id="editFotoLI" style="cursor: pointer;"><span class="pull-left"><strong>Editar foto de perfil</strong></span></li>
                <li class="list-group-item text-re_shape-settings" id="editEliminarLI" style="cursor: pointer;"><span class="pull-left"><strong>Inativar Conta</strong></span></li>
            </ul>
            <br>
        </div><!--/col-3-->
    	<div class="container-settings-9">
            <ul class="nav nav-tabs">
            </ul>
            <div class="tab-content" style="margin-top:2vh">
                <div class="tab-pane active" id="editDados">
                    <form method="POST" action="{{ route('perfil.update',['id' =>$user->id]) }}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="name"><h4>Nome Próprio</h4></label>
                                <input type="text" maxlength="50" class = "form-control {{ $errors->has('name') ? 'is-danger' : ''}}" name="name" placeholder="Nome" value="{{$user->name}}" id="nameEdit" required>
                            </div>
                        </div>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                         @endif

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="surname"><h4>Apelido</h4></label>
                                <input type="text" maxlength="50" class = "form-control {{ $errors->has('surname') ? 'is-danger' : ''}}" name="surname" placeholder="Surname" value="{{$user->surname}}" id="surnameEdit" required>
                            </div>
                        </div>

                        @if ($errors->has('surname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('surname') }}</strong>
                            </span>
                         @endif

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="email"><h4>Email</h4></label>
                                <input type="text" maxlength="50" class = "form-control {{ $errors->has('email') ? 'is-danger' : ''}}" name="email" placeholder="email" value="{{$user->email}}" id="emailEdit" required>
                            </div>
                        </div>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                         @endif

                        <button type="submit" class="btn btn-primary button-res2">Guardar Alterações</button>
                    </form>
                    <div style="display:flex">
                        <button type="submit" class="btn btn-danger button-res1" onclick="oldValues()">Restaurar Informação</button>
                    </div>
                </div><!--/tab-pane-->
                <div class="tab-pane" id="editFoto">
                    <h1 style="text-align: center; font-size: 1.5rem"> Foto de Perfil </h1>
                    <p style="width: 100%; overflow-wrap:break-word; text-align:center;">Adicione uma foto para personalizar o seu perfil! Basta seleccionar uma foto à sua escolha e adicionar. <b> Não é permitido adicionar fotos obscenas ou impróprias, caso isso aconteça serás suspenso ou mesmo banido!</b> </p>    <div class="text-center" style="justify-content:center">
                        <form enctype="multipart/form-data" action="/settingss" method="POST">
                            <input type="file" name="avatar" class="text-center center-block file-upload" style="width: 20vh">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-primary">Carregar ficheiro</button>
                        </form>
                    </div>
                </div><!--/tab-pane-->
                <div class="tab-pane" id="editEliminar">
                    <h1 style="text-align: center; font-size: 1.5rem"> Suspender Conta </h1>
                    <p style="width: 100%; overflow-wrap:break-word; text-align:center;">Podes suspender a tua conta ao clicar neste botão, as tuas credenciais não serão apagadas e poderás sempre voltar. <b> Caso queiras voltar, terás que contactar os admins com o email registado neste website! </b> </p>  <form class="form-inline my-2 my-lg-0" style="justify-content:center;" method="POST" action="/eliminar/{{ $user->id }}">
                        @csrf
                        <button type="submit" style="width:auto; margin-bottom: 50px;" class="btn btn-danger" onclick="oldValues()">Inativar Conta</button>
                    </form>
                </div><!--/tab-pane-->
            </div><!--/tab-pane-->
        </div><!--/tab-content-->
    </div><!--/col-9-->
</div>
</div>
</div><!--/row-->
<script>
    $('#clientAgeShow').text(age);
    $('#clientAge').value(age);
</script>
@endsection
