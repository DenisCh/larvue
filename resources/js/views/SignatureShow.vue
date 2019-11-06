<template>
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img :src="signature.avatar" :alt="signature.name" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><span class="glyphicon glyphicon-user" id="start"></span> <label id="started">By</label> {{ signature.name }}</h5>
                    <p class="card-text">{{ signature.body }}</p>
                    <p class="card-text">
                        <small class="text-muted">
                            <span class="glyphicon glyphicon-calendar" id="visit"></span> {{ signature.date }} |
                            <span class="glyphicon glyphicon-flag" id="comment"></span>
                            <a href="#" id="comments" @click="report(signature.id)">Report</a>
                        </small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {

        props: ['post_id'],

        data() {
            return {
                signature: [],
            };
        },

        created() {
            console.log(this.$route.params.id);
            this.fetch();
        },

        methods: {
            fetch(page = 1) {
                axios.get('/api/signatures/'+ this.$route.params.id)
                    .then(({data}) => {
                        this.signature = data.data;
                    });
            },

            report(id) {
                if(confirm('Are you sure you want to report this signature?')) {
                    axios.put('/api/signatures/'+id+'/report')
                    .then(response => {
                        this.$router.push("/");
                    });
                }
            },

            removeReportLink() {
                document.getElementById("comments").remove();
            }
        }
    }
</script>