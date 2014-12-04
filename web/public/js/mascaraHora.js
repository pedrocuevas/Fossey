
 
var patron = new Array(2,2,2)
var patron2 = new Array(1,3,3,3,3)

function mascara(d,sep,pat,nums){
if(d.valant != d.value){
                val = d.value
                largo = val.length
                val = val.split(sep)
                val2 = ''
                for(r=0;r<val.length;r++){
                               val2 += val[r]    
                }
                if(nums){
                               for(z=0;z<val2.length;z++){
                                               if(isNaN(val2.charAt(z))){
                                                               letra = new RegExp(val2.charAt(z),"g")
                                                               val2 = val2.replace(letra,"")
                                               }
                               }
                }
                val = ''
                val3 = new Array()
                for(s=0; s<pat.length; s++){
                               val3[s] = val2.substring(0,pat[s])
                               val2 = val2.substr(pat[s])
                }
                for(q=0;q<val3.length; q++){
                               if(q ==0){
                                               val = val3[q]
                               }
                               else{
                                               if(val3[q] != ""){
                                                               val += sep + val3[q]
                                                               }
                               }
                }
                d.value = val
                d.valant = val
                }
}

function CheckTime(str) 
{ 
hora=str.value; 
if (hora=='') { 
return; 
} 
if (hora.length>8) { 
alert("Introdujo una cadena mayor a 8 caracteres"); 
return; 
} 
if (hora.length!=8) { 
alert("Introducir HH:MM:SS"); 
return; 
} 
a=hora.charAt(0); //<=2 
b=hora.charAt(1); //<4 
c=hora.charAt(2); //: 
d=hora.charAt(3); //<=5 
e=hora.charAt(5); //: 
f=hora.charAt(6); //<=5 
if ((a==2 && b>3) || (a>2)) { 
alert("El valor que introdujo en la Hora no corresponde, introduzca un digito entre 00 y 23"); 
str.value = '';
return; 
} 
if (d>5) { 
alert("El valor que introdujo en los minutos no corresponde, introduzca un digito entre 00 y 59"); 
str.value = '';
return; 
} 
if (f>5) { 
alert("El valor que introdujo en los segundos no corresponde"); 
str.value = '';
return; 
} 
if (c!=':' || e!=':') { 
alert("Introduzca el caracter ':' para separar la hora, los minutos y los segundos"); 
str.value = '';
return; 
} 
} 
