const state = () => {
    fetch("ajax.php", {   // Il faut créer cette page et son contrôleur appelle 
        method: "POST"        // l’API (games/state)
    })
        .then(response => response.json())
        .then(data => {
            console.log(data); // contient les cartes/état du jeu.
            console.log(data["hp"]);
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
    /////////////////////// rafraichir les etats de la partie donc les cartes du jeu
    remove(".op-playCard");
    remove(".my-playCard");
    remove(".my-hand");
    re_my_hand(data);
    re_board(data);

    console.log("wsh")

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

    let node = document.querySelector(".tmp");

    node.removeChild(node.lastElementChild);
    node.append(div);
}

////////////////////////////////////////////////////////////////////////////////////////////

function my_power(data) // pour le power
{

    // let div = document.createElement("p");

    // let node = document.querySelector(".my-power");
    // if (data["heroPowerAlreadyUsed"] == false) {



    //     let textNode = document.createTextNode("yes");
    //     div.append(textNode);

    //     node.removeChild(node.lastElementChild);
    //     node.append(div);
    // }
    // else {

    //     let textNode = document.createTextNode("no");
    //     div.append(textNode);

    //     node.removeChild(node.lastElementChild);
    //     node.append(div);
    // }

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
        this.textNode4 = document.createTextNode(data[i].mechanics[0]);
        this.textNode5 = document.createTextNode(data[i].mechanics[1]);

        ///////////////////////////////////////////////////////
        this.leover1 = document.createTextNode(data[i].atk);
        this.leover2 = document.createTextNode(data[i].cost);
        this.leover3 = document.createTextNode(data[i].hp);

        this.leover4 = document.createTextNode(data[i].mechanics[0]);
        this.leover5 = document.createTextNode(data[i].mechanics[1]);
        ///////////////////////////////////////////////////////

        this.node.append(this.textNode1);
        this.node2.append(this.textNode2);
        this.node3.append(this.textNode3);
        this.node4.append(this.textNode4);
        this.node5.append(this.textNode5);

        this.div_placer.append(this.node);
        this.div_placer.append(this.node2);
        this.div_placer.append(this.node3);


        this.div_secon.append(this.div_placer);

        this.div_secon.append(this.node6);
        this.div_secon.append(this.node4);
        this.div_secon.append(this.node5);


        this.div_princ.append(this.div_secon);
        this.uid = uid;
        this.div_secon.onclick = () => {

            // if(this.enplacement == ".my-playCard")
            // {
            //     ma_carte = this.uid;
            //     etat = "attaquer";
            //     if(this.enplacement == ".op-playCard" )
            //     {
            //         ma_carte = this.uid;
            //     }
                
            //     console.log(ma_carte);
            //     if(opp_carte != null )
            //     {
            //         state2("ATTACK",ma_carte,opp_carte);
                    
            //         ma_carte = null;
            //         opp_carte = null;
            //     }
            // }
            
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
            remove(".card_atk_big");
            remove(".card_cost_big");
            remove(".card_hp_big");

            remove(".card_type_big");
            remove(".card_desc_big");
            
            let forAtk = document.querySelector(".card_atk_big");
            let forCost = document.querySelector(".card_cost_big");
            let forHp = document.querySelector(".card_hp_big");

            let forName = document.querySelector(".card_type_big");
            let forDes = document.querySelector(".card_desc_big");
            


            
            
            forAtk.append(this.leover1)
            forCost.append(this.leover2) 
            forHp.append(this.leover3)
            
            forName.append(this.leover4) 
            forDes.append(this.leover5)
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
function chat() // pour 
{
    

}
//////////////////////////////////////////////////////////////////////////////////////////// voir la carte


