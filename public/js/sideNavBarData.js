function showNumber(number){
    var today = new Date();
    var birthsDate = new Date(users[number].birthDate);
    var age = today.getFullYear() - birthsDate.getFullYear();
    var m = today.getMonth() - birthsDate.getMonth();

    if (m < 0 || (m === 0 && today.getDate() < birthsDate.getDate())) {
        age--;
    }

    $("#name").text(users[number].name +" "+ users[number].surname);
    $("#firstname").text(users[number].name);
    $("#lastname").text(users[number].surname);
    $("#age").text(age);
    $("#birthDate").text(users[number].birthDate);
    $("#email").text(users[number].email);
    $("#emailVerification").text(users[number].email_verifeid_at);
    $("#identifier").text(users[number].id);
    $("#accoutDate").text(users[number].created_at);
    $("#updateDate").text(users[number].updated_at);
    document.getElementById("avatar").src = "/uploads/avatars/" + users[number].avatar;

    switch(users[number].idUserType) {
        case 1:
            $("#level").text('Administrator');
            $("#level").addClass('red-admin');
            $("#level").removeClass('blue-mod');
            $("#level").removeClass('green-client');
          break;

        case 2:
            $("#level").text('Moderator');
            $("#level").addClass('blue-mod');
            $("#level").removeClass('red-admin');
            $("#level").removeClass('green-client');
          break;

        case 3:
            $("#level").text('Client');
            $("#level").addClass('green-client');
            $("#level").removeClass('blue-mod');
            $("#level").removeClass('red-admin');
            break;

        default:
            $("#level").text('Client');
            break;
      }
}

function showSideProfile(client){
    var today = new Date();
    var birthsDate = new Date(client.birthDate);
    var age = today.getFullYear() - birthsDate.getFullYear();
    var m = today.getMonth() - birthsDate.getMonth();

    if (m < 0 || (m === 0 && today.getDate() < birthsDate.getDate())) {
        age--;
    }

    $("#name").text(client.name +" "+ client.surname);
    $("#firstname").text(client.name);
    $("#lastname").text(client.surname);
    $("#age").text(age);
    $("#birthDate").text(client.birthDate);
    $("#email").text(client.email);
    $("#emailVerification").text(client.email_verifeid_at);
    $("#identifier").text(client.id);
    $("#accoutDate").text(client.created_at);
    $("#updateDate").text(client.updated_at);

    switch(client.auth) {
        case 1:
            $("#level").text('Administrator');
            $("#level").addClass('red-admin');
            $("#level").removeClass('blue-mod');
            $("#level").removeClass('green-client');
          break;

        case 2:
            $("#level").text('Moderator');
            $("#level").addClass('blue-mod');
            $("#level").removeClass('red-admin');
            $("#level").removeClass('green-client');
          break;

        case 3:
            $("#level").text('Client');
            $("#level").addClass('green-client');
            $("#level").removeClass('blue-mod');
            $("#level").removeClass('red-admin');
            break;

        default:
            $("#level").text('Client');
            break;
      }
}

$('#deleteClient').on('submit', function() {
    var id = $('#identifier').text();

    $('#deleteClient').attr('action', id);
});


$('#showUser').on('submit', function() {
    var id = $('#identifier').text();
    console.log(id);
    $('#showUser').attr('action', id);

});

$('#editUser').on('submit', function() {
    var id = $('#identifier').text();

    $('#editUser').attr('action', id + '/edit');
});

$('#editClientShow').on('submit', function() {
    var id = $('#identifierShow').text();

    $('#editClientShow').attr('action', id + '/edit');
});

$('#deleteClientShow').on('submit', function() {
    var id = $('#identifierShow').text();

    $('#deleteClientShow').attr('action', id);
});


$('#clientBirthDate').datepicker({
    uiLibrary: 'bootstrap4',
    minDate: new Date('01-01-1900'),
    maxDate: new Date(),
    setDate: new Date('1900-01-01')
});

$('.gj-icon').attr('style', 'top: 5px; left: 8px');
