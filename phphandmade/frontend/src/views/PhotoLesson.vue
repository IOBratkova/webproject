<template>
  <div>
    <img class="img-fluid img-logo my-n3" src="img/ls4.png">
    <div class="container shadow rounded w-75 my-3 border border-yellow">
      <div class="mb-2" align="center" style="margin-bottom: 1rem; height: 40px">
        <span class="text-radiance-lime" style="font-family:Lobster, cursive; Font-size:50px;" > {{model.title}}</span>
      </div>

      <div class="mt-4" align="center">
        <span style="margin-top: 1rem; font-family:Lobster, cursive; Font-size:22px;" > Автор: {{user.login}}</span>
      </div>

      <div class="m-1" align="center">
        <span style="font-family:Lobster, cursive; Font-size:22px;" > Категория: например, ловцы снов</span>
      </div>

      <div class="row row-content-center mb-3 p-1 jumbotron-position shadow rounded-bookmark border border-pink">
        <div align="center" style="margin-bottom: 1rem; margin-left: 1rem">
          <span class="text-radiance-blue" style="font-family:Lobster, cursive; Font-size:27px;" >Краткое описание урока</span>
          <p>{{model.description}}</p>
        </div>
      </div>

      <div class="row row-content-center mb-3 p-1 jumbotron-position shadow rounded-bookmark border border-green">
        <div align="center" style="margin-bottom: 1rem; margin-left: 1rem">
          <span class="text-radiance-yellow" style="font-family:Lobster, cursive; Font-size:27px;" >Материалы</span>
          <p>{{model.materials}}</p>
        </div>
      </div>

      <div class="text-center">
        <p>
          Ловец снов (или "силки для снов") — индейский амулет, который защищает спящего от злых духов, а также болезней.
          По преданиям, плохие сны запутываются в паутине, а хорошие проскальзывают сквозь отверстие в середине.
          На протяжении долгого времени многие племена претендовали на авторство ловцов снов.
          Наиболее известными среди них были навахо, лакота сиу, гуроны, кри, мохоки, чироки, ирокезы и оджибве.
          В начале двухтысячных годов было достигнуто согласие в том,
          что изначальное авторство ловцов снов принадлежит племени оджибве.
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import { HTTP } from '../components/http'
export default {
  name: 'PhotoLesson',
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
      .then(response => (this.model = response.data)).then(
        HTTP.get('/user/view?id=' + id)
          .then(response => (this.user = response.data))
      )
  }
}
</script>

<style scoped>

</style>
