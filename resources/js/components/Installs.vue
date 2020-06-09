<template>
    <div class="container" :class="{'loading': loading}">
        <div class="row">
            <div class="col-lg-3">
                <h1 class="my-4">Simulador de Vendas - Euromercantil</h1>
                <div class="list-group">
                    <a class="list-group-item" v-for="plan in plans" :key="plan.id">
                        {{ plan.title }}
                    </a>
                </div>
            </div>
            
            <div class="col-lg-9">
                <div class="row mt-4">
                    <div class="col-lg-4 col-md-6 mb-4" v-for="planDetail in planDetails" :key="planDetail.id">
                        <div class="card h-100">
                            <a href="#">
                                <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#">{{ planDetail.installments }}</a>
                                </h4>
                                <h5>$ {{ planDetail.visa_master }}</h5>
                                <p class="card-text">{{ planDetail.others }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                plans: [],
                planDetails: [],
                loading: true
            }
        },
        // mounted: actions that run when component is loaded
        mounted() {
            this.loadPlans();
            this.loadPlanDetails();
        },

        methods: {
            loadPlans: function() {
                axios.get('/api/plans')
                    .then((response) => {
                        this.plans = response.data.data; // .data from the response and .data from api resource
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            },

            loadPlanDetails: function(){
                axios.get('/api/plan-details')
                    .then((response) => {
                        this.planDetails = response.data.data; // .data from the response and .data from api resource
                        this.loading = false;
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            }
        }

    }
</script>
