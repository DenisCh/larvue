 <template>
    <div class="container">

        <app-nav></app-nav>

        <app-feature></app-feature>

        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                is_feature: true
            };
        },

        created() {
            if(this.$route.name == 'home') {
                this.is_feature = true;
            }
        },

        updated() {
            if(this.$route.name == 'home') {
                this.is_feature = true;
            } else {
                this.is_feature = false;
            }
        },
    }
</script>