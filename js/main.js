let submitButton = document.querySelector('input[type="submit"]');
let pictures = document.querySelectorAll("div.vignette");

pictures.forEach((picture) => {
	picture.onmouseover = () => {
		picture.style =
			"border: 2px solid white !important; cursor: pointer; transform: scale(1.1); transition-duration: 0.5s";
	};

	picture.onmouseout = () => {
		picture.style.transform = "none";
		picture.style.border = "none";
	};
});

submitButton.onmouseover = () => {
	submitButton.style =
		"transform: scale(1.1); transition: all 0.5s ease-in-out;";
};

submitButton.onmousseout = () => {
	submitButton.style =
		"transform: scale(1.0); transition: all 0.5s ease-in-out;";
};

let app = document.getElementById("app");

let customNodeCreator = function (character) {
	return document.createTextNode(character);
};

let typewriter = new Typewriter(app, {
	loop: true,
	delay: 75,
	onCreateTextNode: customNodeCreator,
});

typewriter
	.typeString(
		'Level up your <span class= "bg-dark px-3 py-1 text-white rounded">Skills</span>'
	)
	.pauseFor(100)
	.start();

typewriter
	.typeString(" with")
	.pauseFor(2000)
	.deleteAll()
	.typeString(
		'the <span class = "bg-dark px-3 py-1 text-white rounded">power</span> of gaming'
	)
	.pauseFor(2000)
	.deleteChars(7)
	// .typeString('<strong>altered!</strong>')
	.start();
