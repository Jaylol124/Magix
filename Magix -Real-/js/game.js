const state = () => {
    fetch("ajax.php", {   // Il faut créer cette page et son contrôleur appelle 
 method : "POST"        // l’API (games/state)
    })
.then(response => response.json())
.then(data => {
    console.log(data); // contient les cartes/état du jeu.
    console.log(data["hp"]);
    setTimeout(state, 1000); // Attendre 1 seconde avant de relancer l’appel

    

    if(data != null)
    {
        update(data);
    }
    

    
    })
}

window.addEventListener("load", () => {
setTimeout(state, 1000); // Appel initial (attendre 1 seconde)
});


const update = (data) => {
   
    op_hp(data);
    op_mana(data);
    op_card(data);

    my_life(data);
    my_card(data);
    my_mana(data);
    my_power(data);
    time(data)
    
}
////////////////////////////////////////////////////////////////////////////////////////////
function op_hp(data)
{
    let div = document.createElement("p");

    let textNode = document.createTextNode(data["opponent"].hp);
    div.append(textNode);

    let node = document.querySelector(".op-life");
    
    node.removeChild(node.lastElementChild);
    node.append(div);
}
function op_mana(data)
{
    let div = document.createElement("p");

    let textNode = document.createTextNode(data["opponent"].mp);
    div.append(textNode);

    let node = document.querySelector(".op-mana");
    
    node.removeChild(node.lastElementChild);
    node.append(div);
}

function op_card(data)
{
    let div = document.createElement("p");

    let textNode = document.createTextNode(data["opponent"].remainingCardsCount);
    div.append(textNode);

    let node = document.querySelector(".op-cardLeft");
    
    node.removeChild(node.lastElementChild);
    node.append(div);
}
////////////////////////////////////////////////////////////////////////////////////////////
function my_life(data)
{
    let div = document.createElement("p");

    let textNode = document.createTextNode(data["hp"]);
    div.append(textNode);

    let node = document.querySelector(".my-life");
    
    node.removeChild(node.lastElementChild);
    node.append(div);
}

function my_card(data)
{
    let div = document.createElement("p");

    let textNode = document.createTextNode(data["remainingCardsCount"]);
    div.append(textNode);

    let node = document.querySelector(".my-card");
    
    node.removeChild(node.lastElementChild);
    node.append(div);
}

function my_mana(data)
{
    let div = document.createElement("p");

    let textNode = document.createTextNode(data["mp"]);
    div.append(textNode);

    let node = document.querySelector(".my-mana");
    
    node.removeChild(node.lastElementChild);
    node.append(div);
}

////////////////////////////////////////////////////////////////////////////////////////////

function my_power(data) // pour le power
{

    let div = document.createElement("p");
   
    let node = document.querySelector(".my-power");
    if(data["heroPowerAlreadyUsed"] == false)
    {

       

        let textNode = document.createTextNode("yes");
        div.append(textNode);

        node.removeChild(node.lastElementChild);
        node.append(div);
    }
    else
    {

        let textNode = document.createTextNode("no");
        div.append(textNode);
    
        node.removeChild(node.lastElementChild);
        node.append(div);
    }
    
}

function time(data)
{
    let div = document.createElement("p");

    let textNode = document.createTextNode(data["remainingTurnTime"]);
    div.append(textNode);

    let node = document.querySelector(".my-endTurn");
    
    node.removeChild(node.lastElementChild);
    node.append(div);
}