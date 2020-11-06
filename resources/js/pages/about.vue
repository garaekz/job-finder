<template>
  <div class="container">
    <div class="col-md-12">
      <card class="settings-card">
        <p>Calinextia es un acrónimo derivado del náhuatl “Cali” (casa, hogar) y “nextia” (descubrir, resplandecer, diseñar, innovar).</p>
        <p>Somos la casa de la innovación y eso nos identifica como pioneros en las nuevas formas para la búsqueda de talento dentro del ámbito floral.</p>
        <h5>Misión</h5>
        <p>Somos una bolsa de empleo que crea oportunidades a través de una página web exclusivamente para floristas, diseñadores florales, weeding planners y toda aquella persona que se encuentre relacionada en el ámbito floral.</p>
        <h5>Visión</h5>
        <p>Ser reconocidos  a nivel nacional como la bolsa de empleo online más confiable para la búsqueda del talento creativo mexicano, especializado en floristería y diseño floral.</p>
      </card>
    </div>
  </div>
</template>

<script>
import { mapActions } from 'vuex'
export default {
  mounted () {
    this.setTitle('Quienes somos')
  },
  methods: {
    ...mapActions({
      setTitle: 'page/setTitle'
    })
  }
}
</script>

<style>
</style>
