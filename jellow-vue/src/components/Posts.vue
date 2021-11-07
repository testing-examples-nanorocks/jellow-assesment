<template>
  <div style="padding-top: 20px;">
    <b-card class="shadow rounded-3">
      <b-card-text>
        <b-row>
          <b-col>
            <h1>Posts</h1>
            <b-row>
              <b-col md="12" v-for='post in posts' :key='post.id'>
                <b-card
                    tag="article"
                    style="margin-bottom: 20px"
                >
                  <h6>{{ post.title }}</h6>
                  <br>
                  <small>{{ post.body }}</small>
                </b-card>
              </b-col>
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
  props: [
    'posts',
  ]
}
</script>