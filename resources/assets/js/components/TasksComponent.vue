<template>
    <div>
        <form v-for="task in tasks" class="form-inline" @submit.prevent>
            <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                <input type="checkbox" class="form-check-input" name="done" @change="onCheck(task)">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">{{ task.subject }} - erstellt von <b>{{ task.creator.name }}</b></span>
            </label>
        </form>
    </div>
</template>

<script>
    export default {
        /**
         * Properties passed to task component.
         */
        props: ['tasks'],

        /**
         * Task component Methods.
         */
        methods: {
            onCheck (task) {
                axios.put('/api/task/'+task.id, {
                    'done': true,
                    'api_token': App.user.api_token,
                }).then(response => console.log(response));
            },
        }
    }
</script>
