

	let img = document.querySelector('.myImg');
	let modal = document.querySelector('.modal');
	let scalePicBtn = document.querySelectorAll('.scalePicture');
	let bigSrc = document.querySelectorAll('.bigSrc');
	let modalImg = document.querySelector(".modal-content");

	console.log(bigSrc[0]);
	scalePicBtn.forEach(function(item, i){
		item.addEventListener("click", function() {
		modal.style.display = "block";
		modalImg.src = bigSrc[i].href;
	});
});


	let span = document.querySelector(".close");
	console.log(span);

	span.onclick = function() { 
		modal.style.display = "none";
	}