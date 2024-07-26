<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="employee_table fw-bold">
                            <i class="fas fa-table me-1"></i>
                            Card
                        </div>
                        <div class="addNew">
                            <router-link to="/customer_create" class="btn btn-sm btn-success">Add New</router-link>
                        </div>
                    </div>
                    <div class="card-body"></div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="employee_table fw-bold">
                            <i class="fas fa-table me-1"></i>
                            All Product
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <input type="text" id="searchInput" v-model="searchProducts"
                            placeholder="Search for product Name.." />

                        <div class="row">
                            <div class="col-md-4" v-for="product in products" :key="product">
                                <div class="div1 mb-3">
                                    <img :src="`/backend/images/product/${product.image}`" alt="Employee Image"
                                        width="55" height="55" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "POS_vue",
    data() {
        return {
            products: [],
            categories: [],
            subCategories:[],
            errors: {},
            searchProducts: "",
        };
    },
    methods: {
        async productsfetch() {
            await axios.get("/api/products").then((res) => {
                this.products = res.data;
            });
        },
        async categoriesfetch() {
            await axios.get("/api/categories").then((res) => {
                this.categories = res.data;
            });
        },
        subproduct(id){
            console.log(id)
            // await axios.get('/api/subproducts/'+id)
            // .then((res)=>{
            //     console.log(res)
            // })
            // .catch();
        }
    },
    mounted() {
        this.productsfetch();
        this.categoriesfetch();
    },
};
</script>

<style scoped>
#searchInput {
    background-image: url("/backend/assets/img/searchicon.png");
    background-position: 10px 12px;
    background-repeat: no-repeat;
    width: 100%;
    font-size: 16px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd;
    margin-bottom: 12px;
}

.full-width-modal {
    max-width: 100%;
    max-height: 100vh;
}

.full-width-modal .modal-content {
    width: 60%;
    height: 75vh;
    margin: auto;
}

.div1 {
    width: 100%;
    height: 25vh;
    border: 1px solid black;
}
</style>