<template>
  <b-container class="details pt-5" id="details">
    <UserInfo :user="user"></UserInfo>
    <br>
    <Albums></Albums>
    <Posts :posts="posts" @scroll="handleScroll"></Posts>
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
      postsUrl: 'http://jellow.repo/api/users/:userId/posts/:limit?page=:page',
      postPage: 1,
      limitPosts: 5,
      user: {},
      loading: '',
      posts: [],
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
    },
    getPosts: function (isNew = true) {
      const url = this.postsUrl.replace(':userId', this.userId).replace(':limit', this.limitPosts)
          .replace(':page', this.postPage);
      fetch(url).then(res => res.json()).then(data => {
        this.limitPosts = 10;

        if (isNew) {
          this.posts = data.data;
          return;
        }

        if (data.data.length === 0) {
          return;
        }

        data.data.map(item => {
          this.posts.push(item)
        })
      })
    },
    handleScroll: function (e) {
      console.log(e)
    }
  },
  created() {
    this.getUser();
    this.getPosts();
  },
}
</script>
