@extends('/layouts.app')


@section('title')
    {{ $user->name}}
@endsection

@section('content')
<script>
    var user = {!! json_encode($user->toArray()) !!};
    var users = {!! json_encode($users->toArray()) !!};

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
  		<div class="container-perfil-10" style="margin-bottom: 3vh"><h1 class = "h1-res">{{ $user->name . " " . $user->surname}}</h1></div>
    </div>
    <div class="row">
  		<div class="container-perfil-3" id="controls"><!--left col-->
            <div class="text-center">
            <img src="/uploads/avatars/{{ $user->avatar }}" class="avatar-image" alt="avatar">
            </div></hr><br>
            <ul class="list-group">
                <li class="list-group-item text-muted">Atividade</li>
                <li class="list-group-item text-re_shape-perfil"><span class="pull-left"><strong>Ocorrencias Totais</strong></span> {{ $reportNum }}</li>
                <li class="list-group-item text-re_shape-perfil"><span class="pull-left"><strong>Ocorrencias Aprovadas</strong></span> {{ $reportSucc }}</li>
                <li class="list-group-item text-re_shape-perfil"><span class="pull-left"><strong>Ocorrencias Negadas</strong></span> {{ $reportNeg   }}</li>
            </ul>
        </div><!--/col-3-->
    	<div class="container-perfil-9">
            <ul class="nav nav-tabs tab-res-div" onclick="changeHeight()">
                <li class="active button-change-tab tab-res" id="perfilLI" style="cursor:pointer" onclick="changeHeight()"><a>Perfil</a></li>
                <li class="button-change-tab tab-res" id="reportsLI" style="cursor:pointer" onclick="changeHeight()"><a>Reportes</a></li>
            </ul>
            <div class="tab-content" style="margin-top:2vh">
                <div class="tab-pane active" id="perfil">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="name"><h4>Nome Próprio</h4></label>
                                <label type="text" maxlength="50" class = "form-control {{ $errors->has('name') ? 'is-danger' : ''}}" name="name" placeholder="Nome">{{$user->name}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="surname"><h4>Apelido</h4></label>
                                <label type="text" maxlength="50" class = "form-control {{ $errors->has('surname') ? 'is-danger' : ''}}" name="surname" placeholder="Surname" >{{$user->surname}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="email"><h4>Email</h4></label>
                                <label type="text" maxlength="50" class = "form-control {{ $errors->has('name') ? 'is-danger' : ''}}" name="email" placeholder="email" >{{$user->email}}</label>
                            </div>
                        </div>
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
                <div class="tab-pane" id="reports">
                    <h1 style="display:inline-flex">Reportes do Utilizador</h1>
                    <span class="after-sep"></span>
                    <div class="container-list" id="setDivHeights">
                        <div class="container-report-user-show" id="divHeights">
                            <div>
                                <div id="">
                                    @foreach($reports as $reports)
                                        <div id="{{ $loop->index }}" class="box boxContainer" onclick="location.href='report/{{$reports->id}}'">
                                            <div class="blocksDivs1">
                                                <label for="description" class="label label-client labelInfo1">Tipo: {{$reports->report_type}}</label>
                                                <label for="description" class="label label-client labelInfo2">Cidade: {{$reports->city}}</label>
                                            </div>
                                            <div class="blocksDivs2">
                                                @if($reports->idReportState === 1)
                                                    <label for="description" class="label label-client  badge-pill badge-primary authMaker-processamento labelPermission">Processamento</label>
                                                @elseif($reports->idReportState === 2)
                                                    <label for="description" class="label label-client  badge-pill badge-primary authMaker-clt labelPermission">Aprovado</label>
                                                @elseif($reports->idReportState === 3)
                                                    <label for="description" class="label label-client  badge-pill badge-primary authMaker-admin labelPermission">Negado</label>
                                                @else
                                                    <label for="description" class="label label-client  badge-pill badge-primary authMaker-processamento labelPermission">Em processamento</label>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
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
