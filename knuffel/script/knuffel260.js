// @package phpBB3 Knuffel
// @version $Id: knuffel260.js 57 2009-09-12 03:05:09Z Wuerzi $
// @copyright (c) 2009 Wuerzi - http://www.spieleresidenz.de
// @author based on Knuffel 2.5.0 (c) 2007/2008 Mike (Michael Kohaupt) http://forum4u.biz
// @license http://opensource.org/licenses/gpl-license.php GNU Public License

var flag = new Array(5);
var score = new Array(5);
var points = new Array(212);
var hf	= new Array(6);
var sum1,bonus1,sumtop1,sumlow1,sumcomplete1,sum2,bonus2,sumtop2,sumlow2,sumcomplete2,sum3,bonus3,sumtop3,sumlow3,sumcomplete3,factorsum1,factorsum2,factorsum3,endsum;
var wcount=0;
var round=0;
var selector=0;
var undoset=0;
function ShowHold(nr)
{
	if (flag[nr]){document.getElementById('dice_'+nr).style.backgroundColor = "red";}
	else document.getElementById('dice_'+nr).style.backgroundColor = "transparent";
}
function Hold (nr)
{
	if (wcount>0)
	{
		flag[nr]=(!flag[nr]);
		ShowHold(nr);
	}
	else
	{
		if (user_lang=="de")
		{
			alert('Du musst erst würfeln!');
			return;
		}
		else
		if (user_lang=="de_x_sie")
		{
			alert('Sie müssen erst würfeln!');
			return;
		}
		else
		{
			alert('You have to roll the dice first!');
			return;
		}
	}
}
function CountThrow()
{
	if (user_lang=="de")
	{
		if (wcount == 1) {document.getElementById("message").value = "Um einen Würfel zu halten, klicke ihn an."; window.setTimeout('D6.setButtonLabel("2. Wurf")', 1000); }
		if (wcount == 2) {window.setTimeout('D6.setButtonLabel("Letzter Wurf")', 500);}
		if (wcount > 2) {document.getElementById("message").value = "Trage Dein Ergebnis ein!"; D6.setButtonLabel("none"); }
	}
	else
	if (user_lang=="de_x_sie")
	{
		if (wcount == 1) {document.getElementById("message").value = "Um einen Würfel zu halten, klicken Sie ihn an."; window.setTimeout('D6.setButtonLabel("2. Wurf")', 1000); }
		if (wcount == 2) {window.setTimeout('D6.setButtonLabel("Letzter Wurf")', 500);}
		if (wcount > 2) {document.getElementById("message").value = "Tragen Sie das Ergebnis ein!"; D6.setButtonLabel("none"); }
	}
	else
	{
		if (wcount == 1) {document.getElementById("message").value = "To hold a dice just click on it."; window.setTimeout('D6.setButtonLabel("2nd throw")', 1000); }
		if (wcount == 2) {window.setTimeout('D6.setButtonLabel("Final throw")', 500);}
		if (wcount > 2) {document.getElementById("message").value = "Enter your score!"; D6.setButtonLabel("none"); }
	}

}
function ShowPoints(nr)
{
	selector=nr;
	if (points[nr]<0) var t1='-'; else var t1=points[nr];
	if (nr==0) {document.getElementById("field0").value=t1;	document.getElementById("button0").style.visibility = "hidden";}
	else if (nr==1) {document.getElementById("field1").value=t1;	document.getElementById("button1").style.visibility = "hidden";}
	else if (nr==2) {document.getElementById("field2").value=t1;	document.getElementById("button2").style.visibility = "hidden";}
	else if (nr==3) {document.getElementById("field3").value=t1;	document.getElementById("button3").style.visibility = "hidden";}
	else if (nr==4) {document.getElementById("field4").value=t1;	document.getElementById("button4").style.visibility = "hidden";}
	else if (nr==5) {document.getElementById("field5").value=t1;	document.getElementById("button5").style.visibility = "hidden";}
	else if (nr==6) {document.getElementById("field6").value=t1;	document.getElementById("button6").style.visibility = "hidden";}
	else if (nr==7) {document.getElementById("field7").value=t1;	document.getElementById("button7").style.visibility = "hidden";}
	else if (nr==8) {document.getElementById("field8").value=t1;	document.getElementById("button8").style.visibility = "hidden";}
	else if (nr==9) {document.getElementById("field9").value=t1;	document.getElementById("button9").style.visibility = "hidden";}
	else if (nr==10) {document.getElementById("field10").value=t1;	document.getElementById("button10").style.visibility = "hidden";}
	else if (nr==11) {document.getElementById("field11").value=t1;	document.getElementById("button11").style.visibility = "hidden";}
	else if (nr==12) {document.getElementById("field12").value=t1;	document.getElementById("button12").style.visibility = "hidden";}
	else if (nr==100) {document.getElementById("field100").value=t1;	document.getElementById("button100").style.visibility = "hidden";}
	else if (nr==101) {document.getElementById("field101").value=t1;	document.getElementById("button101").style.visibility = "hidden";}
	else if (nr==102) {document.getElementById("field102").value=t1;	document.getElementById("button102").style.visibility = "hidden";}
	else if (nr==103) {document.getElementById("field103").value=t1;	document.getElementById("button103").style.visibility = "hidden";}
	else if (nr==104) {document.getElementById("field104").value=t1;	document.getElementById("button104").style.visibility = "hidden";}
	else if (nr==105) {document.getElementById("field105").value=t1;	document.getElementById("button105").style.visibility = "hidden";}
	else if (nr==106) {document.getElementById("field106").value=t1;	document.getElementById("button106").style.visibility = "hidden";}
	else if (nr==107) {document.getElementById("field107").value=t1;	document.getElementById("button107").style.visibility = "hidden";}
	else if (nr==108) {document.getElementById("field108").value=t1;	document.getElementById("button108").style.visibility = "hidden";}
	else if (nr==109) {document.getElementById("field109").value=t1;	document.getElementById("button109").style.visibility = "hidden";}
	else if (nr==110) {document.getElementById("field110").value=t1;	document.getElementById("button110").style.visibility = "hidden";}
	else if (nr==111) {document.getElementById("field111").value=t1;	document.getElementById("button111").style.visibility = "hidden";}
	else if (nr==112) {document.getElementById("field112").value=t1;	document.getElementById("button112").style.visibility = "hidden";}
	else if (nr==200) {document.getElementById("field200").value=t1;	document.getElementById("button200").style.visibility = "hidden";}
	else if (nr==201) {document.getElementById("field201").value=t1;	document.getElementById("button201").style.visibility = "hidden";}
	else if (nr==202) {document.getElementById("field202").value=t1;	document.getElementById("button202").style.visibility = "hidden";}
	else if (nr==203) {document.getElementById("field203").value=t1;	document.getElementById("button203").style.visibility = "hidden";}
	else if (nr==204) {document.getElementById("field204").value=t1;	document.getElementById("button204").style.visibility = "hidden";}
	else if (nr==205) {document.getElementById("field205").value=t1;	document.getElementById("button205").style.visibility = "hidden";}
	else if (nr==206) {document.getElementById("field206").value=t1;	document.getElementById("button206").style.visibility = "hidden";}
	else if (nr==207) {document.getElementById("field207").value=t1;	document.getElementById("button207").style.visibility = "hidden";}
	else if (nr==208) {document.getElementById("field208").value=t1;	document.getElementById("button208").style.visibility = "hidden";}
	else if (nr==209) {document.getElementById("field209").value=t1;	document.getElementById("button209").style.visibility = "hidden";}
	else if (nr==210) {document.getElementById("field210").value=t1;	document.getElementById("button210").style.visibility = "hidden";}
	else if (nr==211) {document.getElementById("field211").value=t1;	document.getElementById("button211").style.visibility = "hidden";}
	else if (nr==212) {document.getElementById("field212").value=t1;	document.getElementById("button212").style.visibility = "hidden";}
	document.getElementById("undopoints").style.visibility = "visible";
	undoset=0;
}
function ShowSum(su11,su12,su13,su14,su15,su21,su22,su23,su24,su25,su31,su32,su33,su34,su35,fa1,fa2,fa3,sum)
{
	document.getElementById("suma1").value=su11;
	document.getElementById("bonus1").value=su12;
	document.getElementById("sumtop1").value=su13;
	document.getElementById("sumlow1").value=su14;
	document.getElementById("uppersum1").value=su13;
	document.getElementById("sumcomplete1").value=su15;
	document.getElementById("sumfactor1").value=fa1;
	document.getElementById("suma2").value=su21;
	document.getElementById("bonus2").value=su22;
	document.getElementById("sumtop2").value=su23;
	document.getElementById("sumlow2").value=su24;
	document.getElementById("uppersum2").value=su23;
	document.getElementById("sumcomplete2").value=su25;
	document.getElementById("sumfactor2").value=fa2;
	document.getElementById("suma3").value=su31;
	document.getElementById("bonus3").value=su32;
	document.getElementById("sumtop3").value=su33;
	document.getElementById("sumlow3").value=su34;
	document.getElementById("uppersum3").value=su33;
	document.getElementById("sumcomplete3").value=su35;
	document.getElementById("sumfactor3").value=fa3;
	document.getElementById("finalsum").value=sum;
}
function CalcSum()
{
	sum1=0;
	for (i=0; i<6; i++)
	{
		if (points[i]>0)
		{
			sum1=sum1+points[i];
		}
	}
	if (sum1<63) bonus1=0; else bonus1=35;
	sumtop1=sum1+bonus1;
	sumlow1=0;
	for (i=6; i<13; i++)
	{
		if (points[i]>0)
		{
			sumlow1=sumlow1+points[i];
		}
	}
	sumcomplete1=sumlow1+sumtop1;
	factorsum1=sumcomplete1;
	sum2=0;
	for (i=0; i<6; i++)
	{
		if (points[i+100]>0)
		{
			sum2=sum2+points[i+100];
		}
	}
	if (sum2<63) bonus2=0; else bonus2=35;
	sumtop2=sum2+bonus2;
	sumlow2=0;
	for (i=6; i<13; i++)
	{
		if (points[i+100]>0)
		{
			sumlow2=sumlow2+points[i+100];
		}
	}
	sumcomplete2=sumlow2+sumtop2;
	factorsum2=sumcomplete2*2;
	sum3=0;
	for (i=0; i<6; i++)
	{
		if (points[i+200]>0)
		{
			sum3=sum3+points[i+200];
		}
	}
	if (sum3<63) bonus3=0; else bonus3=35;
	sumtop3=sum3+bonus3;
	sumlow3=0;
	for (i=6; i<13; i++)
	{
		if (points[i+200]>0)
		{
			sumlow3=sumlow3+points[i+200];
		}
	}
	sumcomplete3=sumlow3+sumtop3;
	factorsum3=sumcomplete3*3;
	endsum=factorsum1+factorsum2+factorsum3;
	ShowSum(sum1,bonus1,sumtop1,sumlow1,sumcomplete1,sum2,bonus2,sumtop2,sumlow2,sumcomplete2,sum3,bonus3,sumtop3,sumlow3,sumcomplete3,factorsum1,factorsum2,factorsum3,endsum);
}
function CheckPoints(nr)
{
	var i,m,s1,s2,s3;
	for (i=0; i<6; i++) hf[i]=0;
	for (i=0; i<6; i++) hf[score[i]-1]++;
	//	check the column
	if (nr>199) {m=nr-200;}
	else if (nr>99) {m=nr-100;}
	else {m=nr}
	//	1-6
	if (m<6) s1=hf[m]*(m+1);
	//	three of a kind
	else if (m==6)
	{
		s2=0; for (i=0; i<5; i++) s2=s2+score[i];
		s1=0; for (i=0; i<6; i++) if (hf[i]>2) s1=1;
		if (s1>0) s1=s2;
	}
	//	four of a kind
	else if (m==7)
	{
		s2=0; for (i=0; i<5; i++) s2=s2+score[i];
		s1=0; for (i=0; i<6; i++) if (hf[i]>3) s1=1;
		if (s1>0) s1=s2;
	}
	//	full house
	else if (m==8)
	{
		s1=0; s2=0; s3=0;
		for (i=0; i<6; i++)
		{
			if (hf[i]==2) s1++;
			if (hf[i]==3) s2++;
			if (hf[i]==5) s3++;
		}
		if ((s3>0)||((s1>0)&&(s2>0))) s1=25; else s1=0;
	}
	//	small street
	else if (m==9)
	{
		s1=0; for (i=0; i<4; i++) if (hf[i]>0) s1++;
		if (s1<4) { s1=0; for (i=0; i<4; i++) if (hf[i+1]>0) s1++; }
		if (s1<4) { s1=0; for (i=0; i<4; i++) if (hf[i+2]>0) s1++; }
		if (s1>3) s1=30; else s1=0;
	}
	//	large street
	else if (m==10)
	{
		s1=0;
		for (i=0; i<5; i++) if (hf[i]>0) s1++;
		if (s1<5) { s1=0; for (i=0; i<5; i++) if (hf[i+1]>0) s1++; }
		if (s1>4) s1=40; else s1=0;
	}
	//	knuffel
	else if (m==11)
	{
		s1=0;
		for (i=0; i<6; i++) if (hf[i]==5) s1=50;
	}
	//	chance
	else if (m==12)
	{
		s1=0; for (i=0; i<5; i++) s1=s1+score[i];
	}
	return s1;
}
function SetPoints(nr)
{
	if (undoset==0)
	{
		if (user_lang=='de')
		{
			if (wcount == 0) { alert('Du musst erst würfeln!'); }
			else if (points[nr]>=0) { alert('Diese Auswahl ist schon gesetzt!'); }
			else
			{
				points[nr]=CheckPoints(nr);
				ShowPoints(nr);
				CalcSum();
				round++;
				NextRound();
			}
		}

		else
		if (user_lang=="de_x_sie")
		{
			if (wcount == 0) { alert('Sie müssen erst würfeln!'); }
			else if (points[nr]>=0) { alert('Diese Auswahl ist schon gesetzt!'); }
			else
			{
				points[nr]=CheckPoints(nr);
				ShowPoints(nr);
				CalcSum();
				round++;
				NextRound();
			}
		}

		else
		{
			if (wcount == 0) { alert('You have to roll the dice first!'); }
			else if (points[nr]>=0) { alert('These Points are already set!'); }
			else
			{
				points[nr]=CheckPoints(nr);
				ShowPoints(nr);
				CalcSum();
				round++;
				NextRound();
			}
		}
	}
	else if (undoset==1)
	{
		undoset=0;
		points[nr]=CheckPoints(nr);
		ShowPoints(nr);
		CalcSum();
		NextRound();
	}
}
function NextRound()
{
	if (round<39)
	{
		for (i=0; i<5; i++) { flag[i]=false; ShowHold(i); }

		if (user_lang=="de")
		{
			D6.setButtonLabel("Nächste Runde");
			document.getElementById("message").value = "Nächste Runde. Bitte Würfeln!";
		}

		else
		if (user_lang=="de_x_sie")
		{
			D6.setButtonLabel("Nächste Runde");
			document.getElementById("message").value = "Nächste Runde. Bitte würfeln Sie!";
		}

		else
		{
			D6.setButtonLabel("Next Round");
			document.getElementById("message").value = "Next round. Roll the dice!";
		}
		wcount=0;
	}
	else
	{
		for (i=0; i<5; i++) { flag[i]=false; ShowHold(i); }
		D6.setButtonLabel("none");
		document.getElementById("undopoints").style.visibility = "hidden";

		if (user_lang=="de")
		{
			document.getElementById("message").value = "Spielende. Du hast "+endsum+" Punkte erreicht.";
		}
		else
		if (user_lang=="de_x_sie")
		{
			document.getElementById("message").value = "Spielende. Sie haben "+endsum+" Punkte erreicht.";
		}

		else
		{
			document.getElementById("message").value = "End of game. You reached "+endsum+" points.";
		}
		wcount=0;
		document.getElementById("submitbutton").style.visibility = "visible";
	}
}

