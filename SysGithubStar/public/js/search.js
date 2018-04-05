$(document).ready(function () {
    $("#searchButton").click(function(){
        var gitHubName = $("#gitHubName").val();
        var url = root + '/test/view/' + gitHubName + '/0';
        window.location = url;
    });

    $('.target-editor-twitter').markdown({
        hiddenButtons:'cmdPreview',
        footer:'<div id="twitter-footer" class="well" style="display:none;"></div><small id="twitter-counter" class="text-success">140 character left</small>',
        onChange:function(e){
            var content = e.parseContent(),
                content_length = (content.match(/\n/g)||[]).length + content.length;
    
            if (content == '') {
                $('#twitter-footer').hide()
            } else {
                $('#twitter-footer').show().html(content)
            }
    
            if (content_length > 140) {
                $('#twitter-counter').removeClass('text-success').addClass('text-danger').html(content_length-140+' character surplus.')
            } else {
                $('#twitter-counter').removeClass('text-danger').addClass('text-success').html(140-content_length+' character left.')
            }
        }
    });

 init(); 
});

function addHookToSyncButtonByStarId(id,param,fun){
    var selector = "[sync_button_star_id="+ id +"]";
    param_ = {};
    param_["star_id"] = param; 
    $(selector).click(param_,fun);
}

function getTagByStarId(id){
    var selector = "[tag_star_id=" + id +"]";
    var tag_list = $(selector).tagsinput('items');
    var re = [];
    for(var v of tag_list){
        var b = {};
        b["tag_name"] = v;
        b["star_id"] = id;
        re.push(b);
    }
    return re;
}

function addTagByStarId(id,tag){
    var selector = "[tag_star_id=" + id +"]";
    return $(selector).tagsinput('add',tag);
}

function getDescriptionByStarId(id){
    var selector = "[description_star_id=" + id +"]";
    return $(selector).val();
}

function addDescriptionByStarId(id,description){
    var selector = "[description_star_id=" + id +"]";
    return $(selector).val(description);
}

function getOwnerNameByStarId(id){
    var selector = "[owner_name_star_id=" + id +"]";
    return $(selector).html();
}

function getOwnerUrlByStarId(id){
    var selector = "[owner_name_star_id=" + id +"]";
    return $(selector).attr("href");
}

function getPartNameByStarId(id){
    var selector = "[part_name_star_id=" + id +"]";
    return $(selector).html();
}

function getPartUrlByStarId(id){
    var selector = "[part_name_star_id=" + id +"]";
    return $(selector).attr("href");
}

function getLanguageByStarId(id){
    var selector = "[language_star_id=" + id +"]";
    return $(selector).html();
}

function getLicenseByStarId(id){
    var selector = "[license_star_id=" + id +"]";
    return $(selector).html();
}

function getStarCountByStarId(id){
    var selector = "[star_count_star_id=" + id +"]";
    return $(selector).html();
}

function getStarUnitByStarId(id){
    var star_j = {};
    star_j["full_name"] = getOwnerNameByStarId(id) + '/' + getPartNameByStarId(id);
    star_j["part_name"] = getPartNameByStarId(id);
    star_j["html_url"] = getPartUrlByStarId(id);
    star_j["description"] = getDescriptionByStarId(id);
    star_j["stargazers_count"] = getStarCountByStarId(id);
    star_j["language"] = getLanguageByStarId(id);
    star_j["license"] = getLicenseByStarId(id);
    star_j["owner_url"] = getOwnerUrlByStarId(id);
    star_j["owner_name"] = getOwnerNameByStarId(id);
    return star_j;
}

function init(){
    if(star_json != null){
        for(v of star_json){
            addDescriptionByStarId(v["star_id"],v["description"]);
        }
    }

    if(tag_json != null){
        for(v of tag_json){
            addTagByStarId(v["star_id"],v["tag_name"]);
        }
    }

    if(user_id == null){
        $(".sync_button").click(function(){
            console.log("Please Login First");
        });
    }else{
        for(var v of star_json){
            var star_id = v["star_id"];
            addHookToSyncButtonByStarId(v["star_id"],star_id,function (event){
                var tag_unit = getTagByStarId(event.data.star_id);

                var star_unit = getStarUnitByStarId(event.data.star_id);
                //post to tag & star sync;
                var sync_tag_url = root + "/tag/database/sync";
                var sync_star_url = root + "/star/database/sync";

                for(var s of tag_unit){
                    $.post(sync_tag_url,s).done(function( data ) {
                        console.log("tag sync success");
                    });   
                }

                $.post(sync_star_url,star_unit).done(function( data ) {
                    console.log("star sync success");
                });
            });
        }
    }
}