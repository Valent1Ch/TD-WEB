let update=function(){
let nom=document.forms[0].nom.value;
let prenom=document.forms[0].prenom.value;
let nomComplet=`${nom} ${prenom}`;
document.getElementById('nomcomplet').innerHTML=nomComplet;
return false;

}
document.getElementById('btValidation').addEventListener('click',update);