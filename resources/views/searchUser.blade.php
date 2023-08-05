@extends('/layouts.app')


@section('title', 'User List')

@section('content')
<script>

    var users = {!! json_encode($details->toArray()) !!};

</script>
<div class="tab-pane" id="settings">
    <div class="container-list" id="setDivHeights">
        <div class="container-border-user" id="divHeights">
            <div>
                <div class="containerHeader">
                    <h1 class="h1-userShow">Gestão de Utilizadores</h1>
                    <div class="searchss">
                        <form class="form-inline my-2 my-lg-0 search-form-control" method="POST" action="/searchUser">
                            @csrf
                            <input class="form-controler border-radius searchbarInput" type="text" name="searchBarUser" placeholder="Search">
                            <button class="btnprocurar btn-outline my-2 my-sm-0 border-radius-search searchbarButton" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <span class="after-sep"></span>
                @if(isset($details) == false or count($details) == 0)
                    <div class="boxNoClient">
                        <label for="description" class="label label-client" style="cursor:default; text-align:center;">Utilizador não encontrado, por favor digite outra vez</label>
                    </div>
                @else
                    <div id="shows-sidebar">
                        @foreach($details as $users)
                            <div id="{{ $loop->index }}" class="box boxContainer" onclick="showNumber({{$loop->index }})">
                                <div class="blocksDivs1">
                                    <label for="description" class="label label-client labelInfo1">Nome: {{$users->name . " " . $users->surname}}</label>
                                    <label for="description" class="label label-client labelInfo2">Email: {{$users->email}}</label>
                                </div>
                                <div class="blocksDivs2">
                                    @if($users->idUserType === 1)
                                        <label for="description" class="label label-client  badge-pill badge-primary authMaker-admin labelPermission" style="color: #FF0000; border: solid 2px #FF0000">Administrator</label>
                                    @elseif($users->idUserType === 2)
                                        <label for="description" class="label label-client  badge-pill badge-primary authMaker-mod labelPermission" style="display:inline-flex; color: #0404B4; border: solid 2px #0404B4">Moderator</label>
                                    @elseif($users->idUserType === 3)
                                        <label for="description" class="label label-client  badge-pill badge-primary authMaker-clt labelPermission" style="display:inline-flex; color: #088A08; border: solid 2px #088A08">Utilizador</label>
                                    @elseif($users->idUserType === 4)
                                        <label for="description" class="label label-client  badge-pill badge-primary authMaker-processamento labelPermission" style="display:inline-flex; color: #DF7401; border: solid 2px #DF7401">Utilizador Inativo</label>
                                    @elseif($users->idUserType === 5)
                                        <label for="description" class="label label-client  badge-pill badge-primary authMaker-eliminado labelPermission" style="display:inline-flex; color: #6E6E6E; border: solid 2px #6E6E6E">Utilizador Eliminado</label>
                                    @else
                                        <label for="description" class="label label-client  badge-pill badge-primary authMaker-clt labelPermission" style="display:inline-flex; color: #088A08; border: solid 2px #088A08">Utilizador</label>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

