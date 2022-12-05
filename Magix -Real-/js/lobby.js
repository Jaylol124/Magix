function train()
{
    state3("TRAINING");
}

function vs()
{
    state3("PVP");
}

const state3 = (type) => {

    let formData = new FormData();
    formData.append("partie_type",type);

    fetch("ajax_lobby.php", {   // Il faut créer cette page et son contrôleur appelle 
        method: "POST", 
        body: formData       // l’API (games/state)
    })
        .then(response => response.json())
        .then(data => {
            console.log(data)
            if(data == "marche")
            {
                
            }
            
            console.log(data)
        })
}

window.addEventListener("load", () => {
    setTimeout(state3, 1000); // Appel initial (attendre 1 seconde)
});