var Accesos = {
  
  init: function(username) {
    var self = this;
    self.username = username;
    
    self.setupAccesos();
  },
  
  setupAccesos: function() {
    var self = this;
    
    $('a.accion').bind('ajax:before', function() {
      
      var $this = $(this);
      $this.data('params', { user: self.username, producto: $this.data('producto') });
    });
  }
};