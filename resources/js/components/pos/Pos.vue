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
                            <!-- <router-link to="/customer_create" class="btn btn-sm btn-success">Add New</router-link> -->
                            <button type="button" class="btn btn-sm btn-success" @click="openEditModal">
                                <!-- <i class="fa-solid fa-pen-to-square"></i> -->
                                Add Customer
                            </button>
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
                                <input type="text" id="searchInput" v-model="searchSubProducts"
                                    placeholder="Search for product Name.." />

                                <div class="row">
                                    <div class="col-md-3 mb-3 col-6" v-for="subCategory in filteredSubProducts"
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




        <div class="modal fade" id="editCustomerModal" tabindex="-1" aria-labelledby="editCustomerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog full-width-modal mt-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCustomerModalLabel">
                            Edit Customer
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <div class="card rounded-lg">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <div class="icon_text d-flex gap-2 mt-3">
                                            <p><i class="fa-solid fa-chart-line"></i></p>
                                            <p class="text-black font-bold">Edit Customer</p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form @submit.prevent="customer_create" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputName" type="text"
                                                            placeholder="Enter your name" v-model="form.name" />
                                                        <small class="text-danger" v-if="errors.name">{{ errors.name[0]
                                                            }}</small>
                                                        <label for="inputName">Full Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputEmail" type="email"
                                                            placeholder="name@example.com" v-model="form.email" />
                                                        <small class="text-danger" v-if="errors.email">{{
                                                            errors.email[0] }}</small>
                                                        <label for="inputEmail">Email address</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputNid" type="text"
                                                            placeholder="Phone" v-model="form.phone" />
                                                        <small class="text-danger" v-if="errors.phone">{{
                                                            errors.phone[0] }}</small>
                                                        <label for="inputNid">Phone</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputAddress" type="text"
                                                            placeholder="Address" v-model="form.address" />
                                                        <small class="text-danger" v-if="errors.address">{{
                                                            errors.address[0] }}</small>
                                                        <label for="inputAddress">Address</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-1">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputNid" type="text"
                                                            placeholder="NID" v-model="form.nid" />
                                                        <small class="text-danger" v-if="errors.nid">{{ errors.nid[0]
                                                            }}</small>
                                                        <label for="inputNid">NID</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control p-3 px-4" id="inputFile" type="file"
                                                            @change="onFileSelect" />
                                                        <small class="text-danger" v-if="errors.image">{{
                                                            errors.image[0] }}</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <img :src="form.image" width="55" height="55" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary btn-block">Submit</button>
                                                </div>
                                            </div>
                                        </form>
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
            searchSubProducts: "",
            form: {
                name: null,
                email: null,
                address: null,
                phone: null,
                nid: null,
                image: '/backend/assets/img/pic.jpeg'
            },
            errors: {}
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

        filteredSubProducts() {
            return this.subCategories.filter((product) => {
                return (
                    product.id.toString().includes(this.searchSubProducts) || product.product_name.toLowerCase().includes(this.searchSubProducts)
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
        },

        openEditModal() {
            let myModal = new bootstrap.Modal(
                document.getElementById("editCustomerModal"),
                {}
            );
            myModal.show();
        },

        onFileSelect(event) {
            let file = event.target.files[0]
            if (file.size > 1048576) {
                Toast.fire({
                    icon: "warning",
                    title: "image must be less then 1 mb!"
                });
            }
            else {
                let reader = new FileReader();
                reader.onload = (event) => {
                    this.form.image = event.target.result;
                    console.log(this.form.image)
                }
                reader.readAsDataURL(file);
            }
        },
        async customer_create() {
            await axios.post('/api/customers/store', this.form)
                .then((res) => {
                    this.form = ''
                    Toast.fire({
                        icon: "success",
                        title: res.data.message
                    });
                    this.$router.push({ name: 'All_customer' })
                })
                .catch((error) => {
                    this.errors = error.response.data.errors
                })
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