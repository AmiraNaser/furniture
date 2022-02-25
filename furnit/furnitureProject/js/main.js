/************************DropDown Nav*****************************/

var iconlist = document.getElementById('iconList'),
    listt = document.querySelector('.listt'),
    iconclose = document.getElementById('iconcloselist');

iconlist.addEventListener('click', (e) => {

  listt.style.left = "0";

});
iconclose.addEventListener('click', (e) => {

  listt.style.left = "-100%";

});

/*********************Show icons in images****************************/

var figimg = document.querySelectorAll('.fig-img');

figimg.forEach(function(item){
  item.addEventListener('mouseover', (e) => {
    var figinside = item.querySelector('.fig-inside');
    figinside.classList.remove('fig-inside-show');
  });
});

figimg.forEach(function(item){
  item.addEventListener('mouseout', (e) => {
    var figinside = item.querySelector('.fig-inside');
    figinside.classList.add('fig-inside-show');
  });
});

/************************Show / hide your Bag****************************/

var cardicon = document.getElementById('cardicon'),
    iconclosebag = document.getElementById('iconclosebag'),
    cardaside = document.querySelector('.card-aside');

cardicon.addEventListener('click', (e) => {

  cardaside.style.right= "0";

});

iconclosebag.addEventListener('click', (e) => {

  cardaside.style.right= "-100%";

});

/************************************************************************/
/************************************************************************/
/************************************************************************/
function openpage(pageurl) {
  window.open(pageurl);
  }