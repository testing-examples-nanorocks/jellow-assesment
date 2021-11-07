<template>
  <b-container class="details pt-5" id="todoes">
    <div style="padding-top: 20px;">
      <b-card class="shadow rounded-3">
        <b-card-text>
          <b-row>
            <b-col>
              <h1>Todoes</h1>
              <div style="margin-bottom: 40px">
                <b-form inline>
                  <b-input-group class="mt-2">
                    <b-form-input
                        id="inline-form-input-name"
                        :placeholder="`Filter by ` + selected"
                        size="lg"
                        v-model="filterValue"
                    ></b-form-input>
                    <b-form-select v-model="selected" :options="[
                      { value: 'completed', text: 'Completed' },
                      { value: 'title', text: 'Title' },
                    ]"></b-form-select>
                    <b-button type="button" class="rounded-0" size="lg" variant="dark"
                              v-on:click="getTodoes(`?filter[filterType]=filterValue`)">Filter
                    </b-button>
                  </b-input-group>
                </b-form>
                <small>**Add 0 or 1 if you filter by completed</small>
              </div>

              <b-row>
                <b-col md="12" v-for='todo in todoes' :key='todo.id'>
                  <b-card
                      tag="article"
                      style="margin-bottom: 20px"
                  >
                    <h6>{{ todo.id }}. {{ todo.completed == 0 ? 'Uncompleted' : 'Completed' }}</h6>
                    <br>
                    <p>{{ todo.title }}</p>
                    <b-button type="button" size="sm" variant="dark" v-on:click="updateTodoState(todo.id)"> Update
                    </b-button>
                  </b-card>
                </b-col>
              </b-row>
            </b-col>
          </b-row>
        </b-card-text>
      </b-card>
    </div>
  </b-container>
</template>

<script>

export default {
  name: 'UserDetails',
  data() {
    return {
      userId: this.$route.params.id,
      todoesUrl: 'http://jellow.repo/api/users/:userId/todoes',
      todoUpdateUrl: 'http://jellow.repo/api/users/:userId/todoes/:todoId',
      todoes: [],
      selected: 'title',
      filterValue: '',
    }
  },
  methods: {
    getTodoes: function (filter = '') {
      if (filter !== '') {
        filter = filter.replace('filterType', this.selected)
        filter = filter.replace('filterValue', this.filterValue);
      }

      fetch(this.todoesUrl.replace(':userId', this.userId) + filter).then(res => res.json()).then(data => {
        this.todoes = data;
      })
    },

    updateTodoState(todoId) {
      fetch(this.todoUpdateUrl.replace(':userId', this.userId).replace(':todoId', todoId), {
        method: 'PUT',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        body: ""
      }).then(res => {
        if (res.ok) {
          return res.json();
        }
        res.json().then(data => data.message).then(msg => alert(msg));
        throw new Error(`Some error occur !!!`)
      }).then(() => {
        this.getTodoes();
      }).catch(e => {
        console.log(e)
      })
    }
  },
  created() {
    this.getTodoes();
  },
}
</script>
