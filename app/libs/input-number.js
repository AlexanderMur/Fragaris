;(function($) {
  "use strict";
  
  function InputNumber(element) {
    this.$el = $(element);
    this.$input = this.$el.find('[type=number]');
    this.$inc = this.$el.find('[data-increment]');
    this.$dec = this.$el.find('[data-decrement]');
    this.min = this.$el.attr('min') || false;
    this.max = this.$el.attr('max') || false;
    this.init();
  }
  
  InputNumber.prototype = {
    init: function() {
      this.$dec.on('click', $.proxy(this.decrement, this));
      this.$inc.on('click', $.proxy(this.increment, this));
    },
    
    increment: function(e) {
      if(this.$input[0].disabled){
        return false
      }
      var value = this.$input[0].value;
      value++;
      if (!this.max || value <= this.max) {
        this.$input[0].value = value++;
        this.$input.trigger('change')
      }
      return false
    },
    
    decrement: function(e) {
      if(this.$input[0].disabled){
        return false
      }
      var value = this.$input[0].value;
      value--;
      if (!this.min || value >= this.min) {
        this.$input[0].value = value;
        this.$input.trigger('change')
      }
      return false
    }
  };

  $.fn.inputNumber = function(option) {
    return this.each(function () {
      var $this = $(this),
          data = $this.data('inputNumber');

      if (!data) {
        $this.data('inputNumber', (data = new InputNumber(this)));
      }
    });
  };

  $.fn.inputNumber.Constructor = InputNumber;
})(jQuery);

