!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a(jQuery)}(function(a){a.fn.tweet=function(b){function e(a,b){if("string"==typeof a){var c=a;for(var d in b){var e=b[d];c=c.replace(new RegExp("{"+d+"}","g"),null===e?"":e)}return c}return a(b)}function f(b,c){return function(){var d=[];return this.each(function(){d.push(this.replace(b,c))}),a(d)}}function g(a){return a.replace(/</g,"&lt;").replace(/>/g,"^&gt;")}function h(a,b){return a.replace(d,function(a){for(var c=/^[a-z]+:/i.test(a)?a:"http://"+a,d=a,e=0;e<b.length;++e){var f=b[e];if(f.url==c&&f.expanded_url){c=f.expanded_url,d=f.display_url;break}}return'<a href="'+g(c)+'">'+g(d)+"</a>"})}function i(a){return Date.parse(a.replace(/^([a-z]{3})( [a-z]{3} \d\d?)(.*)( \d{4})$/i,"$1,$2$4$3"))}function j(a){var b=arguments.length>1?arguments[1]:new Date,c=parseInt((b.getTime()-a)/1e3,10),d="";return d=1>c?"just now":60>c?c+" seconds ago":120>c?"about a minute ago":2700>c?"about "+parseInt(c/60,10).toString()+" minutes ago":7200>c?"about an hour ago":86400>c?"about "+parseInt(c/3600,10).toString()+" hours ago":172800>c?"about a day ago":"about "+parseInt(c/86400,10).toString()+" days ago"}function k(a){return a.match(/^(@([A-Za-z0-9-_]+)) .*/i)?c.auto_join_text_reply:a.match(d)?c.auto_join_text_url:a.match(/^((\w+ed)|just) .*/im)?c.auto_join_text_ed:a.match(/^(\w*ing) .*/i)?c.auto_join_text_ing:c.auto_join_text_default}function l(){var d=(c.modpath,null===c.fetch?c.count:c.fetch),e={include_entities:1};if(c.list)return{host:c.twitter_api_url,url:"/1.1/lists/statuses.json",parameters:a.extend({},e,{list_id:c.list_id,slug:c.list,owner_screen_name:c.username,page:c.page,count:d,include_rts:c.retweets?1:0})};if(c.favorites)return{host:c.twitter_api_url,url:"/1.1/favorites/list.json",parameters:a.extend({},e,{list_id:c.list_id,screen_name:c.username,page:c.page,count:d})};if(null===c.query&&1===c.username.length)return{host:c.twitter_api_url,url:"/1.1/statuses/user_timeline.json",parameters:a.extend({},e,{screen_name:c.username,page:c.page,count:d,include_rts:c.retweets?1:0})};var f=c.query||"from:"+c.username.join(" OR from:");return{host:c.twitter_search_url,url:"/1.1/search/tweets.json",parameters:a.extend({},e,{q:f,count:d})}}function m(a,b){return b?"user"in a?a.user.profile_image_url_https:m(a,!1).replace(/^http:\/\/[a-z0-9]{1,3}\.twimg\.com\//,"https://s3.amazonaws.com/twitter_production/"):a.profile_image_url||a.user.profile_image_url}function n(b){var d={};return d.item=b,d.source=b.source,d.name=b.from_user_name||b.user.name,d.screen_name=b.from_user||b.user.screen_name,d.avatar_size=c.avatar_size,d.avatar_url=m(b,"https:"===document.location.protocol),d.retweet="undefined"!=typeof b.retweeted_status,d.tweet_time=i(b.created_at),d.join_text="auto"==c.join_text?k(b.text):c.join_text,d.tweet_id=b.id_str,d.twitter_base="http://"+c.twitter_url+"/",d.user_url=d.twitter_base+d.screen_name,d.tweet_url=d.user_url+"/status/"+d.tweet_id,d.reply_url=d.twitter_base+"intent/tweet?in_reply_to="+d.tweet_id,d.retweet_url=d.twitter_base+"intent/retweet?tweet_id="+d.tweet_id,d.favorite_url=d.twitter_base+"intent/favorite?tweet_id="+d.tweet_id,d.retweeted_screen_name=d.retweet&&b.retweeted_status.user.screen_name,d.tweet_relative_time=j(d.tweet_time),d.entities=b.entities?(b.entities.urls||[]).concat(b.entities.media||[]):[],d.tweet_raw_text=d.retweet?"RT @"+d.retweeted_screen_name+" "+b.retweeted_status.text:b.text,d.tweet_text=a([h(d.tweet_raw_text,d.entities)]).linkUser().linkHash()[0],d.tweet_text_fancy=a([d.tweet_text]).makeHeart()[0],d.user=e('<a class="tweet_user" href="{user_url}">{screen_name}</a>',d),d.join=c.join_text?e(' <span class="tweet_join">{join_text}</span> ',d):" ",d.avatar=d.avatar_size?e('<a class="tweet_avatar" href="{user_url}"><img src="{avatar_url}" height="{avatar_size}" width="{avatar_size}" alt="{screen_name}\'s avatar" title="{screen_name}\'s avatar" border="0"/></a>',d):"",d.time=e('<span class="tweet-time"><a href="{tweet_url}" title="view tweet on twitter">{tweet_relative_time}</a></span>',d),d.text=e('<span class="tweet-text">{tweet_text_fancy}</span>',d),d.reply_action=e('<a class="tweet_action tweet_reply" href="{reply_url}">reply</a>',d),d.retweet_action=e('<a class="tweet_action tweet_retweet" href="{retweet_url}">retweet</a>',d),d.favorite_action=e('<a class="tweet_action tweet_favorite" href="{favorite_url}">favorite</a>',d),d}var c=a.extend({modpath:"./includes/twitter/",username:null,list_id:null,list:null,favorites:!1,query:null,avatar_size:null,count:3,fetch:null,page:1,retweets:!0,intro_text:null,outro_text:null,join_text:null,auto_join_text_default:"i said,",auto_join_text_ed:"i",auto_join_text_ing:"i am",auto_join_text_reply:"i replied to",auto_join_text_url:"i was looking at",loading_text:null,refresh_interval:null,twitter_url:"twitter.com",twitter_api_url:"api.twitter.com",twitter_search_url:"api.twitter.com",template:"{avatar}{time}{join}{text}",comparator:function(a,b){return b.tweet_time-a.tweet_time},filter:function(){return!0}},b),d=/\b((?:[a-z][\w-]+:(?:\/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'".,<>?\xab\xbb\u201c\u201d\u2018\u2019]))/gi;return a.extend({tweet:{t:e}}),a.fn.extend({linkUser:f(/(^|[\W])@(\w+)/gi,'$1<span class="at">@</span><a href="http://'+c.twitter_url+'/$2">$2</a>'),linkHash:f(/(?:^| )[\#]+([\w\u00c0-\u00d6\u00d8-\u00f6\u00f8-\u00ff\u0600-\u06ff]+)/gi,' <a href="https://twitter.com/search?q=%23$1'+(c.username&&1==c.username.length&&!c.list?"&from="+c.username.join("%2BOR%2B"):"")+'" class="tweet_hashtag">#$1</a>'),makeHeart:f(/(&lt;)+[3]/gi,"<tt class='heart'>&#x2665;</tt>")}),this.each(function(b,d){var f=a('<ul class="tweet-list">'),g='<p class="tweet-intro">'+c.intro_text+"</p>",h='<p class="tweet-outro">'+c.outro_text+"</p>",i=a('<p class="loading">'+c.loading_text+"</p>");c.username&&"string"==typeof c.username&&(c.username=[c.username]),a(d).unbind("tweet:load").bind("tweet:load",function(){c.loading_text&&a(d).empty().append(i),a.ajax({dataType:"json",type:"post",async:!1,url:c.modpath||"/twitter/",data:{request:l()},success:function(b){b.message&&console.log(b.message);var j=b.response;a(d).empty().append(f),c.intro_text&&f.before(g),f.empty(),resp=void 0!==j.statuses?j.statuses:void 0!==j.results?j.results:j;var k=a.map(resp,n);k=a.grep(k,c.filter).sort(c.comparator).slice(0,c.count),f.append(a.map(k,function(a){return"<li>"+e(c.template,a)+"</li>"}).join("")).children("li:first").addClass("tweet-first").end().children("li:odd").addClass("tweet-even").end().children("li:even").addClass("tweet-odd"),c.outro_text&&f.after(h),a(d).trigger("loaded").trigger(k?"empty":"full"),c.refresh_interval&&window.setTimeout(function(){a(d).trigger("tweet:load")},1e3*c.refresh_interval)}})}).trigger("tweet:load")})}});