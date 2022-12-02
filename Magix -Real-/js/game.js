const state = () => {
    fetch("ajax.php", {   // Il faut créer cette page et son contrôleur appelle 
        method: "POST"        // l’API (games/state)
    })
        .then(response => response.json())
        .then(data => {
            console.log(data); // contient les cartes/état du jeu.
            setTimeout(state, 1000); // Attendre 1 seconde avant de relancer l’appel
            
            if (data != null) {
                update(data);
            }
        })
}

const state2 = (monchoix,id_my,id_op) => {
    let formData = new FormData();

    formData.append("choix",monchoix);
    formData.append("maCarte",id_my);
    formData.append("opCarte",id_op);

    

    fetch("ajax_attaquer.php", {   // Il faut créer cette page et son contrôleur appelle 
        method: "POST",        // l’API (games/state)
        body: formData
    })
        .then(response => response.json())
        .then(data => {

            erreur(data);
            
            
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
    //my_power(data);
    time(data);
    my_turn(data);
    /////////////////////// rafraichir les etats de la partie donc les cartes du jeu
    remove(".op-playCard");
    remove(".my-playCard");
    remove(".my-hand");
    remove(".opponent-card");
    op_name(data);
    op_hand(data);
    re_my_hand(data);
    re_board(data);

    

}
////////////////////////////////////////////////////////////////////////////////////////////
function op_hp(data) {
    let div = document.createElement("p");

    let textNode = document.createTextNode(data['opponent'].hp);
    div.append(textNode);

    let node = document.querySelector(".op-life");

    node.removeChild(node.lastElementChild);
    node.append(div);
}
function op_mana(data) {
    let div = document.createElement("p");

    let textNode = document.createTextNode(data["opponent"].mp);
    div.append(textNode);

    let node = document.querySelector(".op-mana");

    node.removeChild(node.lastElementChild);
    node.append(div);
}

function op_name(data) {
    let div = document.createElement("p");

    let textNode = document.createTextNode(data["opponent"].username);
    div.append(textNode);

    let node = document.querySelector(".op-banner");

    node.removeChild(node.lastElementChild);
    node.append(div);
}

function op_card(data) {
    let div = document.createElement("p");

    let textNode = document.createTextNode(data["opponent"].remainingCardsCount);
    div.append(textNode);

    let node = document.querySelector(".op-cardLeft");

    node.removeChild(node.lastElementChild);
    node.append(div);
}
////////////////////////////////////////////////////////////////////////////////////////////
function my_life(data) {
    let div = document.createElement("p");

    let textNode = document.createTextNode(data["hp"]);
    div.append(textNode);

    let node = document.querySelector(".my-life");

    node.removeChild(node.lastElementChild);
    node.append(div);
}

function my_card(data) {
    let div = document.createElement("p");

    let textNode = document.createTextNode(data["remainingCardsCount"]);
    div.append(textNode);

    let node = document.querySelector(".my-card");

    node.removeChild(node.lastElementChild);
    node.append(div);
}

function my_mana(data) {
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
    if (data["heroPowerAlreadyUsed"] == false) {



        let textNode = document.createTextNode("yes");
        div.append(textNode);

        node.removeChild(node.lastElementChild);
        node.append(div);
    }
    else {

        let textNode = document.createTextNode("no");
        div.append(textNode);

        node.removeChild(node.lastElementChild);
        node.append(div);
    }

}

function time(data) {
    let div = document.createElement("p");

    let textNode = document.createTextNode(data["remainingTurnTime"]);
    div.append(textNode);

    let node = document.querySelector(".time");

    node.removeChild(node.lastElementChild);
    node.append(div);
    //////////////////////////////////////////////// pour le clock

    let tmp = data["remainingTurnTime"] * 7.2;



    document.getElementById("aiguille").style.transform = "rotate(" + tmp + "deg)";
}

////////////////////////////////////////////////////////////////////////////////////////////
function op_hand(data) {
    

    for (i = 0; i < data["opponent"].handSize; i++) {
        
        let div = document.createElement("div");
        let img = document.createElement('img');

        
        img.src  = '../Magix -Real-/images/carteFace.png';

        div.className = "op-card";
        img.className = "back";
        
        div.append(img)

        let node = document.querySelector(".opponent-card");

        node.append(div);

        

    }
}

function my_turn(data) // pour le power
{

    let div = document.createElement("p");

    let node = document.querySelector(".turn");
    if (data["yourTurn"] == true) {



        let textNode = document.createTextNode("My Turn");
        div.append(textNode);

        node.removeChild(node.lastElementChild);
        node.append(div);
    }
    else {

        let textNode = document.createTextNode("OP Turn");
        div.append(textNode);

        node.removeChild(node.lastElementChild);
        node.append(div);
    }

}

function erreur(data) // affiche les different code d'erreur
{

    let div = document.createElement("p");

    let textNode = document.createTextNode(data);
    div.append(textNode);

    let node = document.querySelector(".erreur");

    node.removeChild(node.lastElementChild);
    node.append(div);
}


//////////////////////////////////////////////////////////////////////////////////////////// afficher les cartes du jeu
let spriteList = [];

function re_my_hand(data) // pour actualiser les cartes de ma main
{


    for (i = 0; i < data["hand"].length; i++) {

        spriteList.push(new cartes(data["hand"], i, ".my-hand",data["hand"][i].uid));
        console.log(data["hand"][i].mechanics[0]);
        

    }

}

function re_board(data) // pour actualiser les cartes sur le terrains
{


    for (i = 0; i < data["board"].length; i++) {

        spriteList.push(new cartes(data["board"], i, ".my-playCard", data["board"][i].uid));

        

    }

    for (i = 0; i < data["opponent"].board.length; i++) {

        spriteList.push(new cartes(data["opponent"]["board"], i, ".op-playCard",data["opponent"]["board"][i].uid));

    }

    // data["board"].forEach(element => {
    //     spriteList.push(new cartes(element[]))
    // });

}



function remove(direction) // pour actualiser les cartes
{
    let node = document.querySelector(direction);
    while (node.firstChild) {
        node.removeChild(node.firstChild);
    }
}

let ma_carte;
let opp_carte;

class cartes {
    constructor(data, i, direction,uid) {

        this.div = document.createElement("div");


        ///////////////////////////////////////////////////////
        //this.div_princ = document.createElement("div");
        this.enplacement = direction;
        this.index = i;
        this.div_princ = document.querySelector(direction);
        this.div_secon = document.createElement("div");
        this.div_placer = document.createElement("div");
        //this.div_princ.className ="my-hand";
        this.div_secon.className = "card";
        this.div_placer.className = "top_info";


        
        ///////////////////////////////////////////////////////
        this.forAtk = document.querySelector(".card_atk_big");
        this.forCost = document.querySelector(".card_cost_big");
        this.forHp = document.querySelector(".card_hp_big");

        this.forName = document.querySelector(".card_type_big");
        
        
        ///////////////////////////////////////////////////////
        this.node = document.createElement("div");
        this.node2 = document.createElement("div");
        this.node3 = document.createElement("div");
        this.node4 = document.createElement("div");
        this.node5 = document.createElement("div");
        this.node6 = document.createElement("div");

        this.node.className = "card_atk";
        this.node2.className = "card_cost";
        this.node3.className = "card_hp";
        this.node4.className = "card_type";
        this.node5.className = "card_desc";
        this.node6.className = "card_img";

        ///////////////////////////////////////////////////////


        this.textNode1 = document.createTextNode(data[i].atk);
        this.textNode2 = document.createTextNode(data[i].cost);
        this.textNode3 = document.createTextNode(data[i].hp);
        this.textNode4 = document.createTextNode(data[i].mechanics);
        

        
        ///////////////////////////////////////////////////////
        this.leover1 = document.createTextNode(data[i].atk);
        this.leover2 = document.createTextNode(data[i].cost);
        this.leover3 = document.createTextNode(data[i].hp);

        this.leover4 = document.createTextNode(data[i].mechanics);
        
        ///////////////////////////////////////////////////////

        this.node.append(this.textNode1);
        this.node2.append(this.textNode2);
        this.node3.append(this.textNode3);
        this.node4.append(this.textNode4);
        

        

        this.div_placer.append(this.node);
        this.div_placer.append(this.node2);
        this.div_placer.append(this.node3);


        this.div_secon.append(this.div_placer);

        this.div_secon.append(this.node6);
        this.div_secon.append(this.node4);
        


        this.div_princ.append(this.div_secon);
        this.uid = uid;

        
        if(data[i].mechanics.includes("Taunt"))
        {
            
            this.node4.style.color = "red";
            
        }
        else if (data[i].mechanics.includes("Stealth"))
        {
            this.node4.style.color = "green";
            
        }
        
        
        
        this.div_secon.onclick = () => {
            
            if(this.enplacement == ".my-playCard" )
            {
                
                ma_carte = this.uid
                console.log(ma_carte);
                
                
            }

            if (this.enplacement == ".op-playCard" && ma_carte != null)
            {
                
                opp_carte = this.uid;

                console.log(opp_carte);

                state2("ATTACK",ma_carte,opp_carte);
                    
                ma_carte = null;
                opp_carte = null;

            }
            

            if (this.enplacement == ".my-hand")
            {
                console.log(this.uid);
                // this.uid = data["hand"][this.index].uid;
                ma_carte = this.uid;
                console.log(ma_carte);
                state2("PLAY",ma_carte,null);
            }
           

        }
        this.div_secon.onmouseover = () => { /// affiche la carte en plus gros

            // let carte = document.querySelector(".card-viewer");
            remove(".card_atk_big");
            remove(".card_cost_big");
            remove(".card_hp_big");

            remove(".card_type_big");
            remove(".card_desc_big");
            
            // let forAtk = document.querySelector(".card_atk_big");
            // let forCost = document.querySelector(".card_cost_big");
            // let forHp = document.querySelector(".card_hp_big");

            // let forName = document.querySelector(".card_type_big");
            
            this.forAtk.append(this.leover1)
            this.forCost.append(this.leover2) 
            this.forHp.append(this.leover3)
            
            this.forName.append(this.leover4) 

            console.log(this.leover4);
            if(this.forName.textContent.includes("Taunt")  )
            {
                
                
                this.forName.style.color = "red";
            }
            else if (this.forName.textContent.includes("Stealth"))
            {
                
                this.forName.style.color = "green";
            }
            else
            {
                this.forName.style.color = "black";
            }

            
            
            
            

            // carte.append(forAtk)
            // carte.append(forCost)
            // carte.append(forHp)

            // carte.append(forAtk)
            // carte.append(forAtk)
        }
        
    }

}
//////////////////////////////////////////////////////////////////////////////////////////// pour les actions comme attaquer

function power() // pour 
{
    state2("HERO_POWER",null,null);
}
function end_turn() // pour 
{
    state2("END_TURN",null,null);
}
let opencha = true;
function chat() // pour 
{
    if(opencha == true)
    {
        document.getElementById("reduire-chat").style.height = "0px";
        document.getElementById("reduire-chat").style.width = "0%";
        opencha =false
    }
    else
    {
        document.getElementById("reduire-chat").style.height = "120px";
        document.getElementById("reduire-chat").style.width = "99%";
        opencha =true
    }
   
}
//////////////////////////////////////////////////////////////////////////////////////////// voir la carte