function UndoMove() {
	points[selector]=-1;
	var t1='-';
	if (selector==0) {document.getElementById("field0").value=t1;	document.getElementById("button0").style.visibility = "visible";}
	else if (selector==1) {document.getElementById("field1").value=t1;	document.getElementById("button1").style.visibility = "visible";}
	else if (selector==2) {document.getElementById("field2").value=t1;	document.getElementById("button2").style.visibility = "visible";}
	else if (selector==3) {document.getElementById("field3").value=t1;	document.getElementById("button3").style.visibility = "visible";}
	else if (selector==4) {document.getElementById("field4").value=t1;	document.getElementById("button4").style.visibility = "visible";}
	else if (selector==5) {document.getElementById("field5").value=t1;	document.getElementById("button5").style.visibility = "visible";}
	else if (selector==6) {document.getElementById("field6").value=t1;	document.getElementById("button6").style.visibility = "visible";}
	else if (selector==7) {document.getElementById("field7").value=t1;	document.getElementById("button7").style.visibility = "visible";}
	else if (selector==8) {document.getElementById("field8").value=t1;	document.getElementById("button8").style.visibility = "visible";}
	else if (selector==9) {document.getElementById("field9").value=t1;	document.getElementById("button9").style.visibility = "visible";}
	else if (selector==10) {document.getElementById("field10").value=t1;	document.getElementById("button10").style.visibility = "visible";}
	else if (selector==11) {document.getElementById("field11").value=t1;	document.getElementById("button11").style.visibility = "visible";}
	else if (selector==12) {document.getElementById("field12").value=t1;	document.getElementById("button12").style.visibility = "visible";}
	else if (selector==100) {document.getElementById("field100").value=t1;	document.getElementById("button100").style.visibility = "visible";}
	else if (selector==101) {document.getElementById("field101").value=t1;	document.getElementById("button101").style.visibility = "visible";}
	else if (selector==102) {document.getElementById("field102").value=t1;	document.getElementById("button102").style.visibility = "visible";}
	else if (selector==103) {document.getElementById("field103").value=t1;	document.getElementById("button103").style.visibility = "visible";}
	else if (selector==104) {document.getElementById("field104").value=t1;	document.getElementById("button104").style.visibility = "visible";}
	else if (selector==105) {document.getElementById("field105").value=t1;	document.getElementById("button105").style.visibility = "visible";}
	else if (selector==106) {document.getElementById("field106").value=t1;	document.getElementById("button106").style.visibility = "visible";}
	else if (selector==107) {document.getElementById("field107").value=t1;	document.getElementById("button107").style.visibility = "visible";}
	else if (selector==108) {document.getElementById("field108").value=t1;	document.getElementById("button108").style.visibility = "visible";}
	else if (selector==109) {document.getElementById("field109").value=t1;	document.getElementById("button109").style.visibility = "visible";}
	else if (selector==110) {document.getElementById("field110").value=t1;	document.getElementById("button110").style.visibility = "visible";}
	else if (selector==111) {document.getElementById("field111").value=t1;	document.getElementById("button111").style.visibility = "visible";}
	else if (selector==112) {document.getElementById("field112").value=t1;	document.getElementById("button112").style.visibility = "visible";}
	else if (selector==200) {document.getElementById("field200").value=t1;	document.getElementById("button200").style.visibility = "visible";}
	else if (selector==201) {document.getElementById("field201").value=t1;	document.getElementById("button201").style.visibility = "visible";}
	else if (selector==202) {document.getElementById("field202").value=t1;	document.getElementById("button202").style.visibility = "visible";}
	else if (selector==203) {document.getElementById("field203").value=t1;	document.getElementById("button203").style.visibility = "visible";}
	else if (selector==204) {document.getElementById("field204").value=t1;	document.getElementById("button204").style.visibility = "visible";}
	else if (selector==205) {document.getElementById("field205").value=t1;	document.getElementById("button205").style.visibility = "visible";}
	else if (selector==206) {document.getElementById("field206").value=t1;	document.getElementById("button206").style.visibility = "visible";}
	else if (selector==207) {document.getElementById("field207").value=t1;	document.getElementById("button207").style.visibility = "visible";}
	else if (selector==208) {document.getElementById("field208").value=t1;	document.getElementById("button208").style.visibility = "visible";}
	else if (selector==209) {document.getElementById("field209").value=t1;	document.getElementById("button209").style.visibility = "visible";}
	else if (selector==210) {document.getElementById("field210").value=t1;	document.getElementById("button210").style.visibility = "visible";}
	else if (selector==211) {document.getElementById("field211").value=t1;	document.getElementById("button211").style.visibility = "visible";}
	else if (selector==212) {document.getElementById("field212").value=t1;	document.getElementById("button212").style.visibility = "visible";}
	document.getElementById("undopoints").blur();
	CalcSum();
	document.getElementById("undopoints").style.visibility = "hidden";
	D6.setButtonLabel("none");
	document.getElementById("submitbutton").style.visibility = "hidden";
	undoset=1;
	if (user_lang=="de")
	{
		document.getElementById("message").value = "Eintrag zurückgenommen. Bitte Punkte neu setzen.";
	}
	else
	if (user_lang=="de_x_sie")
	{
		document.getElementById("message").value = "Eintrag zurückgenommen. Bitte Punkte neu setzen.";
	}
	else
	{
		document.getElementById("message").value = "Entry cancelled. Please set your points.";
	}
}
function roll()
{
	if (undoset==0) {
		roller = new Array();
		var dicecount=0;
		temp1 = new Array();
		for (i=0; i<5; i++)
		{
			if(!flag[i])
			{
				dummy = roller.push(animators[i]);
				dicecount++;
			}
		}
		for (i=0; i<5; i++)
		{
			if (!flag[i])
			{
				k = (D6.quickRandom(6));
				score[i]=k;
				dummy2 = temp1.push(k);
			}
		}
		document.getElementById("undopoints").style.visibility = "hidden";
		undoset=0;
		wcount++;
		document.getElementById("dicebutton").blur();
		CountThrow();
		if (dicecount=0) return;
		new D6AnimGroup('dice', roller, false);
		D6AnimGroup.get('dice').clear();
		D6AnimGroup.get('dice').start(temp1);
	}
	else return;
}
function startroll()
{
	new D6AnimGroup('dice', animators, false);
	D6AnimGroup.get('dice').clear();
	D6AnimGroup.get('dice').start([6,6,6,6,6]);
}
function Submit()
{
	if (endsum <= 0)
	{
		document.getElementById("knuffelform").action = 'knuffel';
	}
	else
	{
		document.getElementById("knuffelform").action = 'knuffel?mode=score';
	}
}
//
// End Knuffel
//

