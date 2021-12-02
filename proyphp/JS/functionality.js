function loadPage(a){
    $('#contenido').load(a)/*aqui no se como cargar la pagina en el div derecho*/
    alert("Me haz dado un click");

}

function setDB(db) {
    if (db == 1) {
        alert("MySQL establecida como BDD!!!");     
        //contenedor.src = "../assets/images/mysql.png";
    } else if (db == 2) {
        alert("SQL Server establecida como BDD!!!");
    }
    
}

function setDBimages(db) {
    var img1 = document.getElementById("img1");
    var img2 = document.getElementById("img2");

    if (db == 1) {
        img1.style.visibility = "visible";
        img1.setAttribute("width", "150");
        img1.setAttribute("heigth", "50");

        img2.style.visibility = "hidden";
        img2.setAttribute("width", "0");
        img2.setAttribute("heigth", "0")
    } else if (db == 2) {
        img1.style.visibility = "hidden";
        img1.setAttribute("width", "0");
        img1.setAttribute("heigth", "0")
        img2.style.visibility = "visible";
        img2.setAttribute("width", "170");
        img2.setAttribute("heigth", "70");
    }
    
}

function returnPage() {
    window.history.go(-4);
}
