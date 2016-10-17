/**
 * pBar 2.0
 * pBar is a simple jQuery plugin to show inline progress bar
 *
 * Copyright 2016, Atul Gupta
 * Licensed under the MIT license.
 * https://github.com/lastdates/pBar
 *
 * Date: Sat Mar 26 2016 14:57:11 GMT+0530 (IST)
 */
(function($){

	var color,
		i,
		Color='color',
		Title='title',
		Onclick='onclick',
		This='$(this)',
		Div='<div style="background-color:',
		Width=';width:',
		Coma=',',
		Percent='%',
		css=';min-height:9px;',
		borderRadius='border-radius:3px;',
		pickColor=function(percentage){
			return color[parseInt(percentage*color.length/101)];
		};

	$.fn.pBarVal = function(to,colr){
		return this.each(function(){
			var $bar=$(this);
				color=color||(colr||$bar.data(Color)).split(Coma);

			$bar.prop(Title,to+Percent)
				.data('to',to)
				.data(Color,color.join(Coma));
			$bar.children('div')
				.width(to+Percent)
				.css("background-color",pickColor(to));
			color=0;
		});
	}

	$.fn.pBar = function(colr){
		return this.each(function(){

			var $bar=$(this),
				from=$bar.data('from'),
				to=$bar.data('to')*1;
				from=from||((to>50)?to-50:to+50);
				color=(colr||$bar.data(Color)||'#b32,#d31,#ea6,#fa6,#fd8,#ad6,#9c6,#5b6,#6a7').split(Coma);

			$bar.html(Div+pickColor(from)+Width+from+'%"></div>')
				.attr(Onclick,This+'.pBar();');

			$bar.pBarVal(to);
		});
	}

	$.fn.sBar = function(colr){
		return this.each(function(){

			var $bar=$(this),
				value=$bar.data('value').split(Coma),
				name=$bar.data('name').split(Coma),
				sum=0,
				div='',
				title='';
				
				color=(colr||$bar.data(Color)||'#F00,#F64008,#D47D2A,#E5C019,#ff0,#BDC836,#71BC42,#3BC3AC,#07b,#026,#73a').split(Coma);
				
				i=value.length; while(i--) sum += value[i]*1;
				for(i=0;i<value.length;i++){
					div+=Div+color[i]+Width+'0" data-to="'+(value[i]*100/sum)+'"></div>';
					if(value[i]*1) title+='<span class="sBarTh"><span class="sBarTv">'+value[i]+'</span>'+name[i]+' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><span class="sBarTb">'+Div+color[i]+';" class="sBarTd" data-to="'+(value[i]*100/sum)+'"></div></span>';
				}

			$bar.html(div+'<span class="sBarT">'+title+'</span>')
				.data(Color,color.join(Coma))
				.attr(Onclick,This+'.sBar();');

			$bar.find('div').each(function(){
				var $div=$(this);
				if($div.data('to')) $div.width($div.data('to')+Percent);
			});
		});
	}

	$("<style>.sBar,.pBar{display:inline-block;min-width:100%"+css+borderRadius+"border:1px solid #ccc;padding:1px;position:relative}.sBar div,.pBar div{height:100%"+css+"transition:all 1s linear 0s;box-sizing:border-box;float:left}.sBarT{text-align:left;z-index:999;height:auto;box-shadow:0 5px 10px rgba(0,0,0,.3);background:#fff;position:absolute;min-width:100%;padding:0 5px 5px;top:100%;margin-top:5px;left:50%;display:none}.sBar:hover .sBarT{display:block}.sBarTh{display:block;clear:both;overflow:hidden;white-space:nowrap}.sBarTv{float:right}.sBarTb{display:block;overflow:hidden;"+borderRadius+"background:#eee}.sBarTd{width:0;height:5px;"+borderRadius+"}</style>").appendTo("head");
	$(document).ready(function(){$('.pBar').pBar();$('.sBar').sBar();});

})(jQuery);
