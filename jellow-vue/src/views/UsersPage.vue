<template>
  <b-container class="pt-4">
    <b-row class="text-center pb-2">
      <b-col md="12">
        <div>
          <b-form inline>
            <b-input-group class="mt-2">
              <b-form-input
                  id="inline-form-input-name"
                  :placeholder="`Filter by ` + selected"
                  size="lg"
                  v-model="filterValue"
              ></b-form-input>
              <b-form-select v-model="selected" :options="[
                  { value: 'name', text: 'Name' },
                  { value: 'email', text: 'Email' },
              ]"></b-form-select>
              <b-button type="button" class="rounded-0" size="lg" variant="dark" v-on:click="getUsers(`?filter[filterType]=filterValue`)">Filter</b-button>
            </b-input-group>
          </b-form>
        </div>
      </b-col>
      <b-col md="12">
        <div class="mt-3">
          <b-list-group horizontal>
            <b-list-group-item button style="width: 5rem" v-on:click="displayView(false)">
              <b-icon icon="list"></b-icon>
            </b-list-group-item>
            <b-list-group-item button style="width: 5rem" v-on:click="displayView(true)">
              <b-icon icon="grid"></b-icon>
            </b-list-group-item>
          </b-list-group>
        </div>
      </b-col>
    </b-row>
    <hr>
    <br>
    <h4 :class="loading">Loading...</h4>
    <UsersView :list-view="listView" :users="users"></UsersView>
  </b-container>
</template>
<style>
  .d-none{
    display: none;
  }
</style>
<script>
import UsersView from "../components/UsersView";

export default {
  name: 'UsersPage',
  data() {
    return {
      listView: true,
      users: [],
      selected: 'name',
      usersUrl: 'http://jellow.repo/api/users',
      filterValue: '',
      loading: 'd-none'
    }
  },
  components: {
    UsersView
  },
  methods: {
    displayView: function (view) {
      this.listView = view;
    },
    getUsers: function (filter = '') {
      if (filter !== '') {
        filter = filter.replace('filterType', this.selected)
        filter = filter.replace('filterValue', this.filterValue);
      }
      this.loading = '';
      fetch(this.usersUrl + filter).then(res => res.json()).then(data => {
        this.users = data;
        this.loading = 'd-none';
      })
    }
  },
  created() {
    this.getUsers();
  }
}
</script>
