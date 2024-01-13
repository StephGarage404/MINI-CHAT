// Récupération du formulaire qui a l'id NewChatForm
const form = document.querySelector('#NewChatForm')

// ecouteur d'événement sur l'envoi du formulaire qui lancera une fonction
form.addEventListener('submit', function (e)
{
    
    // 1. Arreter l'envoi du formulaire
    e.preventDefault();
    console.log('J\'arrete le form');
    // 2. Je récupére la valeur de l'input qui a l'id chat
    const messageContent = document.querySelector('#chat').value
    // 2. Je récupére la valeur de l'input qui a l'id adress-ip
    const ipadress ="toto"// document.querySelector('#adress-ip').value
    console.log(messageContent)
    console.log(ipadress) 
    

    // Préparer les données de la requete qui sera envoyé à la page PHP process_create_message
    let formData = new FormData()
    formData.append('chat', messageContent)
    formData.append('adress-ip', ipadress)

    // 3. Je lance ma requête en js à la place du formulaire
    fetch('./process/process_create_message.php', {
        method: "POST", 
        body: formData
    }).then((response)=>{
        return response.text()
    }).then((data)=>{
        // 4. Je vide l'input
        document.querySelector('#chat').value ='' 
        getMessage()
    })

})



async function getMessage(){
    const response = await fetch('./process/process_get_message.php');
    const data = await response.json();
    console.log(data);
    //  récupère la div qui a l'id passMessage
    let div = document.querySelector('#passMessage');
    div.innerHTML ="";
    data.forEach(message => {

        div.innerHTML += `<div class="tchat" style="color: ${message.color}"> ${message.pseudo} a écrit : ${message.message_user} : ${message.created_at} </div>`
    });//               

}



setInterval(() => {
    getMessage()
}, 3000);