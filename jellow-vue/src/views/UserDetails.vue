<template>
  <b-container class="details pt-5" id="details">
    <UserInfo :user="user"></UserInfo>
    <br>
    <Albums></Albums>
    <Posts></Posts>
  </b-container>
</template>
<script>
import UserInfo from "../components/UserInfo";
import Posts from "../components/Posts";
import Albums from "../components/Albums";

export default {
  name: 'UserDetails',
  data() {
    return {
      userId: this.$route.params.id,
      userUrl: 'http://jellow.repo/api/users/:id',
      user: {},
      loading: '',
    }
  },
  components: {
    Posts,
    UserInfo,
    Albums
  },
  methods: {
    getUser: function () {
      fetch(this.userUrl.replace(':id', this.userId)).then(res => res.json()).then(data => {
        this.user = data;
      })
    }
  },
  mounted() {
    this.getUser();
  }
}
</script>
