 <template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light pl-0 pr-0">
            <button class="navbar-toggler mr-1" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <router-link class="navbar-brand mr-auto" :to="{ name: 'home' }">Denis Ch</router-link>

            <div class="order-lg-3">
                <ul class="nav navbar-nav navbar-right">
                    <app-event
                        :events="events"
                        :somevar="'Denis'"
                    ></app-event>
                    <!-- <li>
                        <span v-on:click="addEvent">Add event</span>
                    </li> -->
                </ul>
            </div>

            <div class="collapse navbar-collapse ml-2" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <router-link  class="nav-link" :to="{ name: 'home' }">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'signature-form' }">Sign the GuestBook</router-link>
                    </li>

                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'screens' }">Site Screens</router-link>
                    </li>
                </ul>
            </div>
        </nav>
        
    </div>
</template>
<script>
    export default {

        data() {
            return {
                events: []
            };
        },

        created() {
            this.getEvent();
        },

        methods: {
            getEvent: function() {
                var pusher = new Pusher('32ab4391443ff304c9cb', {
                    cluster: 'eu',
                    forceTLS: true
                });

                let vm = this;

                var channel = pusher.subscribe('my-channel');
                channel.bind('my-event', function(data) {
                    console.log(data);
                    vm.events.push(data);
                });
            },
            addEvent: function() {
                this.events.push({name: 'Denis', message: 'Hello Denis'});
                return false;
            }
        }
    }
</script>