const inputs = document.querySelectorAll(".input");
console.log(inputs);


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");// تضيف كلاسFocus  في حال لم يوجد كلاس  Focus
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus"); // العكس
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});
// let del=document.getElementById("close_box");
// let del_box=document.getElementById("del-box");
// del.onclick=function(){
// this.style.display="none";
// }
