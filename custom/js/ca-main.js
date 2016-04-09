/**
 * Created by jason-geng on 3/26/16.
 */
var api = 'http://www.localca.com/?page_id=146';

var latestPage = 1;//add more page

var articlePage = 1;//add more page

var rememberApi = 'rememberAct';
var articleApi = 'articleAct';
var questionApi = 'questionAct';

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
            var html = joinHtmlForTag(result.today, type);
            jQuery(".today ul").append(html);
        }
        if (result.yesterday.length > 0){
            var html = joinHtmlForTag(result.yesterday, type);
            jQuery(".yesterday ul").append(html);
        }
        if (result.week.length > 0){
            var html = joinHtmlForTag(result.week, type);
            jQuery(".week ul").append(html);
        }
        if (result.long.length > 0){
            var html = joinHtmlForTag(result.long, type);
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
function joinHtmlForTag(obj, type){
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