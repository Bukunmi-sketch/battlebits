

var BackColor 	= "white";
var ForeColor		= "black";
// var TargetDate 	= "10/05/2006 5:00 AM";
//Dit profiel is nog 21 dagen ,12 uren en 44 minuten beschikbaar
var DisplayFormat = "%%D%% : %%H%% : %%M%% : %%S%%";
var protect_DisplayFormat = "%%H%% hours, %%M%% minutes,and   %%S%% seconds";
var CountActive 	= true;

var CountStepper 	= -1;
var LeadingZero 	= true;
CountStepper 		= Math.ceil(CountStepper);
if (CountStepper == 0)
	  CountActive = false;
var SetTimeOutPeriod = (Math.abs(CountStepper)-1)*1000 + 990;
//alert(CountStepper)
///////////////////////////////////////////////////////
function calcage(secs, num1, num2) 
{
	s = ((Math.floor(secs/num1))%num2).toString();
	if (LeadingZero && s.length < 2)
	   s = "0" + s;
	return s;
}

function pad2(number) {
   
     return (number < 10 ? '0' : '') + number
   
}

var updatedDate = 0;
function CountBack(round_mafia)
{
    
    var ddate = new Date();
    dnow=ddate.getTime();
    
    for( var i = 0; i < round_mafia; i++ )
    {
        var dnow = Math.ceil(document.getElementById('timehid_'+i).value);     
        var round_mafia_ends = Math.ceil(document.getElementById('round_mafia_ends_'+i).value);
        var difference = round_mafia_ends-dnow;
        
        var num = difference/86400;
        var days = pad2(parseInt(num));
        var num2 = (num - days)*24;
        var hours = pad2(parseInt(num2));
        var num3 = (num2 - hours)*60;
    	var mins = pad2(parseInt(num3));
    	var num4 = (num3 - mins)*60;
    	var secs = pad2(parseInt(num4));
        
        DisplayStr = DisplayFormat.replace(/%%D%%/g, days);
		DisplayStr = DisplayStr.replace(/%%H%%/g, hours);
		DisplayStr = DisplayStr.replace(/%%M%%/g,mins);
		DisplayStr = DisplayStr.replace(/%%S%%/g, secs);
        
        if(document.getElementById('endroundspanid_'+i))
 		   document.getElementById('endroundspanid_'+i).innerHTML = DisplayStr;
        if(document.getElementById('endroundspanid_turbo_'+i))
            document.getElementById('endroundspanid_turbo_'+i).innerHTML = DisplayStr;
        document.getElementById('timehid_'+i).value =  dnow + 1;
    }
    
    
    
    if(document.getElementById('my_protect_sec'))
    var my_protect_sec = Math.ceil(document.getElementById('my_protect_sec').value);
    var protect_difference = my_protect_sec-dnow;
    var protect_num = protect_difference/86400;
    var protect_days = parseInt(protect_num);
    var protect_num2 = (protect_num - protect_days)*24;
    var protect_hours = parseInt(protect_num2);
    var protect_num3 = (protect_num2 - protect_hours)*60;
	var protect_mins = parseInt(protect_num3);
	var protect_num4 = (protect_num3 - protect_mins)*60;
	var protect_secs = parseInt(protect_num4);

    var protect_DisplayStr="";
    var lbl_protect_DisplayStr = "";
    if(protect_days > 0)
        protect_DisplayStr = protect_days+' days, ';
    if(protect_hours > 0)
        protect_DisplayStr += protect_hours+' hours, ';
    if(protect_mins > 0)
        protect_DisplayStr += protect_mins+' minutes, ';    
    if(protect_secs > 0)
        protect_DisplayStr += protect_secs+' seconds';    
    if(protect_DisplayStr != "")
       lbl_protect_DisplayStr = 'You are protected for '+protect_DisplayStr;
        
    if(document.getElementById('protect_end'))
 		document.getElementById('protect_end').innerHTML = lbl_protect_DisplayStr;                    
}
setInterval("CountBack(round_mafia)", 1000);
