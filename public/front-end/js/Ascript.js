// open dropdown with id
function toggleShow(id) {
	/* toggle show */
	document.getElementById(id).classList.toggle("Ashow");
}

//remove dropdowns
window.onclick = function(event) {

	if(event.target.matches('.Adropdown-btn')) {
		return;
	}

	var dropdowns = document.getElementsByClassName("Adropdown-content");

	var i;
	for(i = 0; i < dropdowns.length; i++) {
		if(dropdowns[i].classList.contains('Ashow')) {
			dropdowns[i].classList.remove('Ashow');
		}
	}
}
