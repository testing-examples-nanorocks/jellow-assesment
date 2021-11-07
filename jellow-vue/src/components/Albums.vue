<template>
  <div>
    <b-card class="shadow rounded-3">
      <b-card-text>
        <b-row>
          <b-col>
            <h1>Albums</h1>
            <b-row>
              <div>
                <b-form inline>
                  <b-input-group style="margin-bottom: 20px;">
                    <b-form-input
                        id="inline-form-input-name"
                        placeholder="Filter by tile"
                        size="sm"
                        v-model="filterAlbumsByTitle"
                    ></b-form-input>
                    <b-button type="button" class="rounded-0" size="lg" variant="dark"
                              v-on:click="getAlbums(`?filter[tile]=:filterAlbumsByTitle`)">Filter
                    </b-button>
                  </b-input-group>
                </b-form>
              </div>
              <b-col md="4" v-for='album in albums' :key='album.id' class="d-flex align-items-stretch mb-3">
                <b-card
                    :img-src="album.photo.url"
                    img-alt="Image"
                    img-top
                    tag="article"
                    style="margin-bottom: 20px"
                >
                  <b-button variant="dark" size="sm" style="width: 100%; margin-bottom: 10px"
                            v-on:click="addFavAlbums(album.id)">To favorite
                  </b-button>
                  <small>{{ album.tile }}</small>
                </b-card>
              </b-col>
            </b-row>
          </b-col>

          <b-col>
            <h1>Favorite Albums <small style="font-size: 1rem">(only 3 allowed)</small></h1>
            <b-row>
              <b-col md="4" v-for='falbum in favAlbums' :key='falbum.album_id'
                     class="d-flex align-items-stretch mb-3">
                <b-card
                    :img-src="falbum.album.photo.url"
                    img-alt="Image"
                    img-top
                    tag="article"
                    style="margin-bottom: 20px"
                >
                  <b-button variant="danger" size="sm" style="width: 100%; margin-bottom: 10px"
                            v-on:click="removeFavAlbums(falbum.album_id)">Remove
                  </b-button>
                  <small>{{ falbum.album.tile }}</small>
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
  name: 'Albums',
  data() {
    return {
      userId: this.$route.params.id,
      albumsUrl: 'http://jellow.repo/api/users/:userId/albums',
      albumsFavUrl: 'http://jellow.repo/api/users/:userId/albums/favorite',
      albumsAddFavUrl: 'http://jellow.repo/api/users/:userId/albums/:albumId/favorite',
      albumsRemoveFavUrl: 'http://jellow.repo/api/users/:userId/albums/:albumId/favorite',
      albums: [],
      favAlbums: [],
      filterAlbumsByTitle: ''
    }
  },
  methods: {
    getAlbums: function (filter = '') {
      if (filter !== '') {
        filter = filter.replace(':filterAlbumsByTitle', this.filterAlbumsByTitle);
      }

      fetch(this.albumsUrl.replace(':userId', this.userId) + filter).then(res => res.json()).then(data => {
        let favIds = this.favAlbums.map(item => item.album_id);
        this.albums = data.filter((album) => !favIds.includes(album.id));
      })
    },
    getFavAlbums: function () {
      fetch(this.albumsFavUrl.replace(':userId', this.userId)).then(res => res.json()).then(data => {
        this.favAlbums = data;
        this.getAlbums();
      })
    },
    addFavAlbums: function (albumId) {
      fetch(this.albumsAddFavUrl.replace(':userId', this.userId).replace(':albumId', albumId), {
        method: 'POST',
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
        this.getFavAlbums();
      }).catch(e => {
        console.log(e)
      })
    },
    removeFavAlbums: function (albumId) {
      fetch(this.albumsRemoveFavUrl.replace(':userId', this.userId).replace(':albumId', albumId), {
        method: 'DELETE',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        body: ""
      }).then(res => res.json()).then(() => {
        this.getFavAlbums();
      })
    },
  },
  created() {
    this.getFavAlbums();
  },
  props: [
    'listView',
    'users'
  ]
}
</script>