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
            <router-link class="btn btn-primary" :to="{ name: 'signature-form' }">Sign the GuestBook</router-link>
        </div>

        <div class="row" v-if="signatures.length">
            <div class="col-sm-3" v-for="signature in signatures">
                <div class="card mt-3" >
                    <img :src="signature.avatar" :alt="signature.name" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><span class="glyphicon glyphicon-user" id="start"></span> <label id="started">By</label> {{ signature.name }}</h5>
                        <p class="card-text">{{ signature.body }}</p>
                        <router-link class="btn btn-primary" :to="{ name: 'signature.show', params: { id: signature.id } }">View</router-link>
                    </div>

                    <div class="card-footer text-muted">
                        <span class="glyphicon glyphicon-calendar" id="visit"></span> {{ signature.date }} |
                        <span class="glyphicon glyphicon-flag" id="comment"></span>
                        <a href id="comments" @click.prevent="report(signature.id)">Report</a>
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
</template>

<script>

    import paginate from 'vuejs-paginate';

    export default {

        data() {
            return {
                loading: false,
                error: null,
                signatures: [],
                pageCount: 1,
                endpoint: 'api/signatures?page=',
                is_feature: true
            };
        },

        created() {
            this.fetch();

            /*var chanell = Echo.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                alert(JSON.stringify(data));
            });
            /*Echo.private("comment").listen("CommentSent", e => {
                this.comments.push({
                  user: {name: e.user.name},
                  body: e.comment.body,
                });
            });*/
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
                        this.signatures = data.data;
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