//
// start of the original D6-code
///////////////////////////////////////////////////////////////////////////////////////
// Copyright 2005 by Michael K. Eidson
// Licensed under the Open Software License version 2.1
//
// Please read the license before using this code in any manner.
// The license is located at http://www.opensource.org/licenses/osl-2.1.php
//
// Note that this file is considered a Source Code and a machine readable version
// of the code. Other machine readable versions of the code may be created which
// have unnecessary characters stripped out. These machine readable versions of
// the code must adhere to the license requirements for machine readable versions
// of the code, so please read the license carefully.
//
// Attribution Notice:
// Original code designed and written by Michael K. Eidson
// Visit my Eposic web site at http://eposic.org
// Eposic is a servicemark of Michael K. Eidson
///////////////////////////////////////////////////////////////////////////////////////
//
// The D6Animator class
function D6Animator(id, baseUrl, key) {
	if ((typeof id != "string") || !id) return; // allows a dummy object to be created without causing errors below.
	this.id = id;
	if ((typeof key != "string") || !key) key = id;
	D6Animator.animators[id] = this;
	if (document.getElementById) {
		var targetElem = document.getElementById('dice_'+id);
		if (!targetElem) {
			this.nope("Debug: The tag with specified id (" + id + ") was not found in the document.");
		} else {
			if (targetElem.nodeName.toLowerCase() == 'img') {
				this.useImages = true;
				this.targetImg = targetElem;
				var imageBank = D6Animator.getImageBank(key, baseUrl);
				this.blank = imageBank.blank;
				var i;
				for (i=1; i<7; ++i) {
					var whichDie = "die" + i;
					this[whichDie] = imageBank[whichDie];
				}
			} else {
				this.useImages = false;
				this.dieSpan = targetElem;
			}
		}
		this.seedMod = Math.round(Math.random() * 100);
		this.seedModInc = Math.round(Math.random() * 100) + 89;
		this.initSeed();
		this.callback = new Function("args", "return false;");
		this.args = 0;
		this.interval = 50;
		if (!this.useImages) this.interval = 10;
	} else {
		this.nope(0);
	}
}

