<template>
  <div>
    <img class="img-fluid img-logo my-n3" src="img/ls4.png">
    <div class="container shadow rounded w-75 my-3 border border-yellow">

      <div class="row row-content-center mt-3 mb-3 p-1 jumbotron-position shadow rounded-bookmark border border-olive">
        <div align="center" style="margin-bottom: 1rem; margin-left: 1rem">
          <span class="text-radiance-lime" style="font-family:Lobster, cursive; font-size: xx-large;" > {{model.title}}</span>
          <div>
            <span style="margin-top: 1rem; font-family:Lobster, cursive; font-size: large;" > Автор: {{user.login}}</span>
          </div>
          <div>
            <span style="font-family:Lobster, cursive; font-size: large;" > Категория: {{type.title}}</span>
          </div>
        </div>
      </div>

      <div class="row row-content-center mb-3 p-1 jumbotron-position shadow rounded-bookmark border border-pink">
        <div align="center" style="margin-bottom: 1rem; margin-left: 1rem">
          <span class="text-radiance-blue" style="font-family:Lobster, cursive; font-size:x-large;" >Краткое описание урока</span>
          <p>{{model.description}}</p>
        </div>
      </div>

      <div class="row row-content-center mb-3 p-1 jumbotron-position shadow rounded-bookmark border border-green">
        <div align="center" style="margin-bottom: 1rem; margin-left: 1rem">
          <span class="text-radiance-yellow" style="font-family:Lobster, cursive; font-size:x-large;" >Материалы</span>
          <p>{{model.materials}}</p>
        </div>
      </div>

      <div class="mt-4" align="center">
        <span class="text-radiance-pink" style="margin-top: 1rem; font-family:Lobster, cursive; font-size:x-large;" >Ход работы</span>
        <ImageLesson v-for='image in model.images'
                     v-bind:key='image.id'
                     v-bind:description='image.description'
                     v-bind:path='image.path'/>
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
