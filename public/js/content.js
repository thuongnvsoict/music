var page = require('webpage').create();
var system = require('system');
var url = system.args[1];
page.settings.userAgent = 'SpecialAgent';
page.open(url, function(status){
  //console.log("Status: " + status);
    page.onLoadFinished = function() {
      var content = page.content;
      // console.log(page.getElementsByTagNam('a')[0].getAttribute("href"));

      var link = page.evaluate(function() {
        return document.getElementsByTagName('a')[0].getAttribute("href");
      });
      console.log(link);
      phantom.exit();
    }



  // if (status === "success"){
  //   page.render('example.png');
  //   console.log(page.plainText);
  // }
  // var title = page.evaluate(function() {
  //   return document.title;
  // })
  // console.log('Page title is :' + title);
  // phantom.exit();
});
