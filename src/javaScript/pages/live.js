import '../main';
let txtNoShow; 

$(document).ready(function(){
  let filter = 'Upcoming';
  if($('.noShow').length > 0){
    txtNoShow = $('.noShow')[0]['innerText'];
  }

  $('.btn-filter').click(function(){
    let cat = $(this).attr('id');
    filter = $(this)[0]['innerHTML'];

    $('.btn-filter').removeClass('active');
    $(this).addClass('active');

    if (cat == 'All'){
      $('.Show').each(function (){
        if(!$(this).hasClass('active')){
          $(this).addClass('active');
        }
        else if($(this).hasClass('hide')){
          $(this).removeClass('hide');
        }  
        if($(this).hasClass('showTxt')){
          $(this).addClass('hide');
          $(this).removeClass('active');
        }    
      });
    }else{ 
      $('.Show').each(function (){
        if($(this).hasClass(cat)){
          $(this).addClass('active');
          if($(this).hasClass('hide')){
            $(this).removeClass('hide');
          }     
        }
        else{
          $(this).addClass('hide');
          if($(this).hasClass('active')){
            $(this).removeClass('active');
          } 
        }     
      });
    }
  });

  $('.more').click(function(e){ 
    e.preventDefault();

    let btn = $(this)[0]['innerHTML'];     
    loading();
    
    if(btn.includes("more")){
      loadMore(filter);
    }
    else if(btn.includes("less")){
      loadLess(filter);
    }else{
      loaded('more');
    }
  });

  $('.scrollTop').click(() => {
    $('html, body').animate({
      scrollTop: $('#topLocation').offset().top - 70
    }, 1000);
  });
}); 

const loadMore = (filter) => {
  let counter = 0;
  let xhr = new XMLHttpRequest();
  xhr.open('GET', '/src/php/functions/getAllShows.php', true);
  xhr.onload = function() {
    if(this.status == 200){
      const shows = JSON.parse(this.responseText);
      const count = shows.length;
      $('.shows')[0]['innerHTML'] = '';

      for(let i = 0; i < count; i++){
        if(shows[i]['category'] == 'Upcoming'){
          counter++;
        }
        let obj = `
          <div class="row Show ${shows[i]['category']} ${filter == 'All' ? 'active' : ''} ${filter == shows[i]['category'] ? 'active' : 'hide'}">
            <div class="col-lg-2 order-lg-1 col-md-6 order-md-1 col-12 order-1 date">
              <div class="innerDate">
                <p>${shows[i]['data']}</p>
                <p>${shows[i]['time']}</p>
              </div>
            </div>
            <div class="col-lg-2 order-lg-2 col-md-3 order-md-4 col-12 order-3 venue">
              <div class="innerVenue">
                ${shows[i]['showVenueLink'] == '' 
                ? '<p>'+ shows[i]['venue'] +'</p>' 
                : '<a href="'+ shows[i]['showVenueLink'] +'" target="_blank"><span>'+ shows[i]['venue'] + '</span></a>'}
              </div>
            </div>
            <div class="col-lg-2 order-lg-3 col-md-3 order-md-3 col-12 order-2 country">
              <div class="innerCountry">
                <p>${shows[i]['city']}</p>
                <p>${shows[i]['country']}</p>
              </div>
            </div>
            <div class="col-lg-3 order-lg-4 col-md-6 order-md-5 col-12 order-5 info">
              <div class="innerInfo">
                ${shows[i]['showMore'] == ''
                ? '<p>No more information available.</p>'
                : '<a href="'+ shows[i]['showMore'] +'" target="_blank"><p>More information</p></a>'}
              </div>
            </div>
            <div class="col-lg-3 order-lg-5 col-md-6 order-md-2 col-12 order-4 tickets">
              <div class="innerTickets">
                ${shows[i]['tickets'] != ''
                ? '<a href="'+ shows[i]['tickets'] +'" target="_blank" class="button"><span>Tickets</span></a>' 
                : '<p>No tickets available.</p>'}
              </div>
            </div>
          </div>
        `
        $('.shows')[0]['innerHTML'] += obj;
      }
      if(counter == 0){
        let noUpcomming = `
        <div class="row Show showTxt Upcoming ${filter == 'Upcoming' ? 'active' : 'hide'}">
          <div class="col-12">
              <div class="noShow">
                  <p>${txtNoShow}</p>
              </div>
          </div>
        </div>
        `;
        $('.shows')[0]['innerHTML'] += noUpcomming;
      }
      loaded('less');
      toggleScrollBtn('show');
    }
  }
  xhr.send();
  return;
}

