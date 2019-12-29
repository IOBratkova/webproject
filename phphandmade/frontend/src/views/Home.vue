<template>
  <div class="main">
    <div id="carouselExampleFade" class="carousel slide carousel-fade mb-0 mb-sm-0 mb-lg-0 mb-md-0" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/index-carousel-flowers-bottle.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block text-center text-radiance-lime-light">
            <h1 style="font-family:Lobster;">MADEHANDMADE - твой помощник в рукоделии!</h1>
            <h4>Здесь ты сможешь узнать, что такое фенечки и научиться их делать!</h4>
            <h4>Если для тебя это не в новинку, то среди схем ты можешь найти</h4>
            <h4>именно ту, которая нужна тебе!</h4>
            <p></p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/index-carousel-dream-catcher.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block text-center text-radiance-yellow-light">
            <h1 style="font-family:Lobster;">MADEHANDMADE - твой помощник в рукоделии!</h1>
            <h4>Увидел где-то ловец снов и очень захотел себе такой?</h4>
            <h4>Не знаешь, с чего начать, но очень хочешь научиться?</h4>
            <h4>Раздел "Ловцы снов" поможет тебе, будь ты начинающим или опытным ловцом сновидений!</h4>
            <p></p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/index-carousel-friendship-brasletes-2.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block text-center text-radiance-red-light">
            <h1 style="font-family:Lobster;">MADEHANDMADE - твой помощник в рукоделии!</h1>
            <h4>Красивые узоры на фенечках уже давно не сказка ;) </h4>
            <h4>"Гейзер", "Шотландка" и большое количество других схем для косого плетения.</h4>
            <h4>Выбирай схему, подбирай новые цвета и создавай!</h4>
            <p></p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Назад</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Вперед</span>
      </a>
    </div>
    <div class="container w-75 shadow rounded p-3 border border-coral mt-1 mb-5 mt-sm-1 mb-sm-5 ">
      <h1 style="font-family:Lobster;" class="text-center text-radiance-violet">Последние уроки</h1>
      <div class="row">
        <router-link :to="{name: 'photolesson', params:{id: lessons[0].id}}" class="col-lg-3">
          <div class="card border border-blue" style="min-height: 100%">
            <img :src="lessons[0].images[0].path" height="200" width="200" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title font-weight-bold">{{lessons[0].title}}</h5>
              <p class="card-text">{{lessons[0].description}}</p>
            </div>
          </div>
        </router-link>
        <router-link :to="{name: 'photolesson', params:{id: lessons[1].id}}" class="col-lg-3">
          <div class="card border border-green" style="min-height: 100%">
            <img :src="lessons[1].images[0].path" height="200" width="200" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title font-weight-bold">{{lessons[1].title}}</h5>
              <p class="card-text">{{lessons[1].description}}</p>
            </div>
          </div>
        </router-link>
        <router-link :to="{name: 'photolesson', params:{id: lessons[2].id}}" class="col-lg-3">
          <div class="card border border-yellow" style="min-height: 100%">
            <img :src="lessons[2].images[0].path" height="200" width="200" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title font-weight-bold">{{lessons[2].title}}</h5>
              <p class="card-text">{{lessons[2].description}}</p>
            </div>
          </div>
        </router-link>
        <router-link :to="{name: 'photolesson', params:{id: lessons[3].id}}" class="col-lg-3">
          <div class="card border border-pink" style="min-height: 100%">
            <img :src="lessons[3].images[0].path" height="200" width="200" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title font-weight-bold">{{lessons[3].title}}</h5>
              <p class="card-text">{{lessons[3].description}}</p>
            </div>
          </div>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import { HTTP } from '../components/http'

export default {
  name: 'Home',
  data () {
    return {
      lessons: { }
    }
  },
  created () {
    const countPhotolessons = 4
    HTTP.get('/photolesson/getlast?count=' + countPhotolessons)
      .then(response => (this.lessons = response.data))
  }
}
</script>
