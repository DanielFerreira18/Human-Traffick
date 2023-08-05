$("#editLI").click(function() {
    $("#editDados").addClass("active");
    $("#editFoto").removeClass("active");
    $("#editEliminar").removeClass("active");
});

$("#editFotoLI").click(function() {
    $("#editDados").removeClass("active");
    $("#editEliminar").removeClass("active");
    $("#editFoto").addClass("active");
});

$("#editEliminarLI").click(function() {
    $("#editDados").removeClass("active");
    $("#editFoto").removeClass("active");
    $("#editEliminar").addClass("active");
});




$("#perfilLI").click(function() {
    $("#reports").removeClass("active");
    $("#perfil").addClass("active");
});

$("#reportsLI").click(function() {
    $("#perfil").removeClass("active");
    $("#reports").addClass("active");
});




$("#perfilAdminLI").click(function() {
    $("#perfilAdmin").addClass("active");
    $("#reportsAdmin").removeClass("active");
    $("#editarAdmin").removeClass("active");
    $("#banAdmin").removeClass("active");
    $("#eraseAdmin").removeClass("active");
});

$("#reportsAdminLI").click(function() {
    $("#perfilAdmin").removeClass("active");
    $("#reportsAdmin").addClass("active");
    $("#editarAdmin").removeClass("active");
    $("#banAdmin").removeClass("active");
    $("#eraseAdmin").removeClass("active");
});

$("#editUserAdminLI").click(function() {
    $("#perfilAdmin").removeClass("active");
    $("#reportsAdmin").removeClass("active");
    $("#editarAdmin").addClass("active");
    $("#banAdmin").removeClass("active");
    $("#eraseAdmin").removeClass("active");
});

$("#banUserAdminLI").click(function() {
    $("#perfilAdmin").removeClass("active");
    $("#reportsAdmin").removeClass("active");
    $("#editarAdmin").removeClass("active");
    $("#banAdmin").addClass("active");
    $("#eraseAdmin").removeClass("active");
});

$("#eraseUserAdminLI").click(function() {
    $("#perfilAdmin").removeClass("active");
    $("#reportsAdmin").removeClass("active");
    $("#editarAdmin").removeClass("active");
    $("#banAdmin").removeClass("active");
    $("#eraseAdmin").addClass("active");
});


function oldValues(){
    document.getElementById("nameEdit").value = user.name;
    document.getElementById("surnameEdit").value = user.surname;
    document.getElementById("emailEdit").value = user.email;
}

