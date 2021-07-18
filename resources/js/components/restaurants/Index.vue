<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">MENU</div>

                    <div class="card-body">
                        <router-link :to="{ name: 'create' }" class="btn btn-md btn-success">TAMBAH MENU</router-link>

                        <div class="table-responsive mt-2">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>name</th>
                                    <th>price</th>
                                    <th>category</th>
                                    <th>AKSI</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(restaurant, index) in restaurants" :key="restaurant.id">
                                    <td>{{ restaurant.name }}</td>
                                    <td>{{ restaurant.price }}</td>
                                    <td>{{ restaurant.category }}</td>
                                    <td class="text-center">
                                        <router-link :to="{name: 'edit', params: { id: restaurant.id }}" class="btn btn-sm btn-primary">EDIT</router-link>
                                        <button @click.prevent="PostDelete(restaurant.id, index)" class="btn btn-sm btn-danger">HAPUS</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

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
                restaurants: []
            }
        },
        created() {
            let uri = `http://localhost:8000/api/restaurants`;
            this.axios.get(uri).then(response => {
                this.restaurants = response.data.data;
            });
        }
    }
</script>