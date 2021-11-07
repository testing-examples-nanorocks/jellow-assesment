<template>
  <div style="padding-top: 20px;">
    <b-card class="shadow rounded-3">
      <b-card-text>
        <b-row>
          <b-col>
            <h1>Posts</h1>
            <b-row>
              <div v-infinite-scroll="refresh" infinite-scroll-disabled="busy" infinite-scroll-distance="60">
                <b-col md="12" v-for='(post, index) in posts' :key='index'>
                  <b-card
                      tag="article"
                      style="margin-bottom: 20px"
                  >
                    <h6>{{ post.id }}. {{ post.title }}</h6>
                    <br>
                    <small>{{ post.body }}</small>
                  </b-card>
                </b-col>
              </div>
            </b-row>
          </b-col>
        </b-row>
      </b-card-text>
    </b-card>
  </div>
</template>
<script>

export default {
  name: 'Posts',
  data() {
    return {
      userId: this.$route.params.id,
      postsUrl: 'http://jellow.repo/api/users/:userId/posts/:limit?page=:page',
      postPage: 1,
      limitPosts: 5,
      posts: [],
      makeRequest: true,
      countRequest: 1
    }
  },
  methods: {
    getPosts: function (isNew = true) {
      if (!this.makeRequest) {
        return;
      }

      if (this.postPage === 2) {
        this.limitPosts = 5;
      }

      const url = this.postsUrl.replace(':userId', this.userId).replace(':limit', this.limitPosts)
          .replace(':page', this.countRequest === 3 ? --this.postPage : this.postPage++);
      fetch(url).then(res => res.json()).then(data => {

        if (isNew) {
          this.posts = data.data;
          return;
        }

        if (data.data.length === 0) {
          this.makeRequest = false;
          return;
        }

        data.data.map(item => {
          this.posts.push(item)
        })

        this.posts = this.removeDuplicates(this.posts, item => item.id)
      })

      this.limitPosts = 10;
      this.countRequest++;
    },
    refresh() {
      setTimeout(() => {
        this.getPosts(false);
      }, 400)
    },
    removeDuplicates(data, key) {
      return [
        ...new Map(data.map(item => [key(item), item])).values()
      ]
    }
  },
}
</script>