<template>
  <layout>

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Cadastro de Departamento</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />
    <div class="row">
      <div class="col-md-12">
        <form v-for="department in department" :key="department.id">          
          <br /><br />
          <div class="row">
            <div class="col-md-12 topico-add">
              <h4><span style="font-weight: bold">Dados Cadastrais</span></h4>
            </div>
          </div>
          <hr>
          <br>
          <div class="row">
            <div class="col-md-6">
              <label for="inputName">Nome</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputName"
                  class="form-control"
                  :value="department.name"
                  disabled
                />
              </div>              
            </div>
            <div class="col-md-6">
              <label for="inputInstituicao">Instituição</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputInstituicao"
                  class="form-control"
                  :value="department.social_name"
                  disabled
                />
              </div>              
            </div>
          </div>
          <br />
          <br /><br />
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4" align="right">
              <Link :href="'/departamento/editar/'+department.id" class="btn btn-warning btn-edit-user">Editar</Link>
              <!--<Link href="" class="btn btn-danger btnDeletar">Deletarr</Link>-->
              
            </div>
          </div>
        </form>
      </div>
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
    errors: Object,
    department: Array,
  },
  methods: {
    sendForm() {
      this.$inertia.post("/departamento/registrar", this.form, {
        forceFormData: true,
        preserveScroll: false,
        _token: this.$page.props.csrf_token,
        
      });
    },
  },
};
</script>