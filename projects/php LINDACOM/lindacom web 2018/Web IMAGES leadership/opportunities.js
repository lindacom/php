function initOpportunities(){


}



function createOpportunitiesListing(){

  var sStandardHandlebarsURL = '/_assets/content/template-includes/handlebars/opportunity_basic_default';

  $.ajax({
    url:  sStandardHandlebarsURL,
    type:'GET',
    success: function(data){
      var html = jQuery.parseHTML(data,  true);
      var hOpportunityTemplateSource = html[0].innerHTML;  //this  bypasses  the surrounding  script  tags and gets  the div which forms the handlebar template. 

      var hOpportunityTemplate  = Handlebars.compile(hOpportunityTemplateSource);

      //we  now have a template! so create  the listing..... 

      buildOpportunitiesListing(hOpportunityTemplate)    
    }
  });  
}

function buildOpportunitiesListing(hOpportunityTemplate){   
  var sBaseAjaxURL = '//search.gre.ac.uk/s/search.json?';

  $('.gre-opportunities-listing').each(function(i){
    var sID = 'opportunities-listing-' + i; 
    $(this).attr('id', sID);
    var sOpportunityTags = '';
    var aOpportunityTags  = $(this).data('filter').split('?');

    if ($(this).hasClass('gre-grid')){ 
      var sCustomTemplate = '//www.gre.ac.uk/admin/test-pages/news-Opportunities/home/handlebars/gre-grid/';   
        //console.log('sCustomTemplate = ' + sCustomTemplate );
      }

      if ($(this).attr('data-handlebars')){
        var sCustomTemplate = $(this).data('handlebars');

      }

    //console.log('sCustomTemplate = ' + sCustomTemplate );


    /* optional arguments */

    var lstExcludeIDs = $(this).data('excludeids');


    if (typeof  lstExcludeIDs  !== typeof undefined && lstExcludeIDs  !==  false){
      var aExcludeIDs = lstExcludeIDs.toString().split(',');
    } else {
      var aExcludeIDs = [];
    }

    var nMaxRows = $(this).data('max');

    if (typeof  nMaxRows  !== typeof undefined && nMaxRows  !==  false){
      var nRowsToGet = nMaxRows + aExcludeIDs.length
    } else {
      nMaxRows = 300;
      var nRowsToGet = nMaxRows;
    }


    if(aOpportunityTags.length ==  1){
      var sOpportunityTags  = 'collection=Opportunities&num_ranks=' + nRowsToGet + '&query=%21padrenull&fmo=1&' + $(this).data('filter');
    } else {
      var sOpportunityTags  = aOpportunityTags[1];
    }

    var sAjaxURL = sBaseAjaxURL  + sOpportunityTags;

    $.ajax({
      url:  sAjaxURL,
      type:'GET',

      success:  function(data){
        var aOpportunities = data.response.resultPacket.results;

        var hCustomOpportunityTemplate = hOpportunityTemplate;

        //custom  template?  

        if (typeof  sCustomTemplate  !== typeof undefined && sCustomTemplate  !==  false){
          $.ajax({
            url: sCustomTemplate,
            type:'GET',
            success:  function(data){ 
              var html  = jQuery.parseHTML(data, true);
              var hOpportunityTemplateSource  = html[0].innerHTML; //this  bypasses the surrounding script  tags and gets the div which forms the handlebar template.    

              var hCustomOpportunityTemplate = Handlebars.compile(hOpportunityTemplateSource);

              //custom template?

              processOpportunities(sID, aOpportunities,  hCustomOpportunityTemplate, aExcludeIDs, nMaxRows);

            }
          });  


        } else {

          processOpportunities(sID, aOpportunities, hCustomOpportunityTemplate, aExcludeIDs, nMaxRows);
        }


      }
    });
});
}




if($('.gre-opportunities-listing').length){
  createOpportunitiesListing();
}




// add Handlebar helper to replace white space with underscore

Handlebars.registerHelper('replace', function( find, replace, options) {
  var string = options.fn(this);
  return string.replace( find, replace );
});

function createOpportunityListing(){
  var sStandardHandlebarsURL  = '/_assets/content/template-includes/handlebars/opportunity_basic_default/';

  $.ajax({
    url: sStandardHandlebarsURL,
    type:'GET',
    success:  function(data){

      var html  = jQuery.parseHTML(data, true);
      var  hOpportunityTemplateSource = html[0].innerHTML;  //this bypasses  the  surrounding script tags  and gets the div which forms the handlebar template. 

      var hOpportunityTemplate = Handlebars.compile(hOpportunityTemplateSource);

      //we now have a template!  so  create  the listing

      buildOpportunityListing(hOpportunityTemplate);
    }
  });
}



