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
            <th>Nome</th>
            <th>Cargo</th>
            <th>Instituição</th>
            <th>Departamento</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.us_id" :value="user.us_id" align="center">
            <td>{{ user.us_name }}</td>
            <td>{{ user.pos_name }}</td>
            <td>{{ user.fan_name }}</td>
            <td>{{ user.dept_name }}</td>
            <td align="center">
              <Link :href="'/usuario/visualizar/' + user.us_id"
                ><i class="fas fa-eye"></i
              ></Link>
              <Link :href="'/usuario/editar/' + user.us_id"
                ><i class="fas fa-edit"></i
              ></Link>              
              <span
                ><i
                  class="fas fa-trash-alt"
                  @click="sendForm(user.us_id)"
                ></i
              ></span>
            </td>
          </tr>
        </tbody> 
        <tfoot>
          <tr align="center">
            <th>Nome</th>
            <th>Cargo</th>
            <th>Instituição</th>
            <th>Departamento</th>
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
    users: Array,
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
          "<span style='font-weight:bold; position: relative; top: 5px;'>Deletar usuário?</span>",
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
            v.$inertia.post("/usuario/deletar/"+id, {
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