D6Animator.animators = new Array();

D6Animator.get = function(id) {
	if (D6Animator.animators[id]) return D6Animator.animators[id];
	return new D6Animator(id);
}

D6Animator.imageBanks = new Object();

D6Animator.getImageBank = function(key, baseUrl) {
	var imageBank = D6Animator.imageBanks[key];
	if (!imageBank) {
		D6Animator.imageBanks[key] = new Object();
		imageBank = D6Animator.imageBanks[key];
		if (typeof baseUrl != "string")
		baseUrl = D6Animator.baseUrl;
		if (typeof baseUrl != "string") baseUrl = "";
		imageBank.blank = new Image();
		imageBank.blank.src = baseUrl + "blank.gif";
		var i;
		for (i=1; i<7; ++i) {
			whichDie = "die" + i;
			imageBank[whichDie] = new Object();
			imageBank[whichDie].die = new Image();
			imageBank[whichDie].die.src = baseUrl + "die-" + i + ".gif";
			imageBank[whichDie].side = new Image();
			imageBank[whichDie].side.src = baseUrl + "dices-" + i + ".gif";
			imageBank[whichDie].top = new Image();
			imageBank[whichDie].top.src = baseUrl + "dicet-" + i + ".gif";
		}
	}
	return imageBank;
}

