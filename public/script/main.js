// Verification mot de passe et champs (Creation de compte), SI oui envoie le formulaire en POST au PHP.
function checkRegister() {
    var password = document.getElementById("pwd").value
    var password2 = document.getElementById("Repwd").value
    var password2div = document.getElementById("pwdDivR")
    var passwordCheck = false

    if (password == password2) {
        passwordCheck = true
        
    } else {
        var error = document.createElement("span")
        error.innerText = "Les mots de passes ne correspondent pas"
        password2div.appendChild(error)
    }

    var username = document.getElementById("identifiant")
    var nom = document.getElementById("nom")
    var prenom = document.getElementById("prenom")

    if (username && nom && prenom && password && password2) {
        if (passwordCheck) {
            
                document.forms["creation_compter"].submit(); 
            
        }
    } else {
        alert("Veuillez remplir tout les champs.")
    }
}

function verification(){
    var NomSituation = document.getElementById("pwd").value
    var NomSituation = document.getElementById("pwd").value
    var NomSituation = document.getElementById("pwd").value

}

var itemNum = 1;

function initLien() {
    var buttonForPHP = document.getElementById("itemNum")
    buttonForPHP.style = "display:none;"
    buttonForPHP.type = "text"
    buttonForPHP.name = "itemNum"
    buttonForPHP.value = itemNum

    var table = document.createElement("table")
    table.style = "width: 100%;"
    table.id = "table_" + itemNum

    var tr = document.createElement("tr")

    var tdLeft = document.createElement("td")
    tdLeft.style = "width:2.5%"

    var button = document.createElement("button")
    button.type = "button"
    button.onclick = function() {
        var newNum = itemNum - 1
        var elem = document.getElementById("table_" + parseInt(newNum))
        elem.remove();
        itemNum = itemNum - 1
    }
    button.style = "height:50px; width: 50px; font-size: 40px; color:red;"
    button.innerText = "X"

    var tdRight = document.createElement("td")
    tdRight.class = "right"

    var boxL = document.getElementById("boxLiens")
    var centralDiv = document.createElement("div")
    centralDiv.id = "centralDiv"
    boxL.appendChild(table)
    table.appendChild(tr)
    tr.appendChild(tdRight)
    tr.appendChild(tdLeft)
    tdRight.appendChild(centralDiv)
    tdLeft.appendChild(button)

    var URLDiv = document.createElement("div")
    var detailsDiv = document.createElement("div")
    centralDiv.appendChild(URLDiv)
    centralDiv.appendChild(detailsDiv)

    var spanURL = document.createElement("span")
    spanURL.innerText = "URL : "
    URLDiv.appendChild(spanURL)

    var url = document.createElement("input")
    url.type = "url"
    url.placeholder = "https://"
    url.value = "https://"
    url.name = "url_" + itemNum;
    url.id = "url"
    URLDiv.appendChild(url)

    var spanDetails = document.createElement("span")
    spanDetails.innerHTML = "Détails : "
    detailsDiv.appendChild(spanDetails);

    var details = document.createElement("input")
    details.type = "text"
    details.name = "detail_" + itemNum;
    details.id = "url"
    detailsDiv.appendChild(details);

    itemNum++;
}

function generatePDF(){ 

    var contenu = document.getElementById('PDF'); // ciblage de la zone a imprimé 

    var opt = {
    margin:       1, 
    filename:     'MesCompetences.pdf', // nom du fichier 
    image:        { type: 'PDF', quality: 0.98 }, // choix type de fichier : 
    html2canvas:  { scale: 2 },
    jsPDF:        { unit: 'pt', format: 'A3', orientation: 'l' }, // format 
    pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }, 

    };

    html2pdf() // script js importer 
    .set(opt)
    .from(contenu)
    .save();

}
