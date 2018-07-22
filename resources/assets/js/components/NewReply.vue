<template>
    <div>
        <div v-if="signedIn">
            <div class="form-group">
                <textarea name="body"
                          id="body"
                          class="form-control"
                          placeholder="Escribe tu cometario..."
                          rows="5"
                          required
                          v-model="body"></textarea>
            </div>

            <button type="submit"
                    class="btn btn-default"
                    @click="addReply">Post</button>
        </div>

        <p class="text-center" v-else>
            Por favor,<a href="/login">inicia sesión</a> para participar.
        </p>
    </div>
</template>

<script>
    import 'jquery.caret';
    import 'at.js';

    export default {
        props: ['endpoint'],
        data() {
            return {
                body: ''
            };
        },
        computed: {
            signedIn() {
                return window.App.signedIn;
            }
        },

        mounted() {
            $('#body').atwho({
                at: "@",
                delay: 750,
                callbacks: {
                    remoteFilter: function(query, callback) {
                        $.getJSON("/api/users", {name: query}, function(usernames) {
                            callback(usernames)
                        });
                    }
                }
            });
        },

        methods: {
            addReply() {
                axios.post(this.endpoint, { body: this.body })
                    .then(({data}) => {
                        this.body = '';
                        flash('Tu respuesta ha sido publicada.');
                        this.$emit('created', data);
                    });
            }
        }
    }
</script>