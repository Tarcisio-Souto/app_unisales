<template>
  <layout>
    <!--<div v-if="$page.props.flash.success"></div>-->

    <!-- Modal Success -->

    <!-- Modal -->

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Cadastro de Usuário</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />
    <div class="row">
      <div class="col-md-12">
        <form v-for="user in user" :key="user.us_id">          
          <br /><br />
          <h4><span style="font-weight: bold">Dados Pessoais</span></h4>
          <div class="row">
            <div class="col-md-4">
              <label for="inputname">Nome</label>
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
                  :value="user.name_user"
                  disabled
                />
              </div>
              <div v-for="(erro, name) in errors" :key="name">
                <div v-if="name == 'name'">
                  <span v-if="erro != ''" class="errors-label-notification">
                    <i class="fas fa-exclamation-circle"></i>{{ erro }}
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputCpf">CPF</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-id-card"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputCpf"
                  class="form-control"
                  :value="user.cpf"
                  v-mask="'###.###.###-##'"
                  disabled
                />
              </div>
              <div v-for="(erro, cpf) in errors" :key="cpf">
                <div v-if="cpf == 'cpf'">
                  <span v-if="erro != ''" class="errors-label-notification">
                    <i class="fas fa-exclamation-circle"></i>{{ erro }}
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputGenre">Sexo</label>
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="form-check form-check-inline"
                    v-if="user.genre == 'm'"
                  >
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="inputGenre1"
                      value="m"
                      checked
                      disabled
                    />
                    <label class="form-check-label" for="exampleRadios1">
                      Masculino
                    </label>
                  </div>
                  <div class="form-check form-check-inline" v-else>
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="inputGenre1"
                      value="m"
                      disabled
                    />
                    <label class="form-check-label" for="exampleRadios1">
                      Masculino
                    </label>
                  </div>

                  <div
                    class="form-check form-check-inline"
                    v-if="user.genre == 'f'"
                  >
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="inputGenre2"
                      value="f"
                      checked
                      disabled
                    />
                    <label class="form-check-label" for="exampleRadios2">
                      Feminino
                    </label>
                  </div>
                  <div class="form-check form-check-inline" v-else>
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="inputGenre2"
                      value="f"
                      disabled
                    />
                    <label class="form-check-label" for="exampleRadios1">
                      Feminino
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-md-4">
              <label for="inputIdade">Idade</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-birthday-cake"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputAge"
                  class="form-control"
                  :value="user.age"
                  disabled
                />
              </div>
              <div v-for="(erro, age) in errors" :key="age">
                <div v-if="age == 'age'">
                  <span v-if="erro != ''" class="errors-label-notification">
                    <i class="fas fa-exclamation-circle"></i>{{ erro }}
                  </span>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <label for="inputDtBirth">Data de Nascimento</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                  </div>
                </div>
                <input
                  key=""
                  type="text"
                  id="inputDtBirth"
                  class="form-control"
                  :value="user.dt_birth_format"
                  v-mask="'##/##/####'"
                  disabled
                />
              </div>
            </div>
          
            <div class="col-md-4">
              <label for="inputRace">Raça</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-briefcase"></i>
                  </div>
                </div>
                <select
                  id="inputRace"
                  class="form-control"
                  name="txtCargo"
                  disabled
                >
                  <option>{{ user.race_name }}</option>
                </select>
              </div>
            </div>
          </div>
          <br />

          <div class="row">

            <div class="col-md-4">
              <label for="inputInstituition">Instituição</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-briefcase"></i>
                  </div>
                </div>
                <select
                  id="inputInstituition"
                  class="form-control"
                  name="txtCargo"
                  disabled
                >
                  <option>{{ user.fantasy_name }}</option>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <label for="inputPosition">Cargo</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">@</div>
                </div>
                <input
                  type="email"
                  id="inputPosition"
                  class="form-control"
                  :value="user.name_pos"
                  disabled
                />
              </div>
            </div>

            <div class="col-md-4">
              <label for="inputDtAdmission">Data de Admissão</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                  </div>
                </div>
                <input
                  key=""
                  type="text"
                  id="inputDtAdmission"
                  class="form-control"
                  :value="user.dt_adm_format"
                  v-mask="'##/##/####'"
                  disabled
                />
              </div>
            </div>
            
          </div>
          <br />
          <div class="row">

            <div class="col-md-4">
              <label for="inputDepartment">Departamento</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-briefcase"></i>
                  </div>
                </div>
                <select
                  id="inputDepartment"
                  class="form-control"
                  name="txtDepartment"
                  disabled
                >
                  <option>{{ user.dept_name }}</option>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <label for="inputRegistration">Matrícula</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">@</div>
                </div>
                <input
                  type="email"
                  id="inputRegistration"
                  class="form-control"
                  :value="user.registration"
                  disabled
                />
              </div>
            </div>

            <div class="col-md-4">
              <label for="InputPhoneNumber">Telefone</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-mobile-alt"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="InputPhoneNumber"
                  class="form-control"
                  v-mask="['(##) #####-####', '(##) ####-####']"
                  :value="user.phone_number"
                  disabled
                />
              </div>
            </div>
          </div>
          <br />
          
          <div class="row">

            <div class="col-md-4">
              <label for="inputEmail">Email</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">@</div>
                </div>
                <input
                  type="email"
                  id="inputEmail"
                  class="form-control"
                  :value="user.email"
                  disabled
                />
              </div>
            </div>            
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
          </div>
          <br />
          
          <br /><br />
          <h4><span style="font-weight: bold">Endereço</span></h4>
          <hr />
          <br />
          <div class="row">
            <div class="col-md-4">
              <label for="inputZipCode">CEP</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">CEP</div>
                </div>
                <input
                  type="text"
                  id="inputZipCode"
                  class="form-control"
                  placeholder="Informe o CEP"
                  name="txtZipCode"
                  :value="user.zipcode"
                  disabled
                />
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-6">
              <label for="inputStreet">Logradouro</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-road"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputStreet"
                  class="form-control"
                  placeholder="Rua, Av., Rod."
                  name="txtLogradouro"
                  :value="user.street"
                  disabled
                />
              </div>
            </div>
            <div class="col-md-2">
              <label for="inputNumber">Número</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">Nº</div>
                </div>
                <input
                  type="text"
                  id="inputNumber"
                  class="form-control"
                  placeholder="Número"
                  name="txtNumero"
                  :value="user.number"
                  disabled
                />
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputDistrict">Bairro</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-home"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputDistrict"
                  class="form-control"
                  placeholder="Informe o bairro"
                  name="txtBairro"
                  :value="user.district"
                  disabled
                />
              </div>
            </div>
          </div>
          <br />
          <div class="row">

            <div class="col-md-4">
              <label for="inputComplement">Complemento</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-city"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputComplement"
                  class="form-control"
                  placeholder="Informe o complemento"
                  name="txtDistrict"
                  :value="user.complement"
                  disabled
                />
              </div>
            </div>

            <div class="col-md-4">
              <label for="inputCity">Cidade</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-city"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputCity"
                  class="form-control"
                  placeholder="Informe a cidade"
                  name="txtCidade"
                  :value="user.city"
                  disabled
                />
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputState">Estado</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-flag"></i>
                  </div>
                </div>
                <select
                  id="inputState"
                  class="form-control"
                  name="txtState"
                  disabled
                >
                  <option selected>{{ user.state }}</option>
                </select>
              </div>
            </div>
          </div>

          <br /><br />
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4" align="right">
              <Link :href="'/usuario/editar/'+user.us_id" class="btn btn-warning btn-edit-user">Editar</Link>
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
    /*cargos: Array,
    empresas: Array*/
    user: Array,
    foto_user: String,
  },
  methods: {
    sendForm() {
      this.$inertia.post("/usuario/registrar", this.form, {
        forceFormData: true,
        preserveScroll: false,
        _token: this.$page.props.csrf_token,
        /*onSuccess: () => {
          bootbox.alert({
            centerVertical: true,
            backdrop: true,
            closeButton: false,
            size: "large",
            title:
              "<img src='https://i0.wp.com/www.roteirospe.com/wp-content/uploads/2017/02/SEU-LOGO-AQUI-300x81-1-300x81-1.png?ssl=1'>",
            message:
              "<i class='fas fa-check-circle' style='color:green'></i>&nbsp&nbsp" +
              "<span style='font-weight:bold; position: relative; top: 5px;'>userorador registrado com sucesso!</span>",
          });
                  
          
        },*/
      });
    },
  },
};
</script>