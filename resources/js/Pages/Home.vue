<template>
  <layout>

    <Head title="Unisales" />
    <div class="row">
      <div class="col-md-10 img-unisales">
        <img src="https://unisales.br/wp-content/uploads/2020/03/logo.svg" alt="UnisalesLogo" width="150px" />
      </div>    
      <div class="col-md-2 welcome">
        <H4>Bem-vindo!</H4>
        <p>{{ user }}</p>
      </div>
    </div>
    <br />
    <hr />
    <br />
    <div class="row topic-chart">
      <div class="col-md-4">
        <p><i class="fas fa-caret-down"></i>Top Empréstimos Por Categoria</p>
      </div>
      <div class="col-md-4"></div>
      <div class="col-md-4"></div>
    </div>
    <div class="row" id="subGrafico1">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <GChart type="PieChart" :settings="{ packages: ['corechart'] }" :data="chartData"
          :options="chartOptions.chart" />
      </div>
      <div class="col-md-3"></div>
    </div>
  </layout>
</template>

<script>
import Layout from "../Layout.vue";
import { Head } from "@inertiajs/inertia-vue";
import { GChart } from "vue-google-charts";

export default {
  components: {
    Head,
    Layout,
    GChart,
  },
  props: {
    user: String,
    topLoans: Array,
  },

  data() {
    return {
      chartData: [
        ["", "Categorias"],
        [this.topLoans[0]["cat_name"], this.topLoans[0]["qtd"]],
        [this.topLoans[1]["cat_name"], this.topLoans[1]["qtd"]],
        [this.topLoans[2]["cat_name"], this.topLoans[2]["qtd"]],
        [this.topLoans[3]["cat_name"], this.topLoans[3]["qtd"]],
        [this.topLoans[4]["cat_name"], this.topLoans[4]["qtd"]],
      ],

      chartOptions: {
        chart: {
          pieHole: 1,
          height: 400,
          is3D: true,
        },
      },
    };
  },

  created() {
    /* Abre o display de Gráficos */

    var v = this;

    $(function () {
      $(".fa-caret-down").click(function () {
        var subGrafico1 = $("#subGrafico1");
        subGrafico1.slideToggle();
      });
    });
  },
};
</script>