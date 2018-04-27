var question = new Vue({
	el: '#question',
	data: {
    type_question_id: '',
    fields: 1,
    limit: 5,
    correct: [],
  },
  methods: {
    addField: function() {
      if (this.fields < this.limit) {
        this.fields++;
      }
    },
    deleteField: function() {
      if (this.fields > 1) {
        this.fields--;
      }
    },
    refresh: function() {
      question.correct = [];
    }
  }
})