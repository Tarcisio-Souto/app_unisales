<template>
  <layout class="backg-color">

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
        <form @submit.prevent="sendForm" enctype="multipart/form-data" id="formAddUser">
          <h4><span style="font-weight: bold">Dados Pessoais</span></h4>
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
                  v-model="form.name"
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
                  placeholder="CPF (só números)"
                  v-model="form.cpf"
                  name="txtCpf"
                  v-mask="'###.###.###-##'"
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
              <label for="InputGenre">Sexo</label>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="exampleRadios"
                    id="InputGenre1"
                    value="m"
                    v-model="form.genre"
                  />
                  <label class="form-check-label" for="exampleRadios1">
                    Masculino
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="exampleRadios"
                    id="InputGenre2"
                    v-model="form.genre"
                    value="f"
                  />
                  <label class="form-check-label" for="exampleRadios2">
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
              <label for="inputAge">Idade</label>
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
                  placeholder="Idade"
                  v-model="form.age"
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
              <label for="inputEmail">Email</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">@</div>
                </div>
                <input
                  type="email"
                  id="inputEmail"
                  class="form-control"
                  placeholder="Email"
                  v-model="form.email"
                  name="txtEmail"
                />
              </div>
            </div>

            <div class="col-md-4">
              <label for="inputInstituition">Instituição</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-building"></i>
                  </div>
                </div>
                <select
                  id="inputInstituition"
                  class="form-control"
                  v-model="form.instituition"
                  name="txtinstituition"
                >
                  <option selected>Selecione a instituition</option>
                  <option
                    v-for="instituition in instituitions"
                    :key="instituition.id"
                    :value="instituition.id"
                  >
                    {{ instituition.social_name }}
                  </option>
                </select>
              </div>
            </div>


          </div>
          <br />
          <div class="row">
            
            <div class="col-md-4">
              <label for="inputPosition">Cargo</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-briefcase"></i>
                  </div>
                </div>
                <select
                  id="inputPosition"
                  class="form-control"
                  v-model="form.position"
                  name="txtPosition"
                >
                  <option selected>Selecione o cargo</option>
                  <option
                    v-for="position in positions"
                    :key="position.id"
                    :value="position.id"
                  >
                    {{ position.name }}
                  </option>
                </select>
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
                  v-model="form.dt_adm"
                  name="txtDtAdm"
                  v-mask="'##/##/####'"
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
                  placeholder="Telefone"
                  v-model="form.phone_number"
                  name="txtPhoneNumber"
                  v-mask="['(##) #####-####', '(##) ####-####']"
                />
              </div>
            </div>
          </div>
          <br>

          <div class="row">
            <div class="col-md-4">
              <label for="inputRegister">Matrícula</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-mobile-alt"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputRegister"
                  class="form-control"
                  placeholder="Matrícula"
                  v-model="form.register"
                  name="txtRegister"
                />
              </div>
            </div>
          </div>

          <br />
          <br /><br />
          <h4><span style="font-weight: bold">Endereço</span></h4>
          <hr />
          <br />
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
                  v-model="form.street"
                  name="txtStreet"
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
                  v-model="form.number"
                  name="txtNumber"
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
                  v-model="form.district"
                  name="txtDistrict"
                />
              </div>
            </div>
          </div>
          <br />
          <div class="row">
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
                  v-model="form.city"
                  name="txtCity"
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
                  v-model="form.state"
                  name="txtState"
                >
                  <option selected>Selecione o estado</option>
                  <option value="Acre">Acre</option>
                  <option value="Alagoas">Alagoas</option>
                  <option value="Amapá">Amapá</option>
                  <option value="Amazonas">Amazonas</option>
                  <option value="Bahia">Bahia</option>
                  <option value="Ceará">Ceará</option>
                  <option value="Distrito Federal">Distrito Federal</option>
                  <option value="Espírito Santo">Espírito Santo</option>
                  <option value="Goiás">Goiás</option>
                  <option value="Maranhão">Maranhão</option>
                  <option value="Mato Grosso">Mato Grosso</option>
                  <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                  <option value="Minas Gerais">Minas Gerais</option>
                  <option value="Pará">Pará</option>
                  <option value="Paraíba">Paraíba</option>
                  <option value="Paraná">Paraná</option>
                  <option value="Pernambuco">Pernambuco</option>
                  <option value="Piauí">Piauí</option>
                  <option value="Rio de Janeiro">Rio de Janeiro</option>
                  <option value="Rio Grande do Norte">
                    Rio Grande do Norte
                  </option>
                  <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                  <option value="Rondônia">Rondônia</option>
                  <option value="Roraima">Roraima</option>
                  <option value="Santa Catarina">Santa Catarina</option>
                  <option value="São Paulo">São Paulo</option>
                  <option value="Sergipe">Sergipe</option>
                  <option value="Tocantins">Tocantins</option>
                  <option value="Estrangeiro">Estrangeiro</option>
                </select>
              </div>
            </div>
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
                  v-model="form.zipcode"
                  name="txtZipCode"
                />
              </div>
            </div>
          </div>
          <br /><br />
          <h4><span style="font-weight: bold">Senha</span></h4>
          <hr />
          <div class="row">
            <div class="col-md-6">
              <label for="inputPassword">Senha Inicial</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-key"></i>
                  </div>
                </div>
                <input
                  type="password"
                  id="inputPassword"
                  class="form-control"
                  placeholder="Senha"
                  v-model="form.password"
                  name="txtPassword"
                />
              </div>
              <div v-for="(erro, password) in errors" :key="password">
                <div v-if="password == 'password'">
                  <span v-if="erro != ''" class="errors-label-notification">
                    <i class="fas fa-exclamation-circle"></i>{{ erro }}
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label for="inputConfirmPassword">Confirme a senha</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-key"></i>
                  </div>
                </div>
                <input
                  type="password"
                  id="inputConfirmPassword"
                  class="form-control"
                  placeholder="Senha"
                  v-model="form.confirm_password"
                  name="txtConfirmPassword"
                />
              </div>
              <div v-for="(erro, password) in errors" :key="password">
                <div v-if="password == 'password'">
                  <span v-if="erro != ''" class="errors-label-notification">
                    <i class="fas fa-exclamation-circle"></i>{{ erro }}
                  </span>
                </div>
              </div>
            </div>
          </div>
          <br /><br />
          <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-success btnCadastrar">
                Cadastrar
              </button>
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
import { Inertia } from "@inertiajs/inertia";
export default {
  components: {
    Layout,
  },
  props: {
    errors: Object,
    positions: Array,
    instituitions: Array
  },
  data: () => {
    return {
      form: {
        name: null,
        cpf: null,
        age: null,
        genre: null,
        email: null,
        instituition: null,
        position: null,
        dt_adm: null,
        register: null,
        phone_number: null,
        password: null,
        confirm_password: null,
        street: null,
        number: null,
        district: null,
        city: null,
        state: null,
        zipcode: null        
      },
    };
  },
  methods: {
    sendForm() {
      var aux_name = this.form.name;
      var aux_cpf = this.form.cpf;
      var aux_age = this.form.age;
      var aux_register = this.form.register;
      var aux_email = this.form.email;
      var aux_instituition = this.form.instituition;
      var aux_position = this.form.position;
      var aux_dt_adm = this.form.dt_adm;
      var aux_phone_number = this.form.phone_number;
      var aux_password = this.form.password;
      var aux_confirm_password = this.form.confirm_password;
      var aux_street = this.form.street;
      var aux_number = this.form.number;
      var aux_district = this.form.district;
      var aux_city = this.form.city;
      var aux_state = this.form.state;
      var aux_zipcode = this.form.zipcode;
      this.$inertia.post("/usuario/registrar", this.form, {
        forceFormData: true,
        preserveScroll: false,
        _token: this.$page.props.csrf_token,
        preserveState: false,
        onSuccess: () => {
          bootbox.alert({
            centerVertical: true,
            backdrop: true,
            closeButton: false,
            size: "large",
            title:
              "<img src='http://denuncia.vitoriahospitalar.com.br/dist/logo.png?343b76e5e3d8038a9c8e00e61671535e'>",
            message:
              "<i class='fas fa-check-circle' style='color:green'></i>&nbsp&nbsp" +
              "<span style='font-weight:bold; position: relative; top: 5px;'>Colaborador registrado com sucesso!</span>",
          });
          $('#formAddUser').reset();
          
        },
        onError: () => {
          $("#inputName").val(aux_name);
          $("#inputCpf").val(aux_cpf);
          $("#inputConfirmSenha").val(aux_confirm_password);
          $("#inputSenha").val(aux_password);
          $("#inputCep").val(aux_zipcode);
          $("#inputEstado").val(aux_state);
          $("#inputCage").val(aux_city);
          $("#inputBairro").val(aux_district);
          $("#inputNumero").val(aux_number);
          $("#inputLogradouro").val(aux_street);
          $("#InputPhoneNumber").val(aux_phone_number);
          $("#inputDataAdmissao").val(aux_dt_adm);
          $("#inputPosition").val(aux_position);
          $("#inputMatricula").val(aux_register);
          $("#inputEmpresa").val(aux_instituition);
          $("#inputAge").val(aux_age);
          $("#inputEmail").val(aux_email);
          
        },
      });
    },
  },
};
</script>