const loadLess = (filter) => {
  let counter = 0;
  let xhr = new XMLHttpRequest();
  xhr.open('GET', '/src/php/functions/displayShows.php', true);
  xhr.onload = function() {
    if(this.status == 200){
      const shows = JSON.parse(this.responseText);
      const count = shows.length;
      $('.shows')[0]['innerHTML'] = '';

      for(let i = 0; i < count; i++){
        if(shows[i]['category'] == 'Upcoming'){
          counter++;
        }
        let obj = `
          <div class="row Show ${shows[i]['category']} ${filter == 'All' ? 'active' : ''} ${filter == shows[i]['category'] ? 'active' : 'hide'}">
            <div class="col-lg-2 order-lg-1 col-md-6 order-md-1 col-12 order-1 date">
              <div class="innerDate">
                <p>${shows[i]['data']}</p>
                <p>${shows[i]['time']}</p>
              </div>
            </div>
            <div class="col-lg-2 order-lg-2 col-md-3 order-md-4 col-12 order-3 venue">
              <div class="innerVenue">
                ${shows[i]['showVenueLink'] == '' 
                ? '<p>'+ shows[i]['venue'] +'</p>' 
                : '<a href="'+ shows[i]['showVenueLink'] +'" target="_blank"><span>'+ shows[i]['venue'] + '</span></a>'}
              </div>
            </div>
            <div class="col-lg-2 order-lg-3 col-md-3 order-md-3 col-12 order-2 country">
              <div class="innerCountry">
                <p>${shows[i]['city']}</p>
                <p>${shows[i]['country']}</p>
              </div>
            </div>
            <div class="col-lg-3 order-lg-4 col-md-6 order-md-5 col-12 order-5 info">
              <div class="innerInfo">
                ${shows[i]['showMore'] == ''
                ? '<p>No more information available.</p>'
                : '<a href="'+ shows[i]['showMore'] +'" target="_blank"><p>More information</p></a>'}
              </div>
            </div>
            <div class="col-lg-3 order-lg-5 col-md-6 order-md-2 col-12 order-4 tickets">
              <div class="innerTickets">
                ${shows[i]['tickets'] != ''
                ? '<a href="'+ shows[i]['tickets'] +'" target="_blank" class="button"><span>Tickets</span></a>' 
                : '<p>No tickets available.</p>'}
              </div>
            </div>
          </div>
        `
        $('.shows')[0]['innerHTML'] += obj;
      }
      if(counter == 0){
        let noUpcomming = `
        <div class="row Show showTxt Upcoming ${filter == 'Upcoming' ? 'active' : 'hide'}">
          <div class="col-12">
              <div class="noShow">
                  <p>${txtNoShow}</p>
              </div>
          </div>
        </div>
        `;
        $('.shows')[0]['innerHTML'] += noUpcomming;
      }
      loaded('more');
      toggleScrollBtn('hide');
    }
  }
  xhr.send();
  return;
}

const loading = () => {
  $('.btnLoading')[0]['innerHTML'] = `<div class="loader"><div></div><div></div><div></div><div></div></div>`;
  return;
}

const loaded = (txt)=> {
  $('.btnLoading')[0]['innerHTML'] = `Load ${txt}`;
  return;
}

const toggleScrollBtn = (option) => {
  let btn = $('.scrollTop');
  if(option == 'hide'){
    if(!btn.hasClass('hidden')){
      btn.addClass('hidden');
    }
  }
  else if(option == 'show'){
    if(btn.hasClass('hidden')){
      btn.removeClass('hidden');
    }
  }
}