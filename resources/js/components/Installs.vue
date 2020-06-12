<template>
    <div class="container" :class="{'loading': loading}">
        <div id="vue-app">
            <h1>Simulador de Parcelas</h1>
            <label>Valor:</label>
            <input type="number" v-model="val"/><!--picks input and puts in variable-->
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                <thead>
                    <tr>
                    <th>Id do plano</th>
                    <th>Parcelas</th>
                    <th>Valor da parcela para CONSUMIDOR</th>
                    <th>Custo TOTAL</th>
                    <th>Valor TOTAL Líquido para ESTABELECIMENTO</th>
                    <th>Valor cobrado para est. receber R${{val}}</th>
                    <th>Valor parcela para est. receber R${{val}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="planDetail in planDetails.slice(1)" :key="planDetail.id">
                    <td>{{planDetail.plan_id}}</td>
                    <td>{{planDetail.installments}}</td>
                    <td>R${{(val / planDetail.installments).toFixed(2)}}</td>
                    <td>{{planDetail.visa_master}}%</td>
                    <td>R${{(val - ((planDetail.visa_master/100) * val)).toFixed(2)}}</td>
                    <td>R${{(parseInt(val) + (((planDetail.visa_master/100)*val)/(1-(planDetail.visa_master/100)))).toFixed(2)}}</td>
                    <td>R${{((parseInt(val) + (((planDetail.visa_master/100)*val)/(1-(planDetail.visa_master/100))))/planDetail.installments).toFixed(2) }}</td>
                    </tr>
                </tbody>
                </table>
		    </div>
	    </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                val: 0,
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
            },

            
        },
        computed: {
            orderedPlanDetails: function () {
                return _.orderBy(this.planDetails, 'installments')
            }
        }

    }
</script>
