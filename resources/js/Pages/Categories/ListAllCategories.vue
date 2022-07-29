<template>
  <layout>
    <div class="row">
      <div class="col-md-12">
        <div class="" role="group">
          <Link :href="'/categoria/cadastro'" class="btn btn-success"
            ><i class="fas fa-user-plus fa-sm add-dept-icon"></i
            ><span class="btn-font">Cadastrar</span></Link
          >
        </div>
      </div>
    </div>
    <br /><br />

    <div class="table-responsive-lg">
      <table
        id="myTable"
        class="table table-striped table-bordered table-hover"
        style="width: 100%"
      >
        <thead>
          <tr align="center">
            <th>Categoria</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="categoria in categorias"
            :key="categoria.id"
            :value="categoria.id"
            align="center"
          >
            <td>{{ categoria.name }}</td>
            <td align="center">
              <Link :href="'/categoria/visualizar/' + categoria.id"
                ><i class="fas fa-eye"></i
              ></Link>
              <Link :href="'/categoria/editar/' + categoria.id"
                ><i class="fas fa-edit"></i
              ></Link>
              <span
                ><i class="fas fa-trash-alt" @click="sendForm(categoria.id)"></i
              ></span>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr align="center">
            <th>Categoria</th>
            <th>Ações</th>
          </tr>
        </tfoot>
      </table>
    </div>

    <!-- <br> temporário -->

    <br /><br /><br /><br /><br />
    <br /><br /><br /><br /><br />
    <br /><br /><br /><br /><br />
  </layout>
</template>

<script>
import Layout from "../../Layout.vue";
import { Link } from "@inertiajs/inertia-vue";
export default {
  components: {
    Layout,
    Link,
  },
  props: {
    categorias: Array,
    errors: Object,
  },
  data: () => {
    return {
      form: {
        id: null,
      },
    };
  },
  methods: {


    sendForm(id) {
      var v = this;
      bootbox.confirm({
        centerVertical: true,
        backdrop: true,
        closeButton: false,
        size: "large",
        title:
          "<img src='https://unisales.br/wp-content/uploads/2020/03/logo.svg'>",
        message:
          "<i class='fas fa-exclamation-circle' style='color:red'></i></i>&nbsp&nbsp" +
          "<span style='font-weight:bold; position: relative; top: 5px;'>Deletar categoria?</span>",
        buttons: {
          cancel: {
            label: '<i class="fa fa-times"></i> Não',
          },
          confirm: {
            className: "btn-danger",
            label: '<i class="fa fa-check"></i> Sim',
          },
        },
        callback: function (result) {
          if (result == true) {
            axios.post("/categoria/deletar/" + id).then(
              function (res) {
                if (res.data["success"]) {
                  bootbox.alert({
                    centerVertical: true,
                    backdrop: true,
                    closeButton: false,
                    size: "large",
                    title:
                      "<img src='https://unisales.br/wp-content/uploads/2020/03/logo.svg'>",
                    message:
                      "<i class='fas fa-check-circle' style='color:green'></i>&nbsp&nbsp" +
                      "<span style='font-weight:bold; position: relative; top: 5px;'>" +
                      res.data["success"] +
                      "</span>",
                  });
                } else {
                  bootbox.alert({
                    centerVertical: true,
                    backdrop: true,
                    closeButton: false,
                    size: "large",
                    title:
                      "<img src='https://unisales.br/wp-content/uploads/2020/03/logo.svg'>",
                    message:
                      "<i class='fas fa-exclamation-triangle' style='color:#ffc400'></i>&nbsp&nbsp" +
                      "<span style='font-weight:bold; position: relative; top: 5px;'>" +
                      res.data["error"] +
                      "</span>",
                  });
                }
              }.bind(this)
            );
          }
        },
      });
    },



    /*
    sendForm(id) {
      var v = this;
      bootbox.confirm({
        centerVertical: true,
        backdrop: true,
        closeButton: false,
        size: "large",
        title:
          "<img src='https://unisales.br/wp-content/uploads/2020/03/logo.svg'>",
        message:
          "<i class='fas fa-exclamation-circle' style='color:red'></i></i>&nbsp&nbsp" +
          "<span style='font-weight:bold; position: relative; top: 5px;'>Deletar categoria?</span>",
        buttons: {
          cancel: {
            label: '<i class="fa fa-times"></i> Não',
          },
          confirm: {
            className: "btn-danger",
            label: '<i class="fa fa-check"></i> Sim',
          },
        },
        callback: function (result) {
          if (result == true) {
            v.$inertia.post("/categoria/deletar/" + id, {
              forceFormData: true,
              preserveScroll: false,
              _token: v.$page.props.csrf_token,
              onSuccess: () => {
                bootbox.alert({
                  centerVertical: true,
                  backdrop: true,
                  closeButton: false,
                  size: "large",
                  title:
                    "<img src='https://unisales.br/wp-content/uploads/2020/03/logo.svg'>",
                  message:
                    "<i class='fas fa-check-circle' style='color:green'></i>&nbsp&nbsp" +
                    "<span style='font-weight:bold; position: relative; top: 5px;'>Categoria deletada com sucesso!</span>",
                });
              },
              
            });
          }
        },
      });

    },
    */
  },
  mounted() {
    $(document).ready(function () {
      $("#myTable").DataTable({
        language: {
          url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
        },
      });
    });
  },
};
</script>