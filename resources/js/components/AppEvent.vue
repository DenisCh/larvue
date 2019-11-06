<template>
	<li class="dropdown" v-if="events.length > 0">
		<a href="#" class="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="text-decoration: none;">
		    <i class="fa fa-bell-o fa-2x text-danger" aria-hidden="true"></i><sup class="text-danger" style="vertical-align:10px;font-weight: 600">{{ events.length}}</sup>
		</a>
		<ul class="dropdown-menu dropdown-menu-right" style="width: 400px">
			<li class="dropdown-header text-center">New Signaturies</li>
		    <li v-for="event in events">
		    	<span style="padding: 10px;">New signature by <a href="#"> {{ event.name }}</a></span>
		    </li>
		    <li role="separator" class="divider"></li>
    		<li class="text-right"><button class="btn btn-outline-info" v-on:click="clearEvents()" style="padding: 10px;">Clear all</button></li>
		</ul>
	</li>
	<li class="dropdown" v-else>
		<i class="fa fa-bell-o fa-2x" aria-hidden="true" title="Broadcast events about new signs"></i>
	</li>
</template>

<script>
    export default {

        props: [
            'events',
            'somevar'
        ],

        methods: {
            clearEvents: function() {
                this.$props.events = [];
                return false;
            }
        }
    }
</script>