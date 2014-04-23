var Productos = {
  init: function(hash_old, hash_new, p)
  {
    var self = this;
    
    self.hashes = {"old": hash_old, "new": hash_new, "plus": p};
    self.initMoodle();
  },
  
  initMoodle: function()
  {
    var self = this;
    
//    $("#producto_moodle").on("click", function(){
//      var $this = $(this);
//      var url = 'http://social.udc.edu.ar/moodle/auth/patova.php';
//      
//      $.ajax({
//        url: url,
//        type: 'POST',
//        crossDomain: true,
//        xhrFields: {
//          withCredentials: true
//        },
//        data: self.hashes,
//        dataType: 'text',
//        contentType: 'application/x-www-form-urlencoded; charset=utf-8',
//        success: function (response) {
//            alert('exito! :D');
//        },
//        error: function () {
//            alert("error... :(");
//        }
//      });
//    });
  }
  
};