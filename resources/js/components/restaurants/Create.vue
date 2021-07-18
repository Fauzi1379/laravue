<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">TAMBAH MENU</div>

                    <div class="card-body">

                        <form @submit.prevent="RestaurantStore">

                            <div class="form-group">
                                <label>NAME</label>
                                <input type="text" class="form-control" v-model="restaurant.name" placeholder="Masukkan menu">
                                <div v-if="validation.name">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.name[0] }}
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>KATEGORI</label>
                                <input type="text" class="form-control" v-model="restaurant.category" placeholder="Masukkan kategori">
                                <div v-if="validation.category">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.category[0] }}
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>HARGA</label>
                                <input type="text" class="form-control" v-model="restaurant.price" placeholder="Masukkan harga">
                                <div v-if="validation.price">
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ validation.price[0] }}
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-md btn-success">SIMPAN</button>
                                <button type="reset" class="btn btn-md btn-danger">RESET</button>
                            </div>


                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                restaurant: {},
                validation: []
            }
        },
        methods: {
            RestaurantStore() {
                let uri = `http://localhost:8000/api/restaurants/store`;
                this.axios.post(uri, this.restaurant)
                    .then((response) => {
                        this.$router.push({
                            name: 'restaurants'
                        });
                    }).catch(error => {
                    this.validation = error.response.data;
                });
            }
        }
    }
</script>