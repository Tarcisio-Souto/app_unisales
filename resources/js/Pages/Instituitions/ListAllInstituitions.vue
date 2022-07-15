<template>
  <layout>

    <div class="row">
      <div class="col-md-12" align="center">
        <div class="" role="group">
          <Link :href="'#'" class="btn btn-success"
            ><i class="fa fa-solid fa-file-csv fa-sm"></i><span class="btn-font">Exportar (.csv)</span></Link
          >
          <Link :href="'#'" class="btn btn-success"
            ><i class="fa fa-solid fa-file-csv fa-sm"></i><span class="btn-font">Exportar (.xlxs)</span></Link
          >
          <Link :href="'#'" class="btn btn-warning"
            ><i class="fa fa-solid fa-file-csv fa-sm"></i><span class="btn-font">Exportar (.json)</span></Link
          >
          <Link :href="'#'" class="btn-exp-pers btn btn-primary"
            ><i class="fa fa-solid fa-file-csv fa-sm"></i><span class="btn-font">Exportar (personalizado)</span></Link
          >
        </div>
      </div>
    </div>
    <br/><br/>


    <div class="table-responsive-lg">
      <table
        id="myTable"
        class="table table-striped table-bordered table-hover"
        style="width: 100%"
      >
        <thead>
          <tr align="center">
            <th>Instituição</th>
            <th>CNPJ</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="instituition in instituitions" :key="instituition.id" :value="instituition.id" align="center">
            <td>{{ instituition.social_name }}</td>
            <td>{{ instituition.cnpj }}</td>
            <td>{{ instituition.phone_number }}</td>
            <td>{{ instituition.email }}</td>
            <td align="center">
              <Link :href="'/instituicao/visualizar/' + instituition.id"
                ><i class="fas fa-eye"></i
              ></Link>
              <Link :href="'/instituicao/editar/' + instituition.id"
                ><i class="fas fa-edit"></i
              ></Link>              
              <span
                ><i
                  class="fas fa-trash-alt"
                  @click="sendForm(instituition.id)"
                ></i
              ></span>
            </td>
          </tr>
        </tbody> 
        <tfoot>
          <tr align="center">
            <th>Instituição</th>
            <th>CNPJ</th>
            <th>Telefone</th>
            <th>E-mail</th>
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
import { Inertia } from "@inertiajs/inertia";
export default {
  components: {
    Layout,
    Link,
  },
  props: {
    instituitions: Array,
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
      //:href="'/userorador/deletar/'+user.us_id"
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
          "<span style='font-weight:bold; position: relative; top: 5px;'>Deletar instituição?</span>",
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
            v.$inertia.post("/instituicao/deletar/"+id, {
              forceFormData: true,
              preserveScroll: false,
              _token: v.$page.props.csrf_token,
            });
            
          }
        },
      });
    },
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