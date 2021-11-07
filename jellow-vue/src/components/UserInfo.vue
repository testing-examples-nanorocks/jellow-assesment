<template>
  <div>
    <b-link :to="{ path: `/users/${user.id}/todoes` }" href="#">Todoes</b-link>
    <b-card>
      <h1>User details</h1>
      <template>
        <b-card-text>
          <h4>{{ user.name }}</h4>
          <h6>{{ user.email }}</h6>
          id: {{ user.id }}
          <br>
          username: {{ user.username }}
          <br>
          website: {{ user.website }}
        </b-card-text>
      </template>
    </b-card>
  </div>
</template>
<script>
export default {
  name: 'UserInfo',
  props: [
    'user',
  ]
}
</script>