D6Animator.prototype.setInterval = function(interval) {
	if (!interval) {
		if (this.useImages)
		interval = 50;
		else
		interval = 10;
	}
	this.interval = interval;
}

D6Animator.prototype.setCallback = function(callback, args) {
	if (typeof callback != 'function')
	return this.nope("Debug: The first argument to the setCallback method of the D6Animator class must be of type 'function'.");
	this.callback = callback;
	this.args = args;
}

D6Animator.prototype.start = function(result) {
	if (!result || result < 1 || result > 6) result = this.randomBaseOne(6);
	var sequence = new Array();
	var state = "top";
	if (this.random(2) == 1) state = "side";
	var seqCount = this.random(3) + this.random(3) + this.random(3) + 2;
	if (!this.useImages) seqCount += 2;
	var thisRoll = 0;
	var i=0;
	for ( ; i<seqCount; ++i) {
		thisRoll += this.randomBaseOne(5);
		thisRoll = thisRoll % 6;
		if (!thisRoll) thisRoll = 6;
		sequence[i] = thisRoll;
	}
	sequence[i] = result;
	this.result = result;
	this.animate(sequence, state);
}

D6Animator.prototype.animate = function(sequence, state) {
	if (!sequence) return nope("Debug: The sequence passed to the animate method of D6Animator was invalid.");
	if (typeof sequence != 'object') {
		return nope("Debug: The sequence passed to the animate method of D6Animator was invalid.");
	}
	var numNumbers = sequence.length;
	if (!numNumbers || numNumbers < 1)
	return nope("Debug: The sequence passed to the animate method of D6Animator contained no values.");
	if (state != 'top' && state != 'side') state = 'die';
	this.showImg(sequence[0], state);
	var ind = 0;
	if (state == 'die') {
		if (numNumbers == 1) {
			window.setTimeout("D6Animator.callAnimatorCallback('" + this.id + "')", this.interval);
			return true;
		}
		state = "side";
		if (this.random(2) == 0) state = "top";
		ind = 1;
	} else {
		state = "die";
	}
	var nextCall = "D6Animator.animate('" + this.id + "', ['" + sequence[ind];
	for (var i=ind+1; i<numNumbers; ++i) {
		nextCall += "','" + sequence[i];
	}
	nextCall += "'], '" + state + "')";
	window.setTimeout(nextCall, this.interval);
}

