function beliC(){
	var b= document.getElementsByClassName("beliK");
	for (var i = 0; i <6; i++) {
		b[i].style.display="none";
	}
	var a= document.getElementsByClassName("beliC");
	for (var i = 0; i <5; i++) {
		a[i].style.display="initial";
	}
}
function beliK(){
	var a= document.getElementsByClassName("beliK");
	for (var i = 0; i <6; i++) {
		a[i].style.display="initial";
	}
	var b= document.getElementsByClassName("beliC");
	for (var i = 0; i <3; i++) {
		b[i].style.display="none";
	}
}

// 

function jualC(){
	var b= document.getElementsByClassName("jualK");
	for (var i = 0; i <6; i++) {
		b[i].style.display="none";
	}
	var a= document.getElementsByClassName("jualC");
	for (var i = 0; i <5; i++) {
		a[i].style.display="initial";
	}
}
function jualK(){
	var a= document.getElementsByClassName("jualK");
	for (var i = 0; i <6; i++) {
		a[i].style.display="initial";
	}
	var b= document.getElementsByClassName("jualC");
	for (var i = 0; i <3; i++) {
		b[i].style.display="none";
	}
	b[5].style.display="initial";
}


function pilihBayar(el) {
    window["pilihBayar_" + el.options[el.selectedIndex].value]();
}

function pilihBayar_bayarBeban() {
	var a= document.getElementsByClassName("beban");
	for (var i = 0; i <11; i++) {
		a[i].style.display="initial";
	}
}

function pilihBayar_bayarSewa() {
	var a= document.getElementsByClassName("beban");
	for (var i = 0; i <11; i++) {
		a[i].style.display="none";
	}
}

function pilihBayar_bayarHutang() {
	var a= document.getElementsByClassName("beban");
	for (var i = 0; i <11; i++) {
		a[i].style.display="none";
	}
}

function pilihBayar_bayarGaji() {
	var a= document.getElementsByClassName("beban");
	for (var i = 0; i <11; i++) {
		a[i].style.display="none";
	}
}


function subBeban(x){
	var a= document.getElementsByClassName("beban");
	var b= document.getElementsByClassName("beban1");
	var y=0;
	if(x==0){
		y=0;
	} else if (x==1){
		y=2;
	} else if (x==2){
		y=4;
	} else if (x==3){
		y=6;
	} else if (x==4){
		y=8;
	}

	if(a[y].checked==true){
		b[x].style="display:initial;width:100%;";
	} else {
		b[x].style.display="none";	
	}
}