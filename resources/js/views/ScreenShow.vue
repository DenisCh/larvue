<template>
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img :src="screen.screen" :alt="screen.title" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><span class="glyphicon glyphicon-user" id="start"></span> <label id="started">By</label> {{ screen.title }}</h5>
                    <p class="card-text">{{ screen.url }}</p>
                    <p class="card-text">{{ screen.description }}</p>
                    <p class="card-text">
                        <small class="text-muted">
                            <span class="glyphicon glyphicon-calendar" id="visit"></span> {{ screen.date }} |
                            <span class="glyphicon glyphicon-flag" id="comment"></span>
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
                screen: [],
            };
        },

        created() {
            console.log(this.$route.params.id);
            this.fetch();
        },

        methods: {
            fetch(page = 1) {
                axios.get('/api/screens/'+ this.$route.params.id)
                    .then(({data}) => {
                        this.screen = data.data;
                    });
            },

            report(id) {
                if(confirm('Are you sure you want to report this screen?')) {
                    axios.put('/api/screens/'+id+'/report')
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