<template>
    <div>
        <div class="alert alert-success" v-if="saved">
            <strong>Success!</strong> Your url has been successfully added.
        </div>

        <div class="well well-sm" id="screen-form">
            <form class="form-horizontal" method="post" @submit.prevent="onSubmit">
                <fieldset>
                    <legend class="text-center">Add url for which you want to make screenshort</legend>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Name</label>
                        <div class="col-md-9" :class="{'has-error': errors.url}">
                            <input id="name"
                                   v-model="screen.url"
                                   type="text"
                                   placeholder="Enter url"
                                   class="form-control">
                            <span v-if="errors.url" class="help-block text-danger">{{ errors.url[0] }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                errors: [],
                saved: false,
                screen: {
                    url: null,
                }
            };
        },

        methods: {
            onSubmit() {
                this.saved = false;

                axios.post('/api/screens', this.screen)
                    .then(({data}) => {
                            this.setSuccessMessage()
                            //this.$router.push("/");
                        }
                    )
                    .catch(({response}) => this.setErrors(response));
            },

            setErrors(response) {
                this.errors = response.data.errors;
            },

            setSuccessMessage() {
                this.reset();
                this.saved = true;
            },

            reset() {
                this.errors = [];
                this.screen = {url: null};
            }
        }
    }
</script>