<template>
  <b-row>
    <template v-if="listView">
      <template v-if="users.length !== 0">
        <b-col sm="6" md="3" lg="3" v-for='user in users' :key='user.id'>
          <div>
            <b-card
                tag="article"
                class="mb-4 w-75 mx-auto shadow rounded-3"
                :img-src="user.image === null ? 'https://i.pravatar.cc/150?u=a042581f4e29026704d' : user.image"
                :img-alt="user.name"
            >
              <b-card-text align="left" style="font-size: 11px; color: darkorange">
                <strong style="font-size: 16px !important; color: black">{{ user.name }}</strong>
                <br>
                Username: {{ user.username }}
                <br>
                Email: {{ user.email }}
                <br>
                WebSite: {{ user.website }}
              </b-card-text>
              <b-button variant="dark" size="sm" :to="'/users/' + user.id">
                details
              </b-button>
            </b-card>
          </div>
        </b-col>
      </template>
      <template v-else>
        <h2>No data found</h2>
      </template>
    </template>
    <template v-else>
      <template v-if="users.length !== 0">
        <b-col sm="12" md="12" lg="12" v-for='user in users' :key='user.id'>

          <div class="mb-4">
            <b-card no-body class="overflow-hidden mb-3 shadow rounded-3" style="max-width: 100%">
              <b-row no-gutters>
                <b-col md="4">
                  <b-card-img
                      class="rounded-0 w-50"
                      :src="user.image === null ? 'https://i.pravatar.cc/150?u=a042581f4e29026704d' : user.image"
                      :alt="user.name"
                  >
                  </b-card-img>
                </b-col>
                <b-col md="8">
                  <b-card-body :title="user.name">
                    <b-card-text>
                      Username: {{ user.username }}
                      <br>
                      Email: {{ user.email }}
                      <br>
                      WebSite: {{ user.website }}
                    </b-card-text>
                    <b-button variant="dark" size="sm" :to="'/users/' + user.id">
                      details
                    </b-button>
                  </b-card-body>
                </b-col>
              </b-row>
            </b-card>
          </div>
        </b-col>
      </template>
      <template v-else>
        <h2>No data found</h2>
      </template>
    </template>
  </b-row>
</template>

<script>
export default {
  name: 'UsersView',
  props: [
    'listView',
    'users'
  ]
}
</script>