D6Animator.callAnimatorCallback = function(id) {
	var animator = D6Animator.animators[id];
	if (animator && (typeof animator == "object") && (typeof animator.callback == "function"))
	animator.callback(animator.args);
}

D6Animator.animate = function(id, sequence, state) {
	var animator = D6Animator.animators[id];
	if (animator && (typeof animator == "object") && (typeof animator.animate == "function"))
	animator.animate(sequence, state);
}

D6Animator.prototype.showImg = function(number, state) {
	if (number < 1 || number > 6 || !state) {
		if (this.useImages) {
			this.targetImg.src = this.blank.src;
		} else {
			this.dieSpan.innerHTML = "";
		}
		return;
	}
	if (this.useImages) {
		var whichDie = "die" + number;
		var dieObj = this[whichDie];
		if (!dieObj) return this.nope("Debug: The specified number (" + number + ") is not a valid number for the D6Animator.");
		var dieImg = dieObj[state];
		if (!dieImg) return this.nope("Debug: The specified state (" + state + ") is not a valid state for the D6Animator.");
		this.targetImg.src = dieImg.src;
	} else {
		this.dieSpan.innerHTML = "[" + number + "]";
	}
}

D6Animator.prototype.clear = function() {
	this.showImg(0, false);
}

D6Animator.prototype.nope = function(msg) {
	if (msg) {
		alert(msg + "\n\n(If you're not the developer for this application, please contact the owner of this website!)");
	} else {
		alert("Either your browser can't handle this application, or there's a bug.\nEither way, you're out of luck right now.\nIf you think this is a bug, please contact the owner of this site!");
	}
	return false;
}

D6Animator.prototype.randomBaseOne = function(n) {
	var m = this.random(n);
	return m+1;
}

D6Animator.prototype.random = function(n) {
	if (!this.seed) this.reInitSeed();
	this.seed = (0x015a4e35 * this.seed) % 0x7fffffff;
	return (this.seed >> 16) % n;
}

D6Animator.prototype.initSeed = function() {
	var now = new Date();
	this.seed = (this.seedMod + now.getTime()) % 0xffffffff;
}

D6Animator.prototype.reInitSeed = function() {
	this.seedMod += this.seedModInc;
	this.initSeed();
}

// The D6AnimGroup class
function D6AnimGroup(id, animators, isSequenced) {	// The animators argument is an array of D6Animator and/or D6AnimGroup objects.
	if ((typeof id != "string") || !id) return; // allows a dummy object to be created without causing errors below.
	this.id = id;
	D6AnimGroup.animgroups[id] = this;
	this.animators = animators;
	this.length = animators.length;
	this.callback = new Function("args", "return false;");
	this.args = 0;
	this.isSequenced = isSequenced;
}

D6AnimGroup.animgroups = new Array();

