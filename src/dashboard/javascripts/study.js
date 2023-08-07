//Watch for changes on the deck_selector, then submit deck_form
let deck_form       = document.getElementById("deck-selection")
let deck_selector   = document.getElementById("deck")
let iframe_btn = document.getElementById('open-frame')
//JS Arrays: https://www.w3schools.com/js/js_arrays.asp
let front = []
let back = []
let term = true

if(deck){
    console.log(deck[0]['card_front'])
    console.log(deck[0]['card_back'])
    console.log(deck[0]['card_level'])
    console.log(deck[0]['deck_id'])

}

//source:
//  https://stackoverflow.com/questions/10418644/creating-an-iframe-with-given-html-dynamically
function studyCards(){
    iframe_btn.style.display = ('none')
    let iframe = document.createElement('iframe')
    //https://stackoverflow.com/questions/195951/how-can-i-change-an-elements-class-with-javascript#:~:text=To%20change%20all%20classes%20for%20an%20element%3A&text=document.-,getElementById(%22MyElement%22).,list%20to%20apply%20multiple%20classes.)
    iframe.className = ('frame')
    iframe.style = 'background-color: #FFFFFF;'
    let html = `
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../dashboard/stylesheets/iframe.css">
            <title>Study</title>
        </head>
        <body>
            <button id="close" alt="close window">Close</button>
            <p id="training" class="training"></p>
            <button id="next" alt="Next card">next</button>
            <button id="flip" alt="Flip card">flip</button>
        </body>
    </html>`
    let style = `
    body {
        background-color: #FFFFFF;
    }
    `
    document.body.appendChild(iframe)
    console.log('iframe appended')

    iframe.contentWindow.document.open()
    iframe.contentWindow.document.write(html)

    training_card = iframe.contentWindow.document.getElementById('training')
    flip_btn = iframe.contentWindow.document.getElementById('flip')
    next_btn = iframe.contentWindow.document.getElementById('next')
    close_btn = iframe.contentWindow.document.getElementById('close')

    index = 0
    training_card.innerHTML = deck[index]["card_front"]

    //JS event listeners: https://developer.mozilla.org/en-US/docs/Web/API/EventTarget/addEventListener
    //JS arrow functions: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Functions/Arrow_functions
    next_btn.addEventListener('click', (event)=>{
        index++
        if(!(index < deck.length)){
            index=0
        }
        training_card.innerHTML = deck[index]["card_front"]
        term = true
    })

    flip_btn.addEventListener('click', (e)=>{
        term = !term
        training_card.innerHTML = (term ? deck[index]["card_front"] : deck[index]["card_back"])
    })

    close_btn.addEventListener('click', (e)=>{
        document.body.removeChild(iframe)
        iframe_btn.style.display = ('inline-block')
    })
}


//https://developer.mozilla.org/en-US/docs/Web/Events
iframe_btn.addEventListener('click', studyCards)
deck_selector.addEventListener('change', (e)=>{
    if(deck_selector.value){
        deck_form.submit()
        console.log(true)
    }
})