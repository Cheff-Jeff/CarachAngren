import '../main';
import simpleParallax from '../plugins/simpleParallax/dist/simpleParallax.min.js';

$(document).ready(function(){
  if($(window).width() < 1050) {
    var BandMemberImg = document.getElementsByClassName('BandMemberImgJS');
    new simpleParallax(BandMemberImg, {
      scale: 1.5
    }); 
    
    var BandMemberImg = document.getElementsByClassName('newAlbumImgJS');
    new simpleParallax(BandMemberImg, {
      scale: 1.5
    });
  }  
});