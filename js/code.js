function validadaRes() {
    alert("Reserva efectuada correctamente");
    return window.location.href = "./menu.php";
}

function errorRes() {
    alert("Error en la reserva");
}

function coincidencia() {
    alert("No se puede reservar, ya hay una reserva hecha con los datos introducidos, cambie la fecha, la hora o la mesa");
}