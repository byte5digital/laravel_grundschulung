<template>
    <ul>
        <li v-for="task in tasks">
            <p>
                {{ task.subject }} - {{ task.done_at }} |
                Erledigt von <b>{{ task.worker.name }}</b>
            </p>
        </li>
    </ul>
</template>

<script>
    export default {
        /**
         * Properties passed to task component.
         */
        props: ['data'],

        data() {
            return {
                tasks: [],
            }
        },

        /**
         * Map data on tasks and listen for todo-done event.
         */
        created() {
            this.tasks = this.data;

            Event.listen('todo-done', task => {
                this.tasks.push(task);
            });
        },
    }
</script>