D6AnimGroup.get = function(id) {
	return D6AnimGroup.animgroups[id];
}

D6AnimGroup.prototype.start = function(results) {
	this.results = this.genMissingResults(results);
	this.completions = new Array();
	var i;
	for (i=0; i<this.length; ++i) {
		var args = {'id': this.id, 'index' : i};
		this.animators[i].setCallback(D6AnimGroup.animgroupCallback, args);
		this.completions[i] = 0;
	}
	for (i=0; i<this.length; ++i) {
		if (!i || !this.isSequenced) {
			this.animators[i].start(this.results[i]);
		}
	}
}

D6AnimGroup.prototype.genMissingResults = function(results) {
	if (!results) results = [];
	for (var i=0; i<this.length; ++i) {
		if (!results[i]) {
			if (this.animators[i].randomBaseOne) {
				results[i] = this.animators[i].randomBaseOne(6);
			} else if (this.animators[i].genMissingResults) {
				results[i] = this.animators[i].genMissingResults();
			} else {
				results[i] = 0;
			}
			this.animators[i].result = results[i];
		}
	}
	//	for (var c=results.length; c<this.length; ++c) {
	//		if (this.animators[c].randomBaseOne) {
	//			results[c] = this.animators[c].randomBaseOne(6);
	//		} else if (this.animators[c].genMissingResults) {
	//			results[c] = this.animators[c].genMissingResults();
	//		} else {
	//			results[c] = 0;
	//		}
	//		this.animators[c].result = results[c];
	//	}
	return results;
}

D6AnimGroup.prototype.clear = function() {
	for (var i=0; i<this.length; ++i) {
		this.animators[i].clear();
	}
}

D6AnimGroup.prototype.setCallback = function(callback, args) {
	if (typeof callback != 'function')
	return alert("Debug: The first argument to the setCallback method of the D6AnimGroup class must be of type 'function'.");
	this.callback = callback;
	this.args = args;
}

D6AnimGroup.prototype.notify = function(args) {
	var whichAnim = args.index;
	this.completions[whichAnim]++;
	var numNonZero = 0;
	for (var i=0; i<this.length; ++i) {
		if (this.completions[i])
		numNonZero++;
	}
	if (numNonZero == this.length) {
		this.callback(this.args);
	} else if (this.isSequenced) {
		this.animators[1 + whichAnim].start(this.results[1 + whichAnim]);
	}
}

D6AnimGroup.animgroupCallback = function(args) {
	var id = args.id;
	var animGroup = D6AnimGroup.animgroups[id];
	if (!animGroup) return false;
	animGroup.notify(args);
}

// The D6AnimBuilder class
function D6AnimBuilder(id, results, locations, baseUrl, groupsize, interval, useImages) {
	if (!id) return; // allows a dummy object to be created without causing errors
	this.id = id;
	D6AnimBuilder.animBuilders[id] = this;
	this.results = results;
	if (!locations || (typeof locations != 'object') || !locations.length) locations = new Array();
	for (var c=locations.length; c<results.length; ++c) {
		locations[c] = "die" + (c+1);
	}
	this.locations = locations;
	if (!baseUrl) baseUrl = "";
	this.baseUrl = baseUrl;
	this.groupsize = groupsize;
	this.numGroups = Math.floor(results.length / groupsize);
	this.interval = interval;
	this.useImages = useImages;
	this.callback = null;
	this.callbackData = null;
}

D6AnimBuilder.animBuilders = new Array();

D6AnimBuilder.get = function(id) {
	return D6AnimBuilder.animBuilders[id];
}

D6AnimBuilder.prototype.reset = function() {
	var i;
	for (i=0; i<this.results.length; ++i) {
		this.results[i] = 0;
	}
	for (i=0; i<this.layout.length; ++i) {
		var dieSpan = document.getElementById("sidebar_" + i);
		dieSpan.innerHTML = "";
	}

}

D6AnimBuilder.prototype.genDiceHtml = function(layout, callback, callbackData) {
	this.layout = layout;
	this.callback = callback;
	this.callbackData = callbackData;
	var dieCount = 0;
	var genHtml = "";
	var numTotalImgs = this.groupsize * this.numGroups;
	for (var i=0; i<layout.length; ++i) {
		if (dieCount >= numTotalImgs) break;
		genHtml += "<div id='" + this.id + "_diceGroup_" + i + "' class='diceGroup'>";
		var imgsThisRow = layout[i] * this.groupsize;
		for (var j=0; j<imgsThisRow; ++j) {
			++dieCount;
			if (dieCount > numTotalImgs) break;
			if (this.useImages) {
				genHtml += "<img id='" + this.id + dieCount + "' class='die' src='" + this.baseUrl + "blank.gif' />";
			} else {
				genHtml += "<span id='" + this.id + dieCount + "' class='dieNumber'>&nbsp;</span> ";
			}
		}
		genHtml += " <span id='sidebar_" + i + "' class='sidebar'></span>";
		genHtml += "</div>\n";
	}
	return genHtml;
}

