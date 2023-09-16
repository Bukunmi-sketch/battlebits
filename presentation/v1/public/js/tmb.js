var DOM = (document.getElementById) ? 1 : 0;
var NS4 = (document.layers) ? 1 : 0;
var IE4 = (document.all) ? 1 : 0;

function s(e){ //use if initial state is hide
	if(DOM) {element = document.getElementById(e).style;} else if (NS4) {element = document.layers[e];} else {element = document.all[e].style;}
	element.display == 'block' ? element.display = 'none' : element.display='block';
}
function h(e){ //use if initial state is show
	if(DOM) {element = document.getElementById(e).style;} else if (NS4) {element = document.layers[e];} else {element = document.all[e].style;}
	element.display == 'none' ? element.display = 'block' : element.display='none';
}

function submitonce(theform){
//if IE 4+ or NS 6+
if (document.all||document.getElementById){
//screen thru every element in the form, and hunt down "submit" and "reset"
for (i=0;i<theform.length;i++){
var tempobj=theform.elements[i]
if(tempobj.type.toLowerCase()=="submit"||tempobj.type.toLowerCase()=="reset")
//disable em
tempobj.disabled=true
}
}
}

function setCookie(c_name,value,expiredays,path)
{

    var exdate=new Date();

    exdate.setDate(exdate.getDate()+expiredays);

    document.cookie=c_name+ "=" +escape(value)+

    ((expiredays==null) ? "" : ";expires="+exdate.toUTCString()) + (path ? "; path=" + path : "" );

}