<template>
  <div>
    <img class="img-fluid img-logo my-n3" src="img/ls4.png">
    <div class="container shadow rounded w-75 my-3 border border-yellow">

      <div class="row row-content-center m-3 p-1 jumbotron-position shadow rounded-bookmark border border-olive">
        <div align="center" style="margin-bottom: 1rem; margin-left: 1rem">
          <span id="#title" class="text-radiance-lime" style="font-family:Lobster, cursive; font-size: xx-large;" > {{model.title}}</span>
          <div>
            <span id="#author" style="margin-top: 1rem; font-family:Lobster, cursive; font-size: large;" > Автор: {{user.login}}</span>
          </div>
          <div>
            <span id="#categ" style="font-family:Lobster, cursive; font-size: large;" > Категория: {{type.title}}</span>
          </div>
        </div>
      </div>

      <div class="row row-content-center m-3 p-1 jumbotron-position shadow rounded-bookmark border border-pink">
        <div align="center" style="margin-bottom: 1rem; margin-left: 1rem">
          <span class="text-radiance-blue" style="font-family:Lobster, cursive; font-size:x-large;" >Краткое описание урока</span>
          <p id="#info">{{model.description}}</p>
        </div>
      </div>

      <div class="row row-content-center m-3 p-1 jumbotron-position shadow rounded-bookmark border border-green">
        <div align="center" style="margin-bottom: 1rem; margin-left: 1rem">
          <span class="text-radiance-yellow" style="font-family:Lobster, cursive; font-size:x-large;" >Материалы</span>
          <p id="#materials">{{model.materials}}</p>
        </div>
      </div>

      <div class="mt-4" align="center">
        <span class="text-radiance-pink" style="margin-top: 1rem; font-family:Lobster, cursive; font-size:x-large;" >Ход работы</span>
        <div id="#imles">
          <ImageLesson v-for='image in model.images' v-bind:itemid="image.id" v-bind:id="image.id"
                       v-bind:key='image.id'
                       v-bind:description='image.description'
                       v-bind:path='image.path'/>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { HTTP } from '../components/http'
import ImageLesson from '../components/ImageLesson'
export default {
  name: 'PhotoLesson',
  components: { ImageLesson },
  data () {
    return {
      model: { },
      user: { },
      type: { }
    }
  },
  created () {
    var id = this.$route.params.id
    HTTP.get('/photolesson/view?id=' + id)
      .then(response => (this.model = response.data)
        .then(
          HTTP.get('/user/view?id=' + this.model.userID)
            .then(response => (this.user = response.data)
              .then(
                HTTP.get('/handmadetype/view?id=' + this.model.handmadeTypeID)
                  .then(response => (this.type = response.data))
              )
            )
        )
      )
  }
}
</script>

<style scoped>

</style>
