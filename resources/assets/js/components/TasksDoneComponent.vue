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
        props: ['tasks'],

        /**
         * Task component Methods.
         */
        methods: {

        }
    }
</script>
