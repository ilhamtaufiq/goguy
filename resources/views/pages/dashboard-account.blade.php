@extends('layouts.dashboard')

@section('title')
    Dashboard Akun
@endsection

@section('content') 
        <!-- section content -->
        <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">Akun Saya</h2>
              <p class="dashboard-subtitle">
               
              </p>
            </div>
            <div class="dashboard-content">
              <div class="row">
                <div class="col-12">
                <form action="{{route('dashboard-settings-redirect', 'dashboard-settings-account')}}" method="POST" enctype="multipart/form-data" id="locations">
                  @csrf
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="name">Nama</label>
                              <input type="text" id="name" name="name" value="{{$user->name}}"
                                class="form-control">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="text" id="email" name="email" value="{{$user->email}}"
                                class="form-control">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="address_one">Alamat</label>
                              <input type="text" id="address_one" name="address_one" value="{{$user->address_one}}"
                                class="form-control">
                            </div>
                          </div>
                       
                          <div class="col-md-4">
                          <div class="form-group">
                            <label for="provinces_id">Kecamatan</label>
                            <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id">
                            <option v-for="province in provinces" :value="province.id">@{{province.name}}</option>
                            </select>
                            <select v-else class="form-control"></select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="regencies_id">Desa</label>
                            <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies" v-model="regencies_id">
                            <option v-for="regency in regencies" :value="regency.id">@{{regency.name}}</option>
                            </select>
                            <select v-else class="form-control"></select>
                          </div>
                        </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="zip_code">Kode Pos</label>
                              <input type="text" id="zip_code" name="zip_code" value="{{$user->zip_code}}" class="form-control">
                            </div>
                          </div>
                
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="phone_number">No HP</label>
                              <input type="text" id="phone_number" name="phone_number" value="{{$user->phone_number}}" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col text-right">
                            <button type="submit" class="btn btn-success px-5">Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      var locations = new Vue({
        el: "#locations",
        mounted() {
          AOS.init();
          this.getProvincesData();
        },
        data: {
          provinces: null,
          regencies: null,
          provinces_id: null,
          regencies_id: null,
        },
        methods: {
          getProvincesData() {
            var self = this;
            axios.get('{{ route('api-provinces') }}')
              .then(function (response) {
                  self.provinces = response.data;
              })
          },
          getRegenciesData() {
            var self = this;
            axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
              .then(function (response) {
                  self.regencies = response.data;
              })
          },
        },
        watch: {
          provinces_id: function (val, oldVal) {
            this.regencies_id = null;
            this.getRegenciesData();
          },
        }
      });
    </script>
@endpush