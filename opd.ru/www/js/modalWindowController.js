function openModalW() {
	document.getElementById("modal").style.display = "block";
}

// function closeModalW() {
// 	document.getElementById("modal").style.display = "none";
// }

window.onclick = function (event) {
	const modal = document.getElementById("modal");
	if (event.target === modal) {
		modal.style.display = "none";
	}
}