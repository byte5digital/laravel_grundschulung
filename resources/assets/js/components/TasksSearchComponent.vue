<template>
    <div>
        <form class="flex" @submit.prevent="onSubmit">
            <input type="search" name="search" class="form-control" v-model="searchTerm" @keyup="onSubmit">
            <button type="submit" class="btn btn-outline-primary">Search</button>
        </form>
        <div class="mt-4">
            <ul>
                <li v-for="result in results">
                    "{{ result.subject }}" created by <b>{{ result.creator.name }}</b>,
                    <template v-if="result.worker">
                        finished at <i>{{ result.done_at }}</i> by <b>{{ result.worker.name }}</b>
                    </template>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                searchTerm: '',
                results: [],
            }
        },

        /**
         * Component Methods.
         */
        methods: {
            onSubmit () {
                if (this.searchTerm.length === 0) {
                    this.results = [];
                }

                if (this.searchTerm.length < 3) {
                    return;
                }

                axios.get('api/tasks/search', {
                    params: {
                        'searchTerm': this.searchTerm,
                        'api_token': App.user.api_token,
                    }
                }).then(response => {
                   this.results = response.data;
                }).catch(errors => {
                    console.log(errors);
                });
            }
        }
    }
</script>
