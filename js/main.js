let submitButton = document.querySelector('input[type="submit"]');

submitButton.onmouseover = ()=>{

    submitButton.style = 'transform: scale(1.1); transition: all 0.5s ease-in-out;';

}

submitButton.onmousseout = ()=>{

    submitButton.style = 'transform: scale(1.0); transition: all 0.5s ease-in-out;';

}

let app = document.getElementById('app');


let customNodeCreator = function(character) {
  return document.createTextNode(character);
}

let typewriter = new Typewriter(app, {
  loop: true,
  delay: 75,
  onCreateTextNode: customNodeCreator,
});

typewriter
  .typeString('Level up <span class= "bg-dark px-3 py-1 text-white rounded">your skills</span>')
  .pauseFor(100)
  .start();

typewriter.typeString('')
    .pauseFor(1000)
    .deleteAll(5)
    .typeString('with the<span class = "bg-dark px-3 py-1 text-white rounded"> power of gaming </span>')
    .pauseFor(1000)
    .deleteChars()
    .start();