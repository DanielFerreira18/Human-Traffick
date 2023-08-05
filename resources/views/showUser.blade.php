@extends('/layouts.app')


@section('title')
    {{ $user->name}}
@endsection

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
<div class="container bootstrap snippet">
<div class="container-list" id="setDivHeights">
<div class="container-border-user" id="divHeights">
    <div class="row">
  		<div class="container-perfil-10" style="margin-bottom:3vh"><h1 class="h1-res">{{ $user->name . " " . $user->surname}}</h1></div>
    </div>
    <div class="row">
  		<div class="container-perfil-3" id="controls" style="margin-bottom: 1rem"><!--left col-->
            <div class="text-center">
                <img src="/uploads/avatars/{{ $user->avatar }}" class="avatar-image" alt="avatar">
                <h6></h6>
            </div></hr><br>
            <ul class="list-group">
                <li class="list-group-item text-muted">Atividade</li>
                <li class="list-group-item text-re_shape-perfil"><span class="pull-left"><strong>Ocorrencias Totais</strong></span> {{ $reportNum }}</li>
                <li class="list-group-item text-re_shape-perfil"><span class="pull-left"><strong>Ocorrencias Aprovadas</strong></span> {{ $reportSucc }}</li>
                <li class="list-group-item text-re_shape-perfil"><span class="pull-left"><strong>Ocorrencias Negadas</strong></span> {{ $reportNeg   }}</li>
            </ul>
            <ul class="list-group" style="margin-top: 2vh" onclick="changeHeight()">
                <li class="list-group-item text-muted" onclick="changeHeight()">Opções</li>
                <li class="list-group-item text-re_shape-perfil" id="editUserAdminLI" style="cursor:pointer" onclick="changeHeight()"><span class="pull-left"><strong>Editar Conta</strong></span></li>
                <li class="list-group-item text-re_shape-perfil" id="banUserAdminLI" style="cursor:pointer" onclick="changeHeight()"><span class="pull-left"><strong>Suspender Conta</strong></span></li>
                <li class="list-group-item text-re_shape-perfil" id="eraseUserAdminLI" style="cursor:pointer" onclick="changeHeight()"><span class="pull-left"><strong>Eliminar Conta</strong></span></li>
            </ul>
        </div><!--/col-3-->
    	<div class="container-perfil-9">
            <ul class="nav nav-tabs tab-res-div" onclick="changeHeight()">
            <li class="active button-change-tab tab-res" id="perfilAdminLI" style="cursor:pointer" onclick="changeHeight()"><a>Perfil</a></li>
                <li class="button-change-tab tab-res" id="reportsAdminLI" style="cursor:pointer" onclick="changeHeight()"><a>Reportes</a></li>
            </ul>
            <div class="tab-content" style="margin-top:2vh">
                <div class="tab-pane active" id="perfilAdmin">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="name"><h4>Nome Próprio</h4></label>
                                <label type="text" maxlength="50" class = "form-control {{ $errors->has('name') ? 'is-danger' : ''}}" name="name" placeholder="Nome">{{$user->name}}</label>
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
                                <label type="text" maxlength="50" class = "form-control {{ $errors->has('surname') ? 'is-danger' : ''}}" name="surname" placeholder="Surname" >{{$user->surname}}</label>
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
                                <label type="text" maxlength="50" class = "form-control {{ $errors->has('name') ? 'is-danger' : ''}}" name="email" placeholder="email" >{{$user->email}}</label>
                            </div>
                        </div>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                     @endif
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="password"><h4>Idade</h4></label>
                                <label type="text" class="form-control" name="password" id="clientAgeShow" placeholder="age" title="enter your password.">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="password"><h4>Data de Nascimento</h4></label>
                                <label type="text" class="form-control" name="password" id="password" placeholder="birthday" title="enter your password.">{{ $user->birthDate }}</label>
                            </div>
                        </div>
                </div><!--/tab-pane-->
                <div class="tab-pane" id="reportsAdmin">
                    <h1 style="display:inline-flex">Reportes do Utilizador</h1>
                    <div class="right-search">
                </div>
                    <span class="after-sep"></span>
                    <div class="container-list" id="setDivHeights">
                        <div class="container-report-user-show" id="divHeights">
                            <div>
                                <div id="">
                                    @foreach($reports as $reports)
                                        <div id="{{ $loop->index }}" class="box" onclick="location.href='report/{{$reports->id}}'">
                                            <label for="description" class="label label-client" style="display:inline-flex">Tipo: {{$reports->report_type}}</label>
                                            <label for="description" class="label label-client" style="display:inline-flex; margin-left:4vh">Cidade: {{$reports->city}}</label>
                                            @if($reports->idReportState === 1)
                                                <label for="description" class="label label-client  badge-pill badge-primary right-corner authMaker-processamento" style="display:inline-flex;">Em Processo</label>
                                            @elseif($reports->idReportState === 2)
                                                <label for="description" class="label label-client  badge-pill b<adge-primary right-corner authMaker-clt" style="display:inline-flex">Aprovado</label>
                                            @elseif($reports->idReportState === 3)
                                                <label for="description" class="label label-client  badge-pill badge-primary right-corner authMaker-admin" style="display:inline-flex">Negado</label>
                                            @else
                                                <label for="description" class="label label-client  badge-pill badge-primary right-corner authMaker-processamento" style="display:inline-flex">Em Processo</label>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/tab-pane-->
                <div class="tab-pane" id="editarAdmin">
                @if($user->idUserType <= 4)
                    <form method="POST" action="/updateAdmin/{{ $user->id }}">
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
                        @if($user->idUserType <= 3)
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="email"><h4>Permições de Utilizador</h4></label>
                                    <select class="form-control {{ $errors->has('idUserType') ? 'is-invalid' : ''}}" name="idUserType" required>
                                        @if($user->idUserType === 1)
                                            <option value="{{$user->idUserType}}">Administrador</option>
                                            <option value="2">Moderador</option>
                                            <option value="3">Utilizador</option>
                                        @elseif($user->idUserType === 2)
                                            <option value="{{$user->idUserType}}">Moderador</option>
                                            <option value="1">Administrador</option>
                                            <option value="3">Utilizador</option>
                                        @elseif($user->idUserType === 3)
                                            <option value="{{$user->idUserType}}">Utilizador</option>
                                            <option value="1">Administrador</option>
                                            <option value="2">Moderador</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('idUserType'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('idUserType') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary button-res2">Guardar Alterações</button>
                    </form>
                    <div style="display:flex">
                        <button type="submit" class="btn btn-danger button-res1" onclick="oldValues()">Restaurar Informação</button>
                    </div>
                @elseif($user->idUserType == 5)
                    <form method="POST" action="/updateAdmin/{{ $user->id }}">
                        @csrf
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="name"><h4>Nome Próprio</h4></label>
                                <input type="text" maxlength="50" class = "form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" name="name" placeholder="Nome" value="{{$user->name}}" id="nameEdit" required disabled>
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
                                <input type="text" maxlength="50" class = "form-control {{ $errors->has('surname') ? 'is-invalid' : ''}}" name="surname" placeholder="Surname" value="{{$user->surname}}" id="surnameEdit" required disabled>
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
                                <input type="text" maxlength="50" class = "form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" name="email" placeholder="email" value="{{$user->email}}" id="emailEdit" required disabled>
                            </div>
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                         @endif
                    </form>
                @endif
                </div>
                <!--/tab-pane-->
                <div class="tab-pane" id="banAdmin">
                    <p style="width: 100%; overflow-wrap:break-word;"> Podes suspender a conta do utilizador ao clicar neste botão, as credenciais não serão eliminadas e poderás sempre terminar a suspensão. Para terminar a suspensão basta clicar no botão terminar suspensão. </p>
                        <form class="form-inline my-2 my-lg-0" style="justify-content:center;" method="POST" action="/adminBan/{{ $user->id }}">
                            @csrf
                            @if($user->idUserType <=3 )
                                <button type="submit" style="width:auto; margin-bottom: 50px; " class="btn btn-danger">Suspender Conta</button>
                            @elseif($user->idUserType === 4)
                                <button type="submit" style="width:auto; margin-bottom: 50px; " class="btn btn-danger">Terminar Suspensão</button>
                            @elseif($user->idUserType === 5)
                                <button type="submit" style="width:auto; margin-bottom: 50px; cursor: default" class="btn btn-danger">Esta conta foi eliminada</button>
                            @endif
                        </form>
                </div><!--/tab-pane-->
                <div class="tab-pane" id="eraseAdmin">
                    <p style="width: 100%; overflow-wrap:break-word;"> Podes eliminar a conta do utilizador ao clicar neste botão, as credenciais não serão apagadas e poderás sempre reativar a conta. Para reativar a conta basta clicar no botão reativar conta. </p>
                        <form id="adminErase" class="form-inline my-2 my-lg-0" style="justify-content:center;" method="POST" action="/adminErase/{{ $user->id }}">
                            @csrf
                            @if($user->idUserType <= 4)
                                <button type="submit" style="width:auto; margin-bottom: 50px; " class="btn btn-danger">Eliminar Conta</button>
                            @elseif($user->idUserType === 5)
                                <button type="submit" style="width:auto; margin-bottom: 50px; " class="btn btn-danger">Reativar Conta</button>
                            @endif
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
