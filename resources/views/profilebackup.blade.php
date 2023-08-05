
<div class="container-list" id="setDivHeight">
    <div class="container-border" id="divHeight">
        <div>
            <h1>{{ $user->name }} Profile</h1>
            <span class="after-sep"></span>
            <div class="boxNoClient">
                <div style="display:inline-flex; width: 40%">
                    <img class="imgs imgs-round" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture">
                </div>
                <div style=" width: 50%;float:right">
                    <div style="width: 100%;">
                        <label for="clientSurname"><strong>Identifier: </strong></label>
                        <label for="" id="identifierShow">{{ $user->id }}</label>
                    </div>
                    <div style="width: 100%;">
                        <label for="clientName"><strong>Name: </strong></label>
                        <label name="name" id="clientName" class="" type="text" placeholder="Name">{{ $user->name }}  </label>
                    </div>
                    <div style="width: 100%;">
                        <label for="clientSurname"><strong>Surname: </strong></label>
                        <label name="surname" id="clientSurname" class="" type="text" placeholder="Surname" >{{ $user->surname }}</label>
                    </div>
                    <div style="width: 100%;">
                        <label for="clientSurname"><strong>Age: </strong></label>
                        <label name="surname" id="clientAgeShow" class="" type="text" placeholder="Surname" >{{ $user->age }}</label>
                    </div>
                    <div style="width: 100%;">
                        <label for="clientSurname"><strong>Date Of Birth: </strong></label>
                        <label name="surname" id="clientSurname" class="" type="text" placeholder="Surname" >{{ $user->birthDate }}</label>
                    </div>
                    <div style="width: 100%;">
                        <label for="clientSurname"><strong>Email: </strong></label>
                        <label name="surname" id="clientSurname" class="" type="text" placeholder="Surname" >{{ $user->email }}</label>
                    </div>
                    <div style="width: 100%;">
                        <label for="clientSurname"><strong>Email Verifeid At: </strong></label>
                        <label name="surname" id="clientSurname" class="" type="text" placeholder="Surname" >{{ $user->email_verifeid_at }}</label>
                    </div>
                    <div style="width: 100%;">
                        <label for="clientSurname"><strong>Client Created At: </strong></label>
                        <label name="surname" id="clientSurname" class="" type="text" placeholder="Surname" >{{ $user->created_at }}</label>
                    </div>
                    <div style="width: 100%;">
                        <label for="clientSurname"><strong>Client Updated At: </strong></label>
                        <label name="surname" id="clientSurname" class="" type="text" placeholder="Surname" >{{ $user->updated_at }}</label>
                    </div>
                </div>
            </div>
            <div style="margin: auto">
                <form style="display:inline-flex; width: 32.95%" id="editClientShow" method="GET" action="">
                    <button type="submit" style="width: 100%" class="btn btn-outline-primary">Edit Client</button>
                </form>
                <button onclick="showSideProfile({{ $user }})" type="button" style="width: 32.95%; margin-bottom: 3px" class="btn btn-outline-info" id="shows-sidebar">Side Bar Profile</button>
                <form style="display:inline-flex; width: 32.95%" id="deleteClientShow" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="width: 100%" class="btn btn-outline-danger">Delete Client</button>
                </form>
            </div>
        </div>
    </div>
</div>