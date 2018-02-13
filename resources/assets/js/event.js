/**
 * Event bus
 */
export default class Event {
    /**
     * Boot up new vue instance
     */
    constructor () {
        this.vue = new Vue();
    }

    /**
     * Fire an event.
     *
     * @param event
     * @param data
     */
    fire (event, data = null) {
        this.vue.$emit(event, data);
    }

    /**
     * Listen for an event and provide a callback.
     *
     * @param event
     * @param callback
     */
    listen (event, callback) {
        this.vue.$on(event, callback);
    }
}