function processOpportunities(sID, aOpportunities, hCustomOpportunityTemplate){
  $('#' + sID).html('');

  for(sKey  in aOpportunities){

    var sSearchString = aOpportunities[sKey].title + ' ' + aOpportunities[sKey].metaData.G ;



    var  context = {
      oppname:  aOpportunities[sKey].title,
      opptags:  aOpportunities[sKey].metaData.G,
      opplocation: aOpportunities[sKey].metaData.e,
      oppcategory: aOpportunities[sKey].metaData.b,
      oppthumbnail: aOpportunities[sKey].metaData.B,
      oppcompany: aOpportunities[sKey].metaData.L,
      oppaudience: aOpportunities[sKey].metaData.l,
      oppaudiencekey: aOpportunities[sKey].metaData.O,
      oppthemekey: aOpportunities[sKey].metaData.I,
      oppdesc: aOpportunities[sKey].metaData.c,
      opptype: aOpportunities[sKey].metaData.i,
      oppsubject: aOpportunities[sKey].metaData.J,
      opplink:  aOpportunities[sKey].liveUrl,
      oppjets: sSearchString.toLowerCase()


    };  

    var opportunityBox = hCustomOpportunityTemplate(context);

    $('#' + sID).append(opportunityBox);

  }

  $('.gre-opportunities-listing').append('<div class=\"gre-opportunity-sorry hidden\"><p>Sorry, there are currently no opportunities in the <span class="custom-opportunities-sorry-category"></span> category.</p></div>');

    if ($('#keywords').length > 0) {
       //build jets

       var jets = new Jets({
        searchTag: '#keywords',
        contentTag: '.jets-entry',
        didSearch: function(search_phrase){
           // ADDITIONAL OPTIONS FOR NO RESULTS MESSAGE

      }  
    });

}


if ($('.gre-related-opportunity').length > 0) {
  if ($('.gre-related-opportunity .gre-list-group').length > 0 ) {
    $('.gre-related-opportunity-header').removeClass('hidden');
  }

}


     }


  

//on select change, filter by campus

$( ".opportunities-filter" ).change(function() {
var staffCategoryRaw = $(this).find(':selected').text();
var staffCategory = staffCategoryRaw.toLowerCase();

$('.gre-opportunity-listing').addClass("hidden");

//THESE VALUES ARE TRIGGERED ON THE GWES INTERNSHIPS LISTINGS



if ($(this).find(':selected').val() == 'ah'){
  $('.Avery_Hill').removeClass("hidden");
}
if ($(this).find(':selected').val() == 'gr'){
  $('.Greenwich').removeClass("hidden");
}
if ($(this).find(':selected').val() == 'me'){
  $('.Medway').removeClass("hidden");
}


//THESE VALUES ARE TRIGGERED BY THE STUDENT DEVELOPMENT OPPORTUNITIES

if ($(this).find(':selected').val() == 'cpd'){
  $('.cpd').removeClass("hidden");
}
if ($(this).find(':selected').val() == 'study_day'){
  $('.study_day').removeClass("hidden");
}

//THESE VALUES ARE TRIGGERED ON THE STAFF DEVELOPMENT SITE

if ($(this).find(':selected').val() == 'staff-academic'){
  $('.staff-academic').removeClass("hidden");
}
if ($(this).find(':selected').val() == 'staff-management'){
  $('.staff-management').removeClass("hidden");
}
if ($(this).find(':selected').val() == 'staff-new'){
console.log("selected");
  $('.staff-new').removeClass("hidden");
}
if ($(this).find(':selected').val() == 'staff-temp'){
  $('.staff-temp').removeClass("hidden");
}
if ($(this).find(':selected').val() == 'staff-prof'){
  $('.staff-prof').removeClass("hidden");
}
if ($(this).find(':selected').val() == 'staff-postgrad'){
  $('.staff-postgrad').removeClass("hidden");
}

// RETURN ALL VALUES TO VISIBLE
if ($(this).find(':selected').val() == 'all'){
  $('.gre-opportunity-listing').removeClass("hidden");
}
  if($('.gre-opportunity-sorry').length){
    bHasVisibleOpportunities = false;
 $( ".gre-opportunity-listing" ).each(function( index ) {
        if($(this).is(':visible')){
          bHasVisibleOpportunities = true;
        }
      });

      if(!bHasVisibleOpportunities){
        $('.custom-opportunities-sorry-category').text(staffCategory);
        $('.gre-opportunity-sorry').removeClass('hidden');

      }
    }
});




