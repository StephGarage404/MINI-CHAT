// Récupération du formulaire 
const form = document.querySelector('form')

// ecouteur d'événement sur l'envoi du formulaire qui lancera une fonction
form.addEventListener('submit', function (e) {
    
    // 1. Arreter l'envoi du formulaire
    e.preventDefault();
    console.log('J\'arrete le form');
    // 2. Je récupére la valeur de l'input
    const messageContent = document.querySelector('#chat').value
    console.log(messageContent)
    

    // Préparer les données de la requete
    let formData = new FormData()
    formData.append('chat', messageContent)

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
    let ul = document.querySelector('#passMessage');
    ul.innerHTML ="";
    data.forEach(message => {

        ul.innerHTML += `
            <li>${message.message_user} ${message.created_at}</li>
         `
    });

}




setInterval(() => {
    getMessage()
}, 3000);