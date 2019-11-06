<template>
    <div>
        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="error" class="error">
            <p>{{ error }}</p>

            <p>
                <button @click.prevent="fetch">
                    Try Again
                </button>
            </p>
        </div>
    
        <div class="text-right">
            <router-link class="btn btn-primary" :to="{ name: 'screen-form' }">Add Screen</router-link>
        </div>

        <div v-if="screens.length">
            <div class="row">
                <div class="col-sm-3" v-for="screen in screens">
                    <div class="card mt-3" >
                        <img :src="screen.screen" :alt="screen.title" class="card-img-top">
                        @@ {{ screen.screen }} @@
                        <div class="card-body">
                            <h5 class="card-title"><span class="glyphicon glyphicon-user" id="start"></span> <label id="started">By</label> {{ screen.title }}</h5>
                            <p class="card-text">{{ screen.description }}</p>
                            <router-link class="btn btn-primary" :to="{ name: 'screen.show', params: { id: screen.id } }">View</router-link>
                        </div>

                        <div class="card-footer text-muted">
                            <span class="glyphicon glyphicon-calendar" id="visit"></span> {{ screen.date }} |
                            <span class="glyphicon glyphicon-flag" id="comment"></span>
                            <a href id="comments" @click.prevent="report(screen.id)">Report</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <paginate
                    :page-count="pageCount"
                    :click-handler="fetch"
                    :prev-text="'Prev'"
                    :next-text="'Next'"
                    :container-class="'pagination'"
                    :page-class="'page-item'"
                    :page-link-class="'page-link'"
                    :prev-class="'page-item'"
                    :prev-link-class="'page-link'"
                    :next-class="'page-item'"
                    :next-link-class="'page-link'">
                </paginate>
            </div>
        </div>
        <div class="row justify-content-center mt-4" v-else>
            <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Have no screens!</h4>
              <p>Be first to add screen. Just enter url of page which you want to screen and we make it for you.</p>
              <hr>
              <router-link class="btn btn-success" :to="{ name: 'screen-form' }">Add Screen</router-link>
            </div>
        </div>
        
        
        
    </div>
</template>

<script>

    import paginate from 'vuejs-paginate';

    export default {

        data() {
            return {
                loading: false,
                error: null,
                screens: [],
                pageCount: 1,
                endpoint: 'api/screens?page=',
                is_feature: true
            };
        },

        created() {
            this.fetch();

        },

        components: {
            paginate
        },

        methods: {
            fetch(page = 1) {
                this.error = null;
                this.loading = true;
                axios.get(this.endpoint + page)
                    .then(({data}) => {
                        this.loading = false;
                        this.screens = data.data;
                        this.pageCount = data.meta.last_page;
                    }).catch(error => {
                        this.loading = false;
                        this.error = error.response.data.message || error.message;
                    });
            },

            report(id) {
                if(confirm('Are you sure you want to report this signature?')) {
                    axios.put('api/signatures/'+id+'/report')
                    .then(response => this.removeSignature(id));
                }
            },

            removeSignature(id) {
                this.signatures = _.remove(this.signatures, function (signature) {
                    return signature.id !== id;
                });
            }
        }
    }
</script>