<template>
    <div>
        <form v-for="task in tasks" class="form-inline" @submit.prevent>
            <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                <input type="checkbox" class="form-check-input" name="done" v-model="task.done" @change="onCheck(task)">
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
        props: ['data'],

        /**
         * Map data to tasks properties.
         */
        data() {
            return {
                tasks: [],
            }
        },

        /**
         * When component is created listen to 'todo-created' event.
         */
        created() {
            this.tasks = this.data.map(task => {
                task.done = false;

                return task;
            });

            Event.listen('todo-created', task => {
                this.tasks.push(task);
            });
        },

        /**
         * Task component Methods.
         */
        methods: {
            onCheck (task) {
                axios.put('/api/task/'+task.id, {
                    'done': task.done,
                    'api_token': App.user.api_token,
                }).then(response => {
                    this.tasks = this.tasks.filter(task => {
                        return task.id !== response.data.id;
                    });

                    Event.fire(`todo-done`, response.data);
                });
            },
        }
    }
</script>
