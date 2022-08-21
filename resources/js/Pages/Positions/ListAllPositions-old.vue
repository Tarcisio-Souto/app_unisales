











<!--
<template>
  <layout>

    <div class="row">
      <div class="col-md-12">
        <div class="" role="group">
          <Link :href="'/cargo/cadastro'" class="btn btn-success"
            ><i class="fas fa-user-plus fa-sm add-dept-icon"></i><span class="btn-font">Cadastrar</span></Link
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
            <th>Cargo</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="cargo in cargos" :key="cargo.id" :value="cargo.id" align="center">
            <td>{{ cargo.name }}</td>
            <td align="center">
              <Link :href="'/cargo/visualizar/' + cargo.id"
                ><i class="fas fa-eye"></i
              ></Link>
              <Link :href="'/cargo/editar/' + cargo.id"
                ><i class="fas fa-edit"></i
              ></Link>              
              <span
                ><i
                  class="fas fa-trash-alt"
                  @click="sendForm(cargo.id)"
                ></i
              ></span>
            </td>
          </tr>
        </tbody> 
        <tfoot>
          <tr align="center">
            <th>Cargo</th>
            <th>Ações</th>
          </tr>
        </tfoot>
      </table>
    </div>


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
    cargos: Array,
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
          "<span style='font-weight:bold; position: relative; top: 5px;'>Deletar cargo?</span>",
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
            v.$inertia.post("/cargo/deletar/"+id, {
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
-->