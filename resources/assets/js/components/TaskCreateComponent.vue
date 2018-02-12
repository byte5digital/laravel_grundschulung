<template>
    <form @submit.prevent="onSubmit">
        <div class="form-group">
            <label for="subject">Aufgaben Text</label>
            <input type="text" name="subject" v-model="subject" class="form-control" :class="{'red-border' : errors.subject}">
            <div v-if="errors.subject" class="form-control-feedback" style="color: red;">
                {{ errors.subject[0] }}
            </div>
        </div>
        <div class="btn-group">
            <button type="submit" class="btn btn-primary">Absenden</button>
        </div>
    </form>
</template>

<script>
    export default {
        /**
         * Data attributes.
         */
        data() {
            return {
                subject: '',
                errors: [],
            }
        },

        /**
         * Task component Methods.
         */
        methods: {
            onSubmit () {
                axios.post('/api/tasks', {
                    'api_token': App.user.api_token,
                    'subject': this.subject,
                }).then(response => {
                    this.subject = '';
                    this.errors = [];
                }).catch(errors => {
                    this.errors = errors.response.data.errors;
                });
            },
        }
    }
</script>