D6AnimBuilder.prototype.start = function() {
	D6Animator.baseUrl = this.baseUrl;
	var animGroups = new Array();
	var resultsGroups = new Array();
	var dieCount = 0;
	for (var i=0; i<this.numGroups; ++i) {
		var animators = new Array();
		var resultsGroup = new Array();
		for (var j=0; j<this.groupsize; ++j) {
			++dieCount;
			animators[j] = new D6Animator(this.id + dieCount);
			animators[j].setInterval(this.interval);
			resultsGroup[j] = this.results[i*this.groupsize + j];
			if (!resultsGroup[j]) {
				resultsGroup[j] = animators[j].randomBaseOne(6);
				this.results[i*this.groupsize + j] = resultsGroup[j];
			}
		}
		animGroups[i] = new D6AnimGroup(this.id + "_" + i, animators, false);
		resultsGroups[i] = resultsGroup;
	}
	this.animGroups = animGroups;
	this.resultsGroups = resultsGroups;

	var animTopGroup = new D6AnimGroup(this.id, this.animGroups, true);
	if (this.callback)
	animTopGroup.setCallback(this.callback, this.callbackData);
	animTopGroup.start(this.resultsGroups);
}

// A class with some sample callbacks for D6AnimBuilder as class methods

function D6Sample() {}

D6Sample.showTotals = function(id) {
	var animBuilder = D6AnimBuilder.animBuilders[id];
	var results = animBuilder.results;
	var layout = animBuilder.layout;
	var numTotals = layout.length;
	var dieCount = -1;
	for (var i=0; i<numTotals; ++i) {
		var numInRow = layout[i] * animBuilder.groupsize;
		var rowTotal = 0;
		for (var j=0; j<numInRow; ++j) {
			rowTotal += results[++dieCount];
		}
		var dieSpan = document.getElementById("sidebar_" + i);
		dieSpan.innerHTML = "&nbsp;= " + rowTotal;
	}
}

D6Sample.noop = function() { return; }

// Below is the high level dice roller code, which is much simpler
// to use than all the low level stuff above. Of course, using
// the low level stuff gives you a lot more flexibility in what
// you do, but the following D6 class will still allow you
// to do quite a lot.

function D6() {}

D6.dice = function(numDice, callback, callbackData, useImages, buttonLabel) {
	if (typeof useImages == "undefined") useImages = true;
	if (!buttonLabel) buttonLabel = "Roll Dice";
	if (!numDice) numDice = 1;
	if (numDice < 1) numDice = 1;
	D6.numDice = numDice;
	D6.numDiceShown = numDice;
	var results = new Array();
	var i;
	for (i=0; i<numDice; ++i) {
		results[i] = 0;
	}
	var builder = new D6AnimBuilder("dice", results, null, D6.baseUrl, numDice, 50, useImages);
	D6.builder = builder;
	var layout = [1];
	if (!callback) callback= D6Sample.noop;
	if (!callbackData) callbackData = null;
	var middleManData = {
		"id" : "dice",
		"callback" : callback,
		"callbackData" : callbackData
	};
	var genHtml = "<div id='diceall'>" + builder.genDiceHtml(layout, D6.middleManCallback, middleManData);
	if (buttonLabel != "none") {
		genHtml += "<div id='diceform'><form><input type='button' id='dicebutton' value='" + buttonLabel + "' onclick='D6AnimBuilder.get(\"dice\").reset(); D6AnimBuilder.get(\"dice\").start()' /></form></div>";
	}
	genHtml += "</div>";
	D6.genHtml = genHtml;
	document.write(genHtml);
}

D6.roll = function() {
	D6AnimBuilder.get("dice").reset();
	D6AnimBuilder.get("dice").start();
}

D6.baseUrl = "";

D6.setBaseUrl = function(baseUrl) {
	D6.baseUrl = baseUrl;
}

D6.setButtonLabel = function(buttonLabel) {
	var button = document.getElementById('dicebutton');
	if (!button) return;
	if (!buttonLabel) buttonLabel = "Roll Dice";
	if (buttonLabel == "none") {
		button.style.visibility = "hidden";
	} else {
		button.style.visibility = "";
		button.value = buttonLabel;
	}
}

D6.middleManCallback = function(middleManData) {
	var callback = middleManData.callback;
	if (typeof callback != "function") {
		return;
	}
	var id = middleManData.id;
	var callbackData = middleManData.callbackData;
	var animBuilder = D6AnimBuilder.animBuilders[id];
	var results = animBuilder.results;
	var resultsTotal = 0;
	var i;
	for (i=0; i<D6.numDiceShown; ++i) {
		resultsTotal += results[i];
	}
	callback(resultsTotal, callbackData, results);
}

D6.quickRandom = function(base) {
	var baseInt = parseInt(base);
	if (baseInt < 2) return 1;
	return 1 + Math.floor(Math.random() * 698377680) % baseInt;
}

D6.diceToShow = function(numDice) {
	if (!numDice) numDice = 0;
	if (numDice < 0) numDice = 0;
	if (numDice > D6.numDice) numDice = D6.numDice;
	if (numDice == D6.numDiceShown) return;
	var i;
	var dieElem;
	for (i=1; i<=numDice; ++i) {
		dieElem = document.getElementById('dice' + i);
		if (dieElem) dieElem.style.visibility = "";
	}
	for ( ; i<=D6.numDice; ++i) {
		dieElem = document.getElementById('dice' + i);
		if (dieElem) dieElem.style.visibility = "hidden";
	}
	D6.numDiceShown = numDice;
}
