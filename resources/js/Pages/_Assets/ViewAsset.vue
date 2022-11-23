<template>
  <layout class="backg-color">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Editar Setor</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />
    <div class="row">
      <div class="col-md-12">
        <form v-for="assets in assets" :key="assets.ass_id"
        >
          <h4><span style="font-weight: bold">Dados Cadastrais</span></h4>
          <div class="row">
            <div class="col-md-4">
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
                  placeholder="Nome"
                  v-model="assets.ass_name"
                  disabled
                />
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputName">Nº Patrimônio</label>
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
                  placeholder="Nome"
                  v-model="assets.ass_pat"
                  disabled
                />
              </div>              
            </div>
            <div class="col-md-4">
              <label for="inputModel">Modelo</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-building"></i>
                  </div>
                </div>
                <select
                  id="inputModel"
                  class="form-control"
                  v-model="assets.mod_name"
                  name="txtModel"
                  disabled
                >
                  <option :value="assets.mod_name">{{ assets.mod_name }}</option>
                </select>
              </div>
            </div>
          </div>
          <br />

          <div class="row">
            <div class="col-md-4">
              <label for="inputCategoria">Categoria</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-building"></i>
                  </div>
                </div>
                <select
                  id="inputCategoria"
                  class="form-control"
                  v-model="assets.cat_name"
                  name="txtModel"
                  disabled
                >
                  <option :value="assets.cat_name">{{ assets.cat_name }}</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputInstituicao">Instituição</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-building"></i>
                  </div>
                </div>
                <select
                  id="inputInstituicao"
                  class="form-control"
                  v-model="assets.social_name"
                  name="txtModel"
                  disabled
                >
                  <option :value="assets.social_name">
                    {{ assets.social_name }}
                  </option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <label for="InputStatus">Situação</label>
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="form-check form-check-inline"
                    v-if="assets.ass_status == '1'"
                  >
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="InputStatus1"
                      value="1"
                      checked
                      disabled
                    />
                    <label class="form-check-label" for="exampleRadios1">
                      Ativo
                    </label>
                  </div>
                  <div class="form-check form-check-inline" v-else>
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="inputStatus1"
                      value="1"
                      disabled
                    />
                    <label class="form-check-label" for="exampleRadios1">
                      Ativo
                    </label>
                  </div>

                  <div
                    class="form-check form-check-inline"
                    v-if="assets.ass_status == '0'"
                  >
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="InputStatus2"
                      value="0"
                      checked
                      disabled
                    />
                    <label class="form-check-label" for="exampleRadios2">
                      Bloqueado
                    </label>
                  </div>
                  <div class="form-check form-check-inline" v-else>
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="InputStatus2"
                      value="0"
                      disabled
                    />
                    <label class="form-check-label" for="exampleRadios1">
                      Bloqueado
                    </label>
                  </div>
                </div>
              </div>
            </div>            
          </div>
          <br />
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4 btnEditarCargo" align="right">
              <Link
                :href="'/patrimonio/editar/' + assets.ass_id"
                class="btn btn-warning btn-edit-user"
                >Editar</Link
              >
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
    assets: Array,
  },

  created() {
    if (this.errors['accessLevel']) {
      console.log(this.errors['accessLevel']);
      bootbox.alert({
        centerVertical: true,
        backdrop: true,
        closeButton: false,
        size: "large",
        title:
          "<img src='https://unisales.br/wp-content/uploads/2020/03/logo.svg'>",
        message:
          "<i class='fas fa-exclamation-circle' style='color:red'></i>&nbsp&nbsp" +
          "<span style='font-weight:bold; position: relative; top: 5px;'>" +
            this.errors['accessLevel'] +
          "</span>",
      });
    }
  },
  
};
</script>