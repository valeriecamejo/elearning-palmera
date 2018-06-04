  var hoy  = new Date();
  var dd   = hoy.getDate();
  var mm   = hoy.getMonth() + 1; //hoy es 0!
  var yyyy = hoy.getFullYear();

  if (dd < 10) {
    dd = '0' + dd
  }

  if (mm < 10) {
    mm = '0' + mm
  }
  var startDate = mm + '/' + dd + '/' + yyyy;
  Vue.component('datepicker', {
    template: '#datepicker-template',
    props: ['value'],

    mounted: function () {
      var self = this;
      $(self.$el)
        .datepicker({ minDate: startDate, value: startDate }) // init datepicker
        .trigger('change')
        .on('change', function () { // emit event on change.
          self.$emit('input', this.value);
        })
    },

    watch: {
      value: function (value) {
        $(this.$el).val(value);
      }
    },

    destroyed: function () {
      $(this.$el).datepicker('destroy');
    }
  })

  var app = new Vue({
    el: '#app',
    template: '#demo-template',

    data: {
      value: hoy
    }
  })