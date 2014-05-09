var Accesos = {
  
  init: function(username) {
    var self = this;
    self.username = username;
    
    self.setupAccesos();
  },
  
  setupAccesos: function() {
    var self = this;
    
    $('a.accion').on('ajax:before', function() {
      var $this = $(this);
      var $res  = $this.closest("tr").find(".resultado");
      $this.data('params', { user: self.username, producto: $this.data('producto') });
      $res.removeClass("text-error text-success").text("Procesando...").show();
    });
    
    $('a.accion').on('ajax:success', function(uno, dos, tres) {
      var $this = $(this);
      var $res  = $this.closest("tr").find(".resultado");
      
      $res.hide().removeClass("text-error").addClass("text-success").text("Éxito").show();
    });
    
    $('a.accion').on('ajax:error', function(evt, xhr, statusText) {
      var $this = $(this);
      var $res  = $this.closest("tr").find(".resultado");
      
      $res.hide().removeClass("text-success").addClass("text-error").text("Error: "+xhr.statusText).show(100);
    });
    
    
  }
};