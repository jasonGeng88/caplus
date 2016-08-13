/**
 * Created by jason-geng on 3/26/16.
 */
//var api = 'http://www.localca.com/?page_id=146';

var latestPage = 1;//add more page

var articlePage = 1;//add more page

var articleApi = 'articleAct';
var questionApi = 'questionAct';
var searchApi = 'searchAct';

function createApi(action, data, callback){
    var url = api + '&func='+action;
    if (data != undefined){
        for (var key in data){
            url += '&' + key + '=' + data[key];
        }
    }
    //return url;
    jQuery.get(url, callback);
}

function addMoreForTag(type){
    i+=articlePage;
    var cat_id = jQuery("input[name='cat_id']").val();
    var url = api + '&func='+articleApi+'&cat_id='+cat_id+'&offset='+i+'&page='+articlePage;
    jQuery.get(url, function(result){
        result = JSON.parse(result);
        if(result.today.length == 0 && result.yesterday.length == 0 && result.week.length == 0 && result.long.length == 0) {
            jQuery(".btn-more").css("display", "none");
        }

        if (result.today.length > 0){
            var html = joinHtmlForTag(result.today, type, "today");
            jQuery(".today ul").append(html);
        }
        if (result.yesterday.length > 0){
            var html = joinHtmlForTag(result.yesterday, type, "yesterday");
            jQuery(".yesterday ul").append(html);
        }
        if (result.week.length > 0){
            var html = joinHtmlForTag(result.week, type, "week");
            jQuery(".week ul").append(html);
        }
        if (result.long.length > 0){
            var html = joinHtmlForTag(result.long, type, "long");
            jQuery(".long ul").append(html);
        }

        if (jQuery(".today ul li").length > 0)
            jQuery(".today").css("display", "block");
        if (jQuery(".yesterday ul li").length > 0)
            jQuery(".yesterday").css("display", "block");
        if (jQuery(".week ul li").length > 0)
            jQuery(".week").css("display", "block");
        if (jQuery(".long ul li").length > 0)
            jQuery(".long").css("display", "block");
    });
};
function joinHtmlForTag(obj, type, timeType){
    var html = '';
    if(type == "japan"){
        for(var j=0; j < obj.length; j++){
            html += '<li>';
            html += '<div class="col-md-12 item"> <div class="col-md-8 item-content"> <div class="item-thumbnail">';
            html += obj[j].thumbnail;
            html += '</div> <div class="item-title"> <a class="yellow" href="'+obj[j].url+'">';
            html += obj[j].post_title;
            html += '</a></div> </div> <div class="col-md-4 item-tag">';
            for(var x=0; x < obj[j].tags.length; x++){
                html += '<span>'+ obj[j].tags[x].name + '</span>';
            }
            html += '</div></div>';
            html += '</li>';
        }
    }else if(type == "tokyo"){
        for(var j=0; j < obj.length; j++){
            html += '<li class="col-md-6">';
            html += '<div class="col-md-12 item">';
            var liNum = jQuery("."+timeType+" ul > li").length;
            console.log(liNum);
            if (liNum%2 == 0){
                html += '<div class="item-content odd">';
            }else{
                html += '<div class="item-content even">';
            }

            html += '<div class="item-thumbnail">';
            html += obj[j].thumbnail;
            html += '</div> <div class="item-title"> <a class="yellow" href="'+obj[j].url+'">';
            html += obj[j].post_title;
            html += '</a></div> </div> <div class="col-md-4 item-tag">';
            for(var x=0; x < obj[j].tags.length; x++){
                html += '<span>'+ obj[j].tags[x].name + '</span>';
            }
            html += '</div></div>';
            html += '</li>';
        }
    }else if(type == "exhibition"){
        for(var j=0; j < obj.length; j++){
            html += '<li class="col-md-3">';
            html += '<div class="col-md-12 item"> <div class="item-content"> <div class="item-thumbnail">';
            html += obj[j].thumbnail;
            html += '</div> <div class="item-title"> <a class="yellow" href="'+obj[j].url+'">';
            html += obj[j].post_title;
            html += '</a></div> </div> <div class="col-md-4 item-tag">';
            for(var x=0; x < obj[j].tags.length; x++){
                html += '<span>'+ obj[j].tags[x].name + '</span>';
            }
            html += '</div></div>';
            html += '</li>';
        }
    }

    return html;
}

function search(){
    jQuery(".thumbnail-search").css("display", "none");
    jQuery("#top-search .form.ca-pc").css("display", "block");
}

function search_close(){
    jQuery("#top-search .form.ca-pc").css("display", "none");
    jQuery(".thumbnail-search").css("display", "block");
}


//portfolio hover
function ca_portfolio(){
    jQuery(".ca-portfolio").mouseover(function(){
        jQuery(this).children(".name").children("a").css("background", "#FFFF00")
    });
    jQuery(".ca-portfolio").mouseout(function(){
        jQuery(this).children(".name").children("a").css("background", "#ffffff")
    });
    jQuery(".article-items .item .content").mouseover(function(){
        jQuery(this).css("box-shadow", "0 4px 4px 0 rgba(0, 0, 0, 0.1)");
    });
    jQuery(".article-items .item .content").mouseout(function(){
        jQuery(this).css("box-shadow", "0 2px 2px 0 rgba(0, 0, 0, 0.1)");
    });
}

//	mobile
function openMaskMenu(){
    jQuery("html").css("overflow", "hidden");
    jQuery(".ca-mask").css("display", "block");
    jQuery(".m-menu-contain").css("display", "block");
    jQuery(".m-search-contain").css("display", "none");
    jQuery(".ca-mask").css("top", jQuery(window).scrollTop() + "px");
}

function openMaskSearch(){
    jQuery("html").css("overflow", "hidden");
    jQuery(".ca-mask").css("display", "block");
    jQuery(".m-menu-contain").css("display", "none");
    jQuery(".m-search-contain").css("display", "block");
    jQuery(".ca-mask").css("top", jQuery(window).scrollTop() + "px");
}
function closeMask(){
    jQuery("html").css("overflow", "auto");
    jQuery(".ca-mask").css("display", "none");
    jQuery(".m-menu-contain").css("display", "none");
    jQuery(".m-search-contain").css("display", "none");
}

function openUniversityContent(){
    console.log("openUniversityContent")
    jQuery("html").css("overflow", "hidden");
    jQuery(".university-des-mask").css("display", "block");
    jQuery(".university-des-mask").css("top", jQuery(window).scrollTop() + "px");
}

//mobile select
function mobileSelect() {
    jQuery(".mobile-select").change(function () {
        var url = jQuery(".mobile-select").val();
        if (url == 0) return;
        window.location.href = url;
    });
}

