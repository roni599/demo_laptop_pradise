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
                    <div class="container mt-3">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">All Products</button>
                            </li>
                            <li class="nav-item" role="presentation" v-for="category in categories" :key="category.id">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false"
                                    @click.prevent="subproduct(category.id)">{{ category.category_name
                                    }}</button>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="card-body">
                                <input type="text" id="searchInput" v-model="searchProducts"
                                    placeholder="Search for product Name.." />

                                <div class="row">
                                    <div class="col-md-3 mb-3 col-6" v-for="product in filteredProducts" :key="product">
                                        <a href="#" class="text-decoration-none list-unstyled">
                                            <div class="card" style="width: 9.5rem;">
                                                <img :src="`/backend/images/product/${product.image}`"
                                                    alt="Employee Image" height="65" width="65" />
                                                <div class="card-body">
                                                    <small class="card-title">{{ product.product_name }}</small><br>
                                                    <span v-if="product.product_quantity >= 1">Available({{
                                                        product.product_quantity }})</span>
                                                    <span v-else class="text-danger">Stock out</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <div class="card-body">
                                <input type="text" id="searchInput" v-model="searchProducts"
                                    placeholder="Search for product Name.." />

                                <div class="row">
                                    <div class="col-md-3 mb-3 col-6" v-for="subCategory in subCategories"
                                        :key="subCategory.id">
                                        <a href="#" class="text-decoration-none list-unstyled">
                                            <div class="card" style="width: 9.5rem;">
                                                <img :src="`/backend/images/product/${subCategory.image}`"
                                                    alt="Employee Image" height="65" width="65" />
                                                <div class="card-body">
                                                    <small class="card-title">{{ subCategory.product_name }}</small><br>
                                                    <span v-if="subCategory.product_quantity >= 1">Available({{
                                                        subCategory.product_quantity }})</span>
                                                    <span v-else class="text-danger">Stock out</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
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
            subCategories: [],
            errors: {},
            searchProducts: "",
        };
    },
    computed: {
        filteredProducts() {
            return this.products.filter((product) => {
                return (
                    product.id.toString().includes(this.searchProducts) || product.product_name.toLowerCase().includes(this.searchProducts)
                );
            });
        },
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
        async subproduct(id) {
            await axios.get('/api/subproducts/' + id)
                .then((res) => {
                    this.subCategories = res.data
                })
                .catch();
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
</style>