//
function shrift(font_size)
{
    $('h1').css('font-size',font_size+'px');
    $('h2').css('font-size',font_size-2+'px');
    $('h3').css('font-size',font_size-3+'px');
    $('h4').css('font-size',font_size-4+'px');
    $('h5').css('font-size',font_size-5+'px');
    $('h6').css('font-size',font_size-6+'px');

    $('p').css('font-size',font_size-10+'px');
    $('a').css('font-size',font_size-10+'px');
    $('li').css('font-size',font_size-10+'px');
    $('li a').css('font-size',font_size-10+'px');
    $('span').css('font-size',font_size-10+'px');
    //$('body').css('font-size',font_size+'px');
}

//
function cvet(color,text)
{
    $('div').css('background-color',color);
    $('ul').css('background-color',color);
    $('div').css('color',text);

    $('h1').css('color',text);
    $('h2').css('color',text);
    $('h3').css('color',text);
    $('h4').css('color',text);
    $('h5').css('color',text);
    $('h6').css('color',text);
    $('li>a').css('color',text);
    $('p').css('color',text);
    $('a').css('color',text);
    $('span').css('